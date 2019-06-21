<?php

namespace App\Contracts\ViewModels;

use App\Question;

interface AnswerInterface
{
    public function getId(): int;

    public function isCorrect(): bool;

    public function getContent(): string;

    public function getQuestion(): QuestionInterface;
}
