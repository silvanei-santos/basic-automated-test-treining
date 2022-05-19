<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3Or5And7;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\NaturalNumber;

class MultiplesOf3Or5And7Test extends TestCase
{
    public function testShouldReturnMultipleOf3Or5And7(): void
    {
        $multiplesOf3Or5And7 = new MultiplesOf3Or5And7();

        $resultFor3And7 = $multiplesOf3Or5And7->isMultiple(new NaturalNumber(21));
        $resultFor5And7 = $multiplesOf3Or5And7->isMultiple(new NaturalNumber(35));

        $this->assertEquals(21, $resultFor3And7);
        $this->assertEquals(35, $resultFor5And7);
    }

    public function testShouldReturnZeroForNotMultipleOf3Or5And7(): void
    {
        $multiplesOf3Or5And7 = new MultiplesOf3Or5And7();

        $resultFor20 = $multiplesOf3Or5And7->isMultiple(new NaturalNumber(20));
        $resultFor22 = $multiplesOf3Or5And7->isMultiple(new NaturalNumber(22));
        $resultFor34 = $multiplesOf3Or5And7->isMultiple(new NaturalNumber(34));
        $resultFor36 = $multiplesOf3Or5And7->isMultiple(new NaturalNumber(36));

        $this->assertEquals(0, $resultFor20);
        $this->assertEquals(0, $resultFor22);
        $this->assertEquals(0, $resultFor34);
        $this->assertEquals(0, $resultFor36);
    }
}
