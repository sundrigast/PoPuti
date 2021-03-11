<?php

namespace App\Observers;

use App\Models\Media;

class MediaObserver
{
    /**
     * Handle the media "deleted" event.
     *
     * @param Media $media
     * @return void
     */
    public function deleted(Media $media)
    {
        $media->filesystem()->deleteDirectory(
            $media->getDirectory()
        );
    }
}
