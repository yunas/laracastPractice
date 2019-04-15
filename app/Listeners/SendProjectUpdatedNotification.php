<?php

namespace App\Listeners;

use App\Events\ProjectUpdated;
use App\Mail\ProjectUpdated as ProjectUpdatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendProjectUpdatedNotification
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
     * @param  ProjectUpdated  $event
     * @return void
     */
    public function handle(ProjectUpdated $event)
    {
        $project = $event->project;
        dump($project);
        Mail::to($project->owner->email)->send(
            
            new ProjectUpdatedMail($project)
                // new ProjectCreated()
        );
    }
}
