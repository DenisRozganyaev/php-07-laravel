<?php

namespace App\Services;

class Translate
{
    public function __construct(protected string $locale)
    {
    }

    public function translate(string $text)
    {
        return $this->locale . ' => ' . $text;
    }
}
