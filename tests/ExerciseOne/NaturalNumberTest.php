<?php

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\NaturalNumber;

class NaturalNumberTest extends TestCase
{
    public function testNaturalNumberInvalid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative numbers are not allowed');
        new NaturalNumber(-1);
    }
}
