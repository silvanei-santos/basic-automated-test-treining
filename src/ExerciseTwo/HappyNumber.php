<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseTwo;

class HappyNumber
{
    public function isHappy(int $number): bool
    {
        if ($number < 1) {
            return false;
        }
        $evaluatedNumbers = [];
        while ($this->wasNotEvaluated($number, $evaluatedNumbers)) {
            $evaluatedNumbers[] = $number;
            $number = $this->sumOfSquareOfDigits($number);
        }
        return $number === 1;
    }

    /**
     * @param int $number
     * @param array<int> $evaluatedNumbers
     * @return bool
     */
    private function wasNotEvaluated(int $number, array $evaluatedNumbers): bool
    {
        return ! in_array($number, $evaluatedNumbers);
    }

    private function sumOfSquareOfDigits(int $number): int
    {
        $sumOfSquares = 0;
        foreach ($this->digitsInANumber($number) as $digit) {
            $sumOfSquares += pow((int)$digit, 2);
        }
        return $sumOfSquares;
    }

    /**
     * @param int $number
     * @return array<string>
     */
    private function digitsInANumber(int $number): array
    {
        return str_split("$number");
    }
}
