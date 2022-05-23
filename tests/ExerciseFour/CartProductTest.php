<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\CartProduct;

class CartProductTest extends TestCase
{
    public function testShouldReturnTheTotalOfAProduct(): void
    {
        $cartProduct = new CartProduct(1, 10.99, 10);
        $total = $cartProduct->total();
        $this->assertEquals(109.90, $total);
    }
}
