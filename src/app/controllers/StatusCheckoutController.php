<?php

namespace app\controllers;

use app\classes\Cart;

class StatusCheckoutController
{
    public string $template = "template.php";
    public string $view = "success.php";
    public array $data = [];

    public function success()
    {
        Cart::clearCart();

        $this->data = [
            "title" => "Stripe - success payment",
        ];
    }

    public function cancel()
    {
        $this->view = "cancel.php";
    }
}
