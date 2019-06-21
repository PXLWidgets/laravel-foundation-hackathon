<?php

namespace App\Http\Controllers;

use App\Course;
 
class CourseAPIController extends Controller
{
    public function index()
    {
        return Course::all();
    }
 
    public function show($id)
    {
        return Course::with(['questions', 'certificates'])->find($id);
    }

    public function store(Request $request)
    {
        return Course::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return $course;
    }

    public function delete(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
