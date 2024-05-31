<?php

namespace app\controllers;

use app\classes\Cart;
use app\classes\Redirect;
use app\models\Travel;
use Stripe\StripeClient;

class CheckoutController
{

    public function checkout()
    {

        $buyOneTravel = filter_input(INPUT_GET, "travel", FILTER_SANITIZE_SPECIAL_CHARS);

        if ($buyOneTravel) {

            $travel = Travel::findyBy("slug", $buyOneTravel);

            if (Cart::cart()) {
                Cart::clearCart();
            }

            Cart::add($travel->slug);
        }

        if (!count(Cart::cart())) {
            Redirect::back();
        }

        $private_key = $_ENV["STRIPE_SECRET_KEY"];

        $stripeInstance = new StripeClient($private_key);

        $items = [
            "mode" => "payment",
            "allow_promotion_codes" => true,
            "success_url" => $_ENV["BASE_URL"] . "/success",
            "cancel_url" => $_ENV["BASE_URL"] . "/cancel",
        ];

        if (Cart::cart()) {

            foreach (Cart::cart() as $travel) {

                $items["line_items"][] = [

                    "price_data" => [
                        "currency" => "brl",
                        "product_data" => [
                            "name" => $travel["name"]
                        ],
                        "unit_amount" => $travel["price"] * 100,
                    ],

                    "quantity" => $travel["quantity"]
                ];
            }

            $checkout_session = $stripeInstance->checkout->sessions->create($items);

            return Redirect::to($checkout_session->url);
        }
    }
}
