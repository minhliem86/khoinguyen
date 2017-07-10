<?php

namespace App\Listeners;

use App\Events\PhotoWasUploaded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Photo;

class PhotoWasUploadedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PhotoWasUploaded  $event
     * @return void
     */
    public function handle(PhotoWasUploaded $event)
    {
        	Photo::create($event->data);
    }
}
