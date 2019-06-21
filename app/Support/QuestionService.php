<?php

namespace App\Support;

use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\CourseInterface;
use App\Contracts\ViewModels\QuestionInterface;
use App\Exceptions\InvalidAmountOfAnswersException;
use App\Exceptions\NotAllAnswersCorrectException;
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
            throw new InvalidAmountOfAnswersException('Invalid amount of answers.');
        }

        $errors = [];

        foreach ($questions as $question) {
            $rightAnswer = $question->getCorrectAnswer();
            $answer      = $this->getGivenAnswer($answers, $question->getId());

            if ($rightAnswer->getId() !== $answer) {
                $errors[] = $question->getId();
            }
        }

        if (!empty($errors)) {
            throw new NotAllAnswersCorrectException('Not all questions were answered correctly', $errors);
        }
    }

    public function clearGivenAnswers()
    {
        Session::remove(self::SESSION_KEY);
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
