<?php

namespace App\Events;

use App\Course;
use Illuminate\Queue\SerializesModels;

class CourseCompleted
{
    use SerializesModels;

    public $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }
}