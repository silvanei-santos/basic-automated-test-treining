<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

class MultiplesOf3Or5 implements NumberIsMultipleStrategy
{
    public function isMultiple(NaturalNumber $naturalNumber): bool
    {
        return ($naturalNumber->value % 3 === 0 || $naturalNumber->value % 5 === 0);
    }
}
