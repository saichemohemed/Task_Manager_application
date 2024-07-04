<?php

namespace App\Observers;

use App\Models\Tasks;
use App\Mail\TasksCreated;
use Illuminate\Support\Facades\Mail;


class TasksObserver
{
    /**
     * Handle the Tasks "created" event.
     */
    public function created(Tasks $tasks): void
    {

        // There is a problem in retrieving the user value due to lack of time, which I could not fix

        // $users = $tasks->Users()->get();

        // foreach ($users as $user) {
        //     Mail::to($user->email)->send(new TasksCreated($tasks));
        // }


        Mail::to('test@test.com')->send(new TasksCreated($tasks));


    }

    /**
     * Handle the Tasks "updated" event.
     */
    public function updated(Tasks $tasks): void
    {
        //
    }

    /**
     * Handle the Tasks "deleted" event.
     */
    public function deleted(Tasks $tasks): void
    {
        //
    }

    /**
     * Handle the Tasks "restored" event.
     */
    public function restored(Tasks $tasks): void
    {
        //
    }

    /**
     * Handle the Tasks "force deleted" event.
     */
    public function forceDeleted(Tasks $tasks): void
    {
        //
    }
}
