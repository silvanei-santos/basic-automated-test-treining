<?php

declare(strict_types=1);

namespace Tests\SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

use PHPUnit\Framework\TestCase;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\Cart;
use SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour\CalculateOrder;

class CalculateOrderTest extends TestCase
{
    public function testMustChargeFreightForPurchasesUnderOneHundred(): void
    {
        $mockCart = $this->createMock(Cart::class);
        $mockCart->method('total')->willReturn(99.99);
        $mockCart->expects($this->exactly(1))->method('cep');
        $fakeFreightCalculatorCorreios = new FakeFreightCalculatorCorreios();
        $freight = new CalculateOrder($fakeFreightCalculatorCorreios);
        $freightValue = $freight->calculate($mockCart);
        $this->assertEquals(129.98, $freightValue);
    }

    public function testMustNotChargeShippingForPurchasesEqualToOneHundred(): void
    {
        $mockCart = $this->createMock(Cart::class);
        $mockCart->method('total')->willReturn(100.00);
        $mockCart->expects($this->never())->method('cep');
        $fakeFreightCalculatorCorreios = new FakeFreightCalculatorCorreios();
        $freight = new CalculateOrder($fakeFreightCalculatorCorreios);
        $freightValue = $freight->calculate($mockCart);
        $this->assertEquals(100.00, $freightValue);
    }

    public function testMustCalculateWithTwoDigitPrecision(): void
    {
        $mockCart = $this->createMock(Cart::class);
        $mockCart->method('total')->willReturn(0.99999);
        $mockCart->expects($this->exactly(1))->method('cep');
        $fakeFreightCalculatorCorreios = new FakeFreightCalculatorCorreios();
        $freight = new CalculateOrder($fakeFreightCalculatorCorreios);
        $freightValue = $freight->calculate($mockCart);
        $this->assertEquals(30.98, $freightValue);
    }
}
