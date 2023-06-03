<?php 

namespace app\controllers;

use app\classes\Redirect;

class BaseController {

    protected $thereIsNavbarCart = true;
    protected $thereIsHeader = true;
    protected $thereIsFooter = true;

    public function __construct(string $actualUri) {
       Redirect::register($actualUri);
       $this->componentsValidate($actualUri);
    }

    public function componentsValidate($actualUri) {

        $whereThereIsNot = [
            "thereIsNavbarCart" => ["/signin", "/signup"],
            "thereIsHeader" => ["/signin", "/signup"],
            "thereIsFooter" => ["/", "/travels", "/signin", "/signup", "/contact"],
        ];

        foreach ($whereThereIsNot as $component => $routesNotPermitted) {

            foreach ($routesNotPermitted as $key => $routeNotPermitted) {

                if($routeNotPermitted === $actualUri) {
                    $this->$component = false;
                }

            }
        }

    }

}