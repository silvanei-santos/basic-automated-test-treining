<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree;

use InvalidArgumentException;

class WordInNumber
{
    public readonly int $number;

    public function __construct(public readonly string $word)
    {
        if (str_word_count($this->word) > 1) {
            throw new InvalidArgumentException('Only one word is allowed');
        }

        $letters = str_split($this->word);
        $lettersMappedToValue = array_map(
            callback: $this->mapLeterToValue(...),
            array: $letters,
        );
        $this->number = array_sum($lettersMappedToValue);
    }

    private function mapLeterToValue(string $letter): int
    {
        $dictionary = ['', ...range('a', 'z'), ...range('A', 'Z')];
        $index = array_search($letter, $dictionary);
        if (is_int($index)) {
            return $index;
        }
        return 0;
    }
}
