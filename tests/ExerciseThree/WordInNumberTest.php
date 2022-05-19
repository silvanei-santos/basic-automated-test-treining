<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree\WordInNumber;

class WordInNumberTest extends TestCase
{
    public function testShouldReturnTheValueOfAWord(): void
    {
        $word = new WordInNumber('abcd2!*&@#"');
        $this->assertEquals(10, $word->number);
        $word = new WordInNumber('ABCD');
        $this->assertEquals(114, $word->number);
    }

    public function testMustReturnAnExceptionForMoreThanOneWord(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one word is allowed');
        new WordInNumber('Word To Numbers');
    }
}
