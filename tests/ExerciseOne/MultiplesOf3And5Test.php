<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3And5;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\NaturalNumber;

class MultiplesOf3And5Test extends TestCase
{
    public function testShouldReturnMultipleOf3And5(): void
    {
        $multiplesOf3And5 = new MultiplesOf3And5();

        $result = $multiplesOf3And5->isMultiple(new NaturalNumber(15));

        $this->assertEquals(15, $result);
    }

    public function testShouldReturnZeroForNotMultipleOf3And5(): void
    {
        $multiplesOf3And5 = new MultiplesOf3And5();

        $resultFor14 = $multiplesOf3And5->isMultiple(new NaturalNumber(14));
        $resultFor16 = $multiplesOf3And5->isMultiple(new NaturalNumber(16));

        $this->assertEquals(0, $resultFor14);
        $this->assertEquals(0, $resultFor16);
    }
}
