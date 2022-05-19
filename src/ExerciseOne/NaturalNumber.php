<?php

declare(strict_types=1);

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
