<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

class CalculateOrder
{
    public function __construct(private readonly FreightCalculator $freightCalculator)
    {
    }

    public function calculate(Cart $cart): float
    {
        $freightTotal = 0;
        $cartTotal = $cart->total();
        if ($cartTotal < 100) {
            $freightTotal = $this->freightCalculator->calculate($cart->cep());
        }
        return (float)bcadd("$cartTotal", "$freightTotal", 2);
    }
}
