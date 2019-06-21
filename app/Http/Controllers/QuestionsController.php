<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\QuestionInterface;
use App\Course;
use App\Exceptions\InvalidAmountOfAnswersException;
use App\Exceptions\NotAllAnswersCorrectException;
use App\Http\Requests\PostAnswerRequest;
use App\Question;
use App\Support\QuestionService;

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
        /** @var QuestionInterface $question */
        $question = Question::findOrFail($questionId);

        if ($question->getOrder() === 1) {
            $this->service->clearGivenAnswers();
        }

        return view('questions.show', compact('question'));
    }

    public function answer(PostAnswerRequest $request)
    {
        /** @var AnswerInterface $answer */
        $answer     = Answer::findOrFail($request->get('answer_id'));
        $question   = $answer->getQuestion();
        $course     = $question->getCourse();

        $this->service->answerQuestion($question, $answer);

        $nextQuestion = Question::where('course_id', $course->getId())
            ->where('order', $question->getOrder() + 1)
            ->first();

        if ($nextQuestion instanceof QuestionInterface) {
            return redirect(route('questions.show', ['question' => $nextQuestion->getId()]));
        }

        return redirect(route('questions.process-answers', ['course' => $course->getId()]));
    }

    public function processAnswers(int $courseId)
    {
        $course = Course::findOrFail($courseId);

        try {
            $this->service->validateAnswers($course);
        } catch (InvalidAmountOfAnswersException $exception) {
            return redirect(route('courses.show', ['course' => $courseId]));
        } catch (NotAllAnswersCorrectException $exception) {
            return redirect(route('courses.failure', ['course' => $courseId]))->with('wrongQuestions', $exception->getWrongQuestions());
        } finally {
            $this->service->clearGivenAnswers();
        }

        $user = \Auth::user();
        $user->courses()->save($course);

        return redirect(route('courses.failure', ['course' => $courseId]));
    }

}
