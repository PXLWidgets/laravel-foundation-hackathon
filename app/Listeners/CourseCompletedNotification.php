<?php

namespace App\Listeners;

use App\Badge;
use App\Certificate;
use App\Events\CourseCompleted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CourseCompletedNotification
{
    public function handle(CourseCompleted $courseCompleted)
    {
        /** @var \App\User $user */
        $user = Auth::user();

        if ($user->getCompletedCourses()->count() == 1) {
            Session::flash('success', 'Je eerste course afgerond! Vanaf nu is je laptop beschikbaar');

            $badge = Badge::orderBy(DB::raw('RAND()'))->first();
            $user->badges()->attach($badge);
        }
        $certificates = $courseCompleted->course->certificates();

        $certificates->each(function (Certificate $certificate) use ($user) {
            $message = sprintf("Je certificaat '%s' is behaald!", $certificate->title);
            Session::flash('success', $message);

            $user->certificates()->attach($certificate);
        });
    }
}
