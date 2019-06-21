<?php

namespace App\Contracts\ViewModels;

interface AnswerInterface
{
    public function isCorrect(): bool;

    public function getContent(): string;

}
