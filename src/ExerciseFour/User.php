<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

class User
{
    public function __construct(public readonly string $name, public readonly string $cep)
    {
    }
}
