<?php

namespace app\classes;

use app\interfaces\CartInterface;
use app\models\Travel;

class Cart implements CartInterface {

    public static function init() {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
            $_SESSION['cart']['products'] = [];
            $_SESSION['cart']['total'] = 0;
        }
    }

    public static function add($travel) {

        self::init();

        $travel = Travel::findyBy('slug', $travel, '=', 'id,image_path,name,price,description,slug');

        if(!$travel) {
            return;
        }

        $formattedTravel = [
            "id" => $travel->id,
            "name" => $travel->name,
            "slug" => $travel->slug,
            "image" => $travel->image_path,
            "price" => $travel->price,
            "description" => $travel->description,
            "quantity" => 1,
        ];

        if(isset($_SESSION['cart']['products'])) {

            $productAdded = false;

            foreach (Cart::cart() as $key => $travelInCart) {

                if($travelInCart['id'] === $travel->id) {
                    Cart::setQuantity($key, 1);
                    $productAdded = true;
                    break;
                }

            }

            if(!$productAdded) {
                $_SESSION['cart']['products'][] = $formattedTravel;
            } 
        } 

        else {
            $_SESSION['cart']['products'][] = $formattedTravel;
        }
 
    }

    public static function remove($travel) {

        $travel = Travel::findyBy('id', $travel, '=', 'id');

        if(empty($travel) || !Cart::cart()) {
            return;
        }

        foreach (Cart::cart() as $key => $travelInCart) {

            if($travelInCart['slug'] === $travel->slug) {
                unset($_SESSION['cart']['products'][$key]);
            }

        }

    }

    public static function clearCart() {
        unset($_SESSION['cart']);
    }

    public static function total() {

        if(Cart::cart()) {
            $total = array_sum(array_map(fn($value) => $value['price'] * $value['quantity'], Cart::cart()));
            return $_SESSION['cart']['total'] = number_format($total, 2);
        }

    }

    public static function cart() {
       return $_SESSION['cart']['products'] ?? [];
    }

    public static function getQuantity() {
        return isset($_SESSION['cart']) ? count($_SESSION['cart']['products']) : 0;
    }

    public static function setQuantity(int $key, int $quantity) {
        $_SESSION['cart']['products'][$key]['quantity'] += $quantity;
    }
}