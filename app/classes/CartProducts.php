<?php

namespace app\classes;

use app\database\models\Read;
use app\interface\CartInterface;

class CartProducts {

    public function products(CartInterface $cartInterface) {
       
        $productsInCart = $cartInterface->cart();

        $read = new Read;

        $products = [];
        $total = 0;

        foreach($productsInCart as $productId => $quantity) {

            $product = $read->find($productId);

            $products[] = [
                'id' => $productId,
                'product' => $product[0]->name,
                'price' => $product[0]->price,
                'qty' => $quantity,
                'subtotal' => $quantity * $product[0]->price
            ];

            $total += $quantity * $product[0]->price;
        }

        return [
            'products' => $products,
            'total' => $total
        ];
        
    }

}