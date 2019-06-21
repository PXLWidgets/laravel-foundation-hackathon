<?php


namespace App\Contracts\ViewModels;


use Illuminate\Support\Collection;

interface QuestionInterface
{
    public function content(): string;

    /**
     * This is the nth question... (order)
     * @return int
     */
    public function order(): int;

    /**
     * @return Collection|AnswerInterface[]
     */
    public function answers(): Collection;
}
