<?php

namespace App\Listeners;

use App\Events\UserUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UserUpdatedEmail;
use Illuminate\Support\Facades\Mail;

class SendUserUpdatedEmail
{
    public function handle(UserUpdated $event)
    {
        Mail::to($event->user->email)->send(new UserUpdatedEmail($event->user));
    }
}
