<?php

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

class SumNaturalNumbers
{
    public function __construct(private SumNaturalNumbersStrategy $strategy)
    {
    }

    /**
     * @param iterable<NaturalNumber> $naturalNumbers
     * @return int
     */
    public function sum(iterable $naturalNumbers): int
    {
        $total = 0;
        foreach ($naturalNumbers as $naturalNumber) {
            $total += $this->strategy->add($naturalNumber);
        }

        return $total;
    }
}
