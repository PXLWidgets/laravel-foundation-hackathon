<?php


namespace App\Contracts\ViewModels;


interface CourseInterface
{
    public function imageUrl(): string;

    public function pageUrl(): string;

    public function title(): string;

    public function questionCount(): int;

    public function description(): string;
}
