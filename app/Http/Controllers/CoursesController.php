<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = new Collection();
        return view('courses.index', compact('courses'));
    }

    public function show()
    {
        return view('courses.show');
    }
}
