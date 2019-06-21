<?php

namespace App\Contracts\ViewModels;

interface ResourceInterface
{
    public function getId(): int;
    
    public function label(): ?string;

    public function url(): string;
}
