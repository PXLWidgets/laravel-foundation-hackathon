<?php


namespace App\Contracts\ViewModels;


use Illuminate\Support\Collection;

interface QuestionInterface
{
    public function getId(): int;

    public function getContent(): string;

    /**
     * This is the nth question... (order)
     * @return int
     */
    public function getOrder(): int;

    /**
     * @return Collection|AnswerInterface[]
     */
    public function getAnswers(): Collection;

    public function getCorrectAnswer(): AnswerInterface;

    public function getType(): string;

    public function getCourse(): CourseInterface;

    public function getUrl(): string;
}
