<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

interface FreightCalculator
{
    public function calculate(string $cep): float;
}
