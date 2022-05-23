<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\Cart;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\Product;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\User;

class CartTest extends TestCase
{
    public function testMustMakeAPurchase(): void
    {
        $cart = new Cart(new User('User name', '83.406-310'));
        $cart->add(new Product(1, 'Product 1', 10.00), 1);
        $cart->add(new Product(2, 'Product 2', 15.00), 1);
        $cart->add(new Product(3, 'Product 3', 10.99), 1);
        $total = $cart->total();
        $this->assertEquals(35.99, $total);
    }

    public function testMustReturnZeroForEmptyCart(): void
    {
        $cart = new Cart(new User('User name', '83.406-310'));
        $total = $cart->total();
        $this->assertEquals(0, $total);
    }

    public function testMustIncreaseTheQuantityOfProductsInTheCart(): void
    {
        $cart = new Cart(new User('User name', '83.406-310'));
        $cart->add(new Product(1, 'Product 1', 10.00), 1);
        $cart->add(new Product(1, 'Product 1', 10.00), 1);
        $cart->add(new Product(1, 'Product 1', 10.00), 1);
        $total = $cart->total();
        $this->assertEquals(30, $total);
    }

    public function testMustRemoveAProductInTheCart(): void
    {
        $cart = new Cart(new User('User name', '83.406-310'));
        $cart->add(new Product(1, 'Product 1', 10.00), 1);
        $cart->add(new Product(2, 'Product 2', 15.00), 1);
        $cart->add(new Product(3, 'Product 3', 10.99), 1);
        $total = $cart->total();
        $this->assertEquals(35.99, $total);
        $cart->remove(3);
        $total = $cart->total();
        $this->assertEquals(25.00, $total);
    }

    public function testMustUpdateTheQuantityOfAProductInTheCart(): void
    {
        $cart = new Cart(new User('User name', '83.406-310'));
        $cart->add(new Product(1, 'Product 1', 10.00), 10);
        $total = $cart->total();
        $this->assertEquals(100.00, $total);
        $cart->remove(1);
        $cart->add(new Product(1, 'Product 1', 10.00), 5);
        $total = $cart->total();
        $this->assertEquals(50.00, $total);
    }

    public function testMustCalculateWithTwoDigitPrecision(): void
    {
        $cart = new Cart(new User('User name', '83.406-310'));
        $cart->add(new Product(1, 'Product 1', 10.00999), 1);
        $cart->add(new Product(2, 'Product 2', 15.00123456), 1);
        $cart->add(new Product(3, 'Product 3', 10.999999), 1);
        $total = $cart->total();
        $this->assertEquals(35.99, $total);
    }

    public function testMustReturnTheUserZipCode(): void
    {
        $cart = new Cart(new User('User name', '83.406-310'));
        $cep = $cart->cep();
        $this->assertEquals('83.406-310', $cep);
    }
}
