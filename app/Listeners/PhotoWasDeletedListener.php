<?php

namespace App\Listeners;

use App\Events\PhotoWasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Photo;

class PhotoWasDeletedListener
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
     * @param  PhotoWasDeleted  $event
     * @return void
     */
    public function handle(PhotoWasDeleted $event)
    {
        Photo::destroy($event->id);
    }
}
