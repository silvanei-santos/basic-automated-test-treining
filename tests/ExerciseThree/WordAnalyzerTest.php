<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseOne\MultiplesOf3Or5;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree\PrimeNumber;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree\WordInNumberAnalyzer;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree\WordInNumber;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseTwo\HappyNumber;

class WordAnalyzerTest extends TestCase
{
    private WordInNumberAnalyzer $wordInNumberAnalyzer;

    protected function setUp(): void
    {
        $happyNumber = new HappyNumber();
        $multiplesOf3Or5 = new MultiplesOf3Or5();
        $primeNumber = new PrimeNumber();
        $this->wordInNumberAnalyzer = new WordInNumberAnalyzer($happyNumber, $multiplesOf3Or5, $primeNumber);
    }

    public function testIsHappy(): void
    {
        $wordInNumber = new WordInNumber('abcdefg');
        $analyzedWord = $this->wordInNumberAnalyzer->analyze($wordInNumber);
        $this->assertEquals('abcdefg', $analyzedWord->word);
        $this->assertEquals(28, $analyzedWord->number);
        $this->assertTrue($analyzedWord->isHappy);
        $this->assertFalse($analyzedWord->isPrime);
        $this->assertFalse($analyzedWord->isMultiple3Or5);
    }

    public function testIsMultiple3Or5(): void
    {
        $wordInNumber = new WordInNumber('abcde');
        $analyzedWord = $this->wordInNumberAnalyzer->analyze($wordInNumber);
        $this->assertEquals('abcde', $analyzedWord->word);
        $this->assertEquals(15, $analyzedWord->number);
        $this->assertTrue($analyzedWord->isMultiple3Or5);
        $this->assertFalse($analyzedWord->isHappy);
        $this->assertFalse($analyzedWord->isPrime);
    }

    public function testIsPrime(): void
    {
        $wordInNumber = new WordInNumber('k');
        $analyzedWord = $this->wordInNumberAnalyzer->analyze($wordInNumber);
        $this->assertEquals('k', $analyzedWord->word);
        $this->assertEquals(11, $analyzedWord->number);
        $this->assertTrue($analyzedWord->isPrime);
        $this->assertFalse($analyzedWord->isMultiple3Or5);
        $this->assertFalse($analyzedWord->isHappy);
    }
}
