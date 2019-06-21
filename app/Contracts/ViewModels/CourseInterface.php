<?php


namespace App\Contracts\ViewModels;


use Illuminate\Support\Collection;

interface CourseInterface
{
    public function getImageUrl(): string;

    public function getImageAlt(): ?string;

    public function getPageUrl(): string;

    public function getTitle(): string;

    public function getQuestionCount(): int;

    public function getDescription(): string;

    /**
     * @return Collection|ResourceInterface[]
     */
    public function getResources(): Collection;

    /**
     * @return Collection|QuestionInterface[]
     */
    public function getQuestions(): Collection;
}
