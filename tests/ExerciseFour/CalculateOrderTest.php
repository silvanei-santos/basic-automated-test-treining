<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\Cart;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\CalculateOrder;

class CalculateOrderTest extends TestCase
{
    public function testMustNotChargeFreightForPurchasesUnderOnHundred(): void
    {
        $stubCart = $this->createStub(Cart::class);
        $stubCart->method('total')->willReturn(100.00);
        $fakeFreightCalculatorCorreios = new FakeFreightCalculatorCorreios();
        $freight = new CalculateOrder($fakeFreightCalculatorCorreios);
        $freightValue = $freight->calculate($stubCart);
        $this->assertEquals(100.00, $freightValue);
    }

    public function testMustChargeShippingForPurchasesGreaterThanOrEqualToOneHundred(): void
    {
        $mockCart = $this->createMock(Cart::class);
        $mockCart->method('total')->willReturn(100.01);
        $mockCart->expects($this->exactly(1))->method('cep');
        $fakeFreightCalculatorCorreios = new FakeFreightCalculatorCorreios();
        $freight = new CalculateOrder($fakeFreightCalculatorCorreios);
        $freightValue = $freight->calculate($mockCart);
        $this->assertEquals(130.00, $freightValue);
    }

    public function testMustCalculateWithTwoDigitPrecision(): void
    {
        $mockCart = $this->createMock(Cart::class);
        $mockCart->method('total')->willReturn(100.99999);
        $mockCart->expects($this->exactly(1))->method('cep');
        $fakeFreightCalculatorCorreios = new FakeFreightCalculatorCorreios();
        $freight = new CalculateOrder($fakeFreightCalculatorCorreios);
        $freightValue = $freight->calculate($mockCart);
        $this->assertEquals(130.99, $freightValue);
    }
}
