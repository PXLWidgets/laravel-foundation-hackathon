<?php

namespace App\Support;

use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\CourseInterface;
use App\Contracts\ViewModels\QuestionInterface;
use Session;

class QuestionService
{
    public const SESSION_KEY = 'active-courses';

    public function answerQuestion(QuestionInterface $question, AnswerInterface $answer)
    {
        $course     = $question->getCourse();

        Session::push(
            self::SESSION_KEY . "." . $course->id,
            [$question->id => $answer->id]
        );
    }

    public function validateAnswers(CourseInterface $course)
    {
        $questions = $course->getQuestions();
        $answers = Session::get(self::SESSION_KEY . "." . $course->id);

        if ($answers === null || count($answers) !== $questions->count()) {
            return false;
        }

        foreach ($questions as $question) {
            $rightAnswer = $question->getAnswers()->where('is_correct', true)->first();
            $answer = $answers[$question->id];

            if ($rightAnswer->id !== $answer) {
                return false;
            }
        }

        return true;
    }
}
