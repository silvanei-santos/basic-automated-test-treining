<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseTwo;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseTwo\HappyNumber;

class HappyNumberTest extends TestCase
{
    public function testShouldReturnTrueForAHappyNumber(): void
    {
        $happyNumber = new HappyNumber();
        $isAHappyNumber = $happyNumber->isHappy(7);
        $this->assertTrue($isAHappyNumber);
    }

    public function testShouldReturnFalseForANonHappyNumber(): void
    {
        $happyNumber = new HappyNumber();
        $isAHappyNumber = $happyNumber->isHappy(6);
        $this->assertFalse($isAHappyNumber);
        $isAHappyNumber = $happyNumber->isHappy(8);
        $this->assertFalse($isAHappyNumber);
    }

    public function testShouldReturnFalseForNumberLessThanOne(): void
    {
        $happyNumber = new HappyNumber();
        $isAHappyNumber = $happyNumber->isHappy(0);
        $this->assertFalse($isAHappyNumber);
    }
}
