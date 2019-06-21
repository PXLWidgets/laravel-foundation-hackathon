<?php

namespace App\Http\Controllers;

use App\Contracts\ViewModels\CourseInterface;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        dump($courses);
        return view('courses.index', compact('courses'));
    }

    public function show(int $courseId)
    {
        /** @var CourseInterface $course */
        $course = Course::findOrFail($courseId);

        dump($course->isCompletedByUser());
        return view('courses.show', compact('course'));
    }
}
