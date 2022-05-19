<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree;

class AnalyzedWordInNumbersDto
{
    public function __construct(
        public string $word = '',
        public int $number = 0,
        public bool $isPrime = false,
        public bool $isHappy = false,
        public bool $isMultiple3Or5 = false,
    ) {
    }
}
