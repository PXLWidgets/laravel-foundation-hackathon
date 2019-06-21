<?php

namespace App\Http\Controllers;

use App\Answers;
 
class AnswersAPIController extends Controller
{
    public function index()
    {
        return Answers::all();
    }
 
    public function show($id)
    {
        return Answers::with(['question'])->find($id);
    }

    public function store(Request $request)
    {
        return Answers::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $answers = Answers::findOrFail($id);
        $answers->update($request->all());

        return $answers;
    }

    public function delete(Request $request, $id)
    {
        $answers = Answers::findOrFail($id);
        $answers->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
