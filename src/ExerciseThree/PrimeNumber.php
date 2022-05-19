<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree;

class PrimeNumber
{
    public function isPrime(int $number): bool
    {
        if ($number <= 1) {
            return false;
        }
        for ($x = 2; $x <= sqrt($number); $x++) {
            if ($number % $x === 0) {
                return false;
            }
        }
        return true;
    }
}
