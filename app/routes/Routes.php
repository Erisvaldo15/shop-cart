<?php

namespace app\routes;

use app\enums\EnumLog;
use app\logs\Log;
use app\logs\LoggerFile;

class Routes {

    public static function extract() {
       
        return [

            "get" => [
                "/" => "HomeController:index",
                "/travels" => "TravelController:index",
                "/travel/[a-z]+(?:-[a-z]+)*$" => "TravelController:show",
                "/cart" => "CartController:index",
                "/cart/add/[a-z]+(?:-[a-z]+)*$" => "CartController:add",
                "/cart/remove/[a-z]+(?:-[a-z]+)*$" => "CartController:remove",
                "/cart/clear" => "CartController:clear",
                "/contact" => "ContactController:index",
                "/about" => "AboutController:index",
                "/signin" => "SignInController:index",
                "/signup" => "SignUpController:index",
                "/checkout" => "CheckoutController:checkout",
                "/success" => "StatusCheckoutController:success",
                "/cancel" => "StatusCheckoutController:cancel",
            ],

            "post" => [
                "/send/email" => "EmailController:index",
                "/signin/store" => "SigninController:store",
                "/signup/store" => "SignupController:store",
            ]

        ];

    }

    private static function staticRoute($actualUri, $routes) {

        if(array_key_exists($actualUri, $routes)) {
            return $routes[$actualUri];
        }

        return null;
    }

    private static function dynamicRoute($actualUri, $routes) {

       foreach ($routes as $uri => $controllerAndMethod) {

            $regex = str_replace('/', '\/', ltrim($uri, '/'));

            if($uri !== '/' && preg_match("/^$regex$/", ltrim($actualUri, '/'))) {
                $routerFound = $controllerAndMethod;
                break;
            } 
            
            $routerFound = null;
        }

        return $routerFound;
    }


    public static function filter($actualUri, $routes) {

        $router = self::staticRoute($actualUri, $routes);

        if($router) {
            return $router;
        }

        $routerDynamic = self::dynamicRoute($actualUri, $routes);

        if($routerDynamic) {
            return $routerDynamic;
        }

        if(!array_key_exists($actualUri, $routes)) {
            Log::create(new LoggerFile('Router does not exist', EnumLog::RouterError));
            return "PageNotFoundController:index";
        } 

    }

}