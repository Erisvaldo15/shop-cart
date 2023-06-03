<?php

namespace app\controllers;

use app\classes\Cart;

class CartController {

    public array $data = [];

    public function index() {    
        return jsonFormat(["cart" => Cart::cart(), "total" => Cart::total(), "quantity" => Cart::getQuantity()]);
    }

    public function add($travel) {
        Cart::add($travel[0]);
        Cart::total();
        return jsonFormat(["cart" => Cart::cart(), "total" => Cart::total(), "quantity" => Cart::getQuantity()]);
    }

    public function remove($travel) {
        Cart::remove($travel[0]);
        Cart::total();
        return jsonFormat(["cart" => Cart::cart(), "total" => Cart::total(), "quantity" => Cart::getQuantity()]);
    }

    public function destroy() {
        Cart::clearCart();
        return jsonFormat(["cart" => Cart::cart(), "total" => Cart::total(), "quantity" => Cart::getQuantity()]);
    }
}