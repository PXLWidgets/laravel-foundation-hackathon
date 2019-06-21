<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\QuestionInterface;
use App\Http\Requests\PostAnswerRequest;
use App\Question;
use Session;

class QuestionsController extends Controller
{
    public const SESSION_KEY = 'courses.';

    public function show($questionId)
    {
        $question = Question::findOrFail($questionId);

        return view('questions.show', compact('question'));
    }

    public function answer(PostAnswerRequest $request)
    {
        /** @var AnswerInterface $answer */
        $answer = Answer::findOrFail($request->get('answer_id'));
        $question = $answer->getQuestion();
        $course = $question->getCourse();
        $sessionKey = self::SESSION_KEY . $course->id;

        $answered = Session::get($sessionKey, []);

        $answered = array_merge($answered, [$question->id => $answer-> id]);
        Session::put($sessionKey, $answered);

        $nextQuestion = Question::where('course_id', $course->id)
            ->where('order', $question->getOrder() + 1);

        if ($nextQuestion instanceof QuestionInterface) {
            return redirect('questions.show', ['question' => $question->id]);
        }

        return redirect('questions.process-answers');
    }

}
