<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

class CartProduct
{
    public function __construct(
        public readonly int $idProduct,
        public readonly float $price,
        public readonly int $quantity
    ) {
    }

    public function total(): float
    {
        return $this->price * $this->quantity;
    }
}
