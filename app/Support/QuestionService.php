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
        $course = $question->getCourse();

        Session::push(
            self::SESSION_KEY . "." . $course->getId(),
            [
                'question' => $question->getId(),
                'answer'   => $answer->getId(),
            ]
        );
    }

    public function validateAnswers(CourseInterface $course)
    {
        $questions = $course->getQuestions();
        $answers   = Session::get(self::SESSION_KEY . "." . $course->getId());

        if ($answers === null || count($answers) !== $questions->count()) {
            return false;
        }

        foreach ($questions as $question) {
            $rightAnswer = $question->getCorrectAnswer();
            $answer      = $this->getGivenAnswer($answers, $question->getId());

            if ($rightAnswer->getId() !== $answer) {
                return false;
            }
        }

        return true;
    }

    protected function getGivenAnswer(array $answers, int $questionId)
    {
        foreach ($answers as $answer) {
            if ($answer['question'] === $questionId) {
                return $answer['answer'];
            }
        }

        return null;
    }
}
