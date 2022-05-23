<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\FreightCalculator;

class FakeFreightCalculatorCorreios implements FreightCalculator
{
    public function calculate(string $cep): float
    {
        return 29.99;
    }
}
