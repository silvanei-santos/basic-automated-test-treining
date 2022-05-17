<?php

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

class MultiplesOf3Or5And7 implements SumNaturalNumbersStrategy
{
    public function add(NaturalNumber $naturalNumber): int
    {
        if (($naturalNumber->value % 3 === 0 | $naturalNumber->value % 5 === 0) && $naturalNumber->value % 7 === 0) {
            return $naturalNumber->value;
        }
        return 0;
    }
}
