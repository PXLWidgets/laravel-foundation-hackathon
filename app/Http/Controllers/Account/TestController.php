<?php

namespace App\Http\Controllers\Account;

use App\Course;
use App\Events\CourseCompleted;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $course = Course::where(['id'=>2])->first();

        event(new CourseCompleted($course));

        return view('home.index');
    }
}
