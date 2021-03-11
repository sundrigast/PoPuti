<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Optix\Media\MediaUploader;
use App\Models\Media;
use App\Http\Requests\Media\StoreRequest;
use App\Http\Requests\Media\UpdateRequest;

/**
 * @group Media
 *
 * API for management medias (images)
 *
 * Class MediaController
 * @package App\Http\Controllers
 */
class MediaController extends Controller
{
    /**
     * Store media file
     * @authenticated
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $file = MediaUploader::fromFile($validated['file'])
            ->upload();

        return response()->json([
            'media' => $file
        ], 201);
    }


    /**
     * Update media file information
     * [Confirmation and rejection of documents]
     * @authenticated
     *
     * @param UpdateRequest $request
     * @param Media $file
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Media $file)
    {
        $validated = $request->validated();

        $file->update(
            $validated
        );

        return response()->json([
            'media' => $file
        ], 201);
    }

    /**
     * Delete media file
     * @authenticated
     * @param Media $file
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Media $file)
    {
        $file->delete();

        return response()->json([
            'media' => $file
        ], 201);
    }
}
