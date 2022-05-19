<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree;

use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3Or5;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\NaturalNumber;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseTwo\HappyNumber;

class WordInNumberAnalyzer
{
    public function __construct(
        private readonly HappyNumber $happyNumber,
        private readonly MultiplesOf3Or5 $multiplesOf3Or5,
        private readonly PrimeNumber $primeNumber,
    ) {
    }

    public function analyze(WordInNumber $word): AnalyzedWordInNumbersDto
    {
        $wordsInNumbersDto = new AnalyzedWordInNumbersDto();
        $wordsInNumbersDto->word = $word->word;
        $wordsInNumbersDto->number = $word->number;
        $wordsInNumbersDto->isMultiple3Or5 = $this->multiplesOf3Or5->isMultiple(new NaturalNumber($word->number));
        $wordsInNumbersDto->isHappy = $this->happyNumber->isHappy($word->number);
        $wordsInNumbersDto->isPrime = $this->primeNumber->isPrime($word->number);
        return $wordsInNumbersDto;
    }
}
