<?php

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3Or5;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\NaturalNumber;

class MultiplesOf3Or5Test extends TestCase
{
    public function testShouldReturnMultipleOf3Or5(): void
    {
        $multiplesOf3Or5 = new MultiplesOf3Or5();

        $resultFor3 = $multiplesOf3Or5->add(new NaturalNumber(3));
        $resultFor5 = $multiplesOf3Or5->add(new NaturalNumber(5));

        $this->assertEquals(3, $resultFor3);
        $this->assertEquals(5, $resultFor5);
    }

    public function testShouldReturnZeroForNotMultipleOf3Or5(): void
    {
        $multiplesOf3Or5 = new MultiplesOf3Or5();

        $resultFor2 = $multiplesOf3Or5->add(new NaturalNumber(2));
        $resultFor4 = $multiplesOf3Or5->add(new NaturalNumber(4));
        $resultFor6 = $multiplesOf3Or5->add(new NaturalNumber(7));


        $this->assertEquals(0, $resultFor2);
        $this->assertEquals(0, $resultFor4);
        $this->assertEquals(0, $resultFor6);
    }
}
