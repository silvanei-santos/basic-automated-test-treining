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
        while ($number > 1 && $this->wasNotEvaluated($number, $evaluatedNumbers)) {
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
            $sumOfSquares += pow($digit, 2);
        }
        return $sumOfSquares;
    }

    /**
     * @param int $number
     * @return array<int>
     */
    private function digitsInANumber(int $number): array
    {
        $digits = str_split("$number");
        return array_map(fn($digit) => (int)$digit, $digits);
    }
}
