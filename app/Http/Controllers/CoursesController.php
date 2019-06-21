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

        $maxWidth = $this->getWidestPartInTree($courses);
        $maxWidth = floor(12 / $maxWidth);

        $courses = $courses->groupBy('parent_id');

        return view('courses.index', compact('courses', 'maxWidth'));
    }

    public function show(int $courseId)
    {
        /** @var CourseInterface $course */
        $course = Course::findOrFail($courseId);
        return view('courses.show', compact('course'));
    }

    public function success(int $courseId)
    {
        /** @var CourseInterface $course */
        $course = Course::findOrFail($courseId);

        dd('Succeeded ' . $course->getTitle());
    }

    public function failure(int $courseId)
    {
        /** @var CourseInterface $course */
        $course = Course::findOrFail($courseId);

        dd('Failed ' . $course->getTitle());
    }

    protected function getWidestPartInTree(Collection $courses)
    {
        $grouped = [];
        foreach ($courses as $course) {
            $grouped[$course['parent_id'] === null ? 0 : $course['parent_id']][] = $course;
        }

        $max = collect($grouped)->max(function($item) {
            return count($item);
        });
        return $max;
    }
}
