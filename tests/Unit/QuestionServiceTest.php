<?php

namespace Tests\Unit;

use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\CourseInterface;
use App\Contracts\ViewModels\QuestionInterface;
use App\Support\QuestionService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class QuestionServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_adds_given_answer_to_session()
    {
        $course = \Mockery::mock(CourseInterface::class, [
            'getId' => 1
        ]);

        $question1 = \Mockery::mock(QuestionInterface::class, [
            'getCourse' => $course,
            'getId' => 2,
            'getAnswers' => new Collection([
                \Mockery::mock(AnswerInterface::class)
            ]),
            'getCorrectAnswer' => \Mockery::mock(AnswerInterface::class, [
                'getId' => 3
            ])
        ]);
        $answer1 = \Mockery::mock(AnswerInterface::class, [
            'getId' => 3
        ]);

        $course->shouldReceive('getQuestions')->andReturn(new Collection([
            $question1
        ]));

        $service = new QuestionService();
        $service->answerQuestion($question1, $answer1);

        $this->assertTrue($service->validateAnswers($course));
    }

}
