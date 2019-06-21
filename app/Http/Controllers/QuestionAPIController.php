<?php

namespace App\Http\Controllers;

use App\Question;
 
class QuestionAPIController extends Controller
{
    public function index()
    {
        return Question::all();
    }
 
    public function show($id)
    {
        return Question::with(['answers', 'course'])->find($id);
    }

    public function store(Request $request)
    {
        return Question::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return $question;
    }

    public function delete(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
