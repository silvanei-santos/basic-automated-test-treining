<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseThree\PrimeNumber;

class PrimeNumberTest extends TestCase
{
    public function testShouldReturnTrueForAPrimeNumber(): void
    {
        $primeNumber = new PrimeNumber();
        $isPrime = $primeNumber->isPrime(5);
        $this->assertTrue($isPrime);
    }

    public function testShouldReturnFalseForANonPrimeNumber(): void
    {
        $primeNumber = new PrimeNumber();
        $isPrime = $primeNumber->isPrime(1);
        $this->assertFalse($isPrime);
        $isPrime = $primeNumber->isPrime(4);
        $this->assertFalse($isPrime);
        $isPrime = $primeNumber->isPrime(6);
        $this->assertFalse($isPrime);
    }
}
