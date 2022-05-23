<?php

declare(strict_types=1);

namespace SilvaneiSantos\BasicAutomatedTestTreining\ExerciseFour;

class Cart
{
    /**
     * @var CartProduct[]
     */
    private array $cartProducts = [];

    public function __construct(private readonly User $user)
    {
    }

    public function add(Product $product, int $quantity): void
    {
        $cartProduct = $this->findCartProductById($product->id);
        if ($cartProduct) {
            $this->remove($product->id);
            $quantity += $cartProduct->quantity;
        }
        $this->cartProducts[] = new CartProduct($product->id, $product->price, $quantity);
    }

    public function total(): float
    {
        return (float)array_reduce(
            array: $this->cartProducts,
            callback: fn(string $carry, CartProduct $cartProduct) => bcadd("{$cartProduct->total()}", $carry, 2),
            initial: "0.00",
        );
    }

    public function remove(int $productId): void
    {
        $this->cartProducts = array_filter(
            $this->cartProducts,
            fn(CartProduct $cartProduct) => $cartProduct->idProduct !== $productId
        );
    }

    public function cep(): string
    {
        return $this->user->cep;
    }

    private function findCartProductById(int $productId): ?CartProduct
    {
        $cartProducts = array_filter(
            $this->cartProducts,
            fn(CartProduct $cartProduct) => $cartProduct->idProduct === $productId
        );
        return $cartProducts[0] ?? null;
    }
}
