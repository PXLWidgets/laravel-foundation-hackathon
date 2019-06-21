<?php


namespace App\Contracts\ViewModels;


use Illuminate\Support\Collection;

interface CourseInterface
{
    public function imageUrl(): string;

    public function imageAlt(): ?string;

    public function pageUrl(): string;

    public function title(): string;

    public function questionCount(): int;

    public function description(): string;

    /**
     * @return Collection|ResourceInterface[]
     */
    public function resources(): Collection;

}
