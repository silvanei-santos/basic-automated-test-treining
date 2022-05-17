<?php

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

use InvalidArgumentException;

final class NaturalNumber
{
    public function __construct(public readonly int $value)
    {
        if ($this->value < 0) {
            throw new InvalidArgumentException('Negative numbers are not allowed');
        }
    }
}
