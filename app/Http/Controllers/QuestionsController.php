<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\QuestionInterface;
use App\Course;
use App\Http\Requests\PostAnswerRequest;
use App\Question;
use App\Support\QuestionService;
use Session;

class QuestionsController extends Controller
{
    /**
     * @var QuestionService
     */
    protected $service;

    public function __construct(QuestionService $service)
    {
        $this->service = $service;
    }

    public function show(int $questionId)
    {
        $question = Question::findOrFail($questionId);

        return view('questions.show', compact('question'));
    }

    public function answer(PostAnswerRequest $request)
    {
        /** @var AnswerInterface $answer */
        $answer     = Answer::findOrFail($request->get('answer_id'));
        $question   = $answer->getQuestion();
        $course     = $question->getCourse();

        $this->service->answerQuestion($question, $answer);

        $nextQuestion = Question::where('course_id', $course->id)
            ->where('order', $question->getOrder() + 1);

        if ($nextQuestion instanceof QuestionInterface) {
            return redirect('questions.show', ['question' => $question->id]);
        }

        return redirect('questions.process-answers', ['course' => $course->id]);
    }

    public function processAnswers(int $courseId)
    {
        $course = Course::findOrFail($courseId);
        dd($this->service->validateAnswers($course));
    }

}
