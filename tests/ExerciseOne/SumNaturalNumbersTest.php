<?php

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne;

use Generator;
use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3And5;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3Or5;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3Or5And7;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\NaturalNumber;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\SumNaturalNumbers;

class SumNaturalNumbersTest extends TestCase
{
    public function testMustAddAllMultiplesOf3Or5OfNaturalNumbersBelow1000(): void
    {
        $sumMultiplos = new SumNaturalNumbers(new MultiplesOf3Or5());
        $naturalNumbers = $this->generateNaturalNumbers();

        $total = $sumMultiplos->sum($naturalNumbers);

        $this->assertEquals(234168, $total);
    }

    public function testMustAddAllMultiplesOf3And5OfNaturalNumbersBelow1000(): void
    {
        $sumMultiplos = new SumNaturalNumbers(new MultiplesOf3And5());
        $naturalNumbers = $this->generateNaturalNumbers();

        $total = $sumMultiplos->sum($naturalNumbers);

        $this->assertEquals(33165, $total);
    }

    public function testMustAddAllMultiplesOf3Or5And7OfNaturalNumbersBelow1000(): void
    {
        $sumMultiplos = new SumNaturalNumbers(new MultiplesOf3Or5And7());
        $naturalNumbers = $this->generateNaturalNumbers();

        $total = $sumMultiplos->sum($naturalNumbers);

        $this->assertEquals(33173, $total);
    }

    /**
     * @return Generator<NaturalNumber>
     */
    private function generateNaturalNumbers(): Generator
    {
        for ($naturalNumber = 0; $naturalNumber <= 1000; $naturalNumber++) {
            yield new NaturalNumber($naturalNumber);
        }
    }
}
