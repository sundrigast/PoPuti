<?php

namespace App\Http\Controllers;

use App\Events\CreateMessage;
use App\Http\Requests\Message\StoreRequest;
use App\Http\Requests\Message\UpdateRequest;
use App\Http\Resources\Ride\MessageResource;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Message
 *
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{
    /**
     * Create message for ride's chat
     * @authenticated
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $authUser = auth()->user();

        $message = $authUser->messages()->create(
            $validated
        );

        event(new CreateMessage($message));

        return response()->json([
            'message' => __('message.sent'),
            'chats_message' => new MessageResource($message)
        ], 201);
    }

    /**
     * Update message
     * [Mark as read]
     * @authenticated
     *
     * @param UpdateRequest $request
     * @param Message $message
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Message $message)
    {
        $validated = $request->validated();

        $message->update(
            $validated
        );

        return response()->json([
            'message' => __('messsage.update'),
            'chats_message' => new MessageResource($message)
        ], 201);
    }
}
