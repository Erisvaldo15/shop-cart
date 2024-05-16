<?php

namespace app\interfaces;

interface CartInterface {

    public static function add($travel);

    public static function remove($product);

    public static function getQuantity();

    public static function setQuantity(int $key, int $quantity, string $typeOperation);

    public static function clearCart();

    public static function cart();
}