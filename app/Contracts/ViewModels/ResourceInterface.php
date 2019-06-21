<?php

namespace App\Contracts\ViewModels;

interface ResourceInterface
{
    public function label(): ?string;

    public function url(): string;
}
