<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

class MultiplesOf3Or5And7 implements NumberIsMultipleStrategy
{
    public function isMultiple(NaturalNumber $naturalNumber): bool
    {
        return (
            ($naturalNumber->value % 3 === 0 | $naturalNumber->value % 5 === 0)
            && $naturalNumber->value % 7 === 0
        );
    }
}
