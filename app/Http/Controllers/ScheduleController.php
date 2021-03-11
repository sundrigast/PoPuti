<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedule\StoreRequest;
use App\Http\Requests\Schedule\UpdateRequest;
use App\Models\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Schedule
 *
 * Class ScheduleController
 * @package App\Http\Controllers
 */
class ScheduleController extends Controller
{
    /**
     * Create ride schedule
     * @authenticated
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $validate = $request->validated();

        $schedule = Schedule::create(
            $validate
        );

        return response()->json([
            'schedule' => $schedule
        ], 201);
    }

    /**
     * Update ride schedule
     * @authenticated
     *
     * @param UpdateRequest $request
     * @param Schedule $schedule
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Schedule $schedule)
    {
        $validate = $request->validated();

        $schedule->update(
            $validate
        );

        return response()->json([
            'schedule' => $validate
        ], 201);
    }
}
