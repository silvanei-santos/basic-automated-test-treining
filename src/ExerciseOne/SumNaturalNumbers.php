<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

class SumNaturalNumbers
{
    public function __construct(private NumberIsMultipleStrategy $strategy)
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
            if ($this->strategy->isMultiple($naturalNumber)) {
                $total += $naturalNumber->value;
            }
        }

        return $total;
    }
}
