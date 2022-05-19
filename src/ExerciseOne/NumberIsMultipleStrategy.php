<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

interface NumberIsMultipleStrategy
{
    public function isMultiple(NaturalNumber $naturalNumber): bool;
}
