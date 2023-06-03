<?php

namespace app\classes;

class Redirect {

    public static function to(string $to) {
        return header("location: {$to}");
    }

    public static function back() {
        
        if(isset($_SESSION["redirect"])) {
            return self::to($_SESSION["redirect"]["previous"]);
        }

    }

    public static function register(string $actualUri) {

        if(!isset($_SESSION["redirect"])) {
            $_SESSION["redirect"] = ["actual" => $actualUri, "previous" => ""];
            return;
        }

        $_SESSION["redirect"] = ["actual" => $actualUri, "previous" => $_SESSION["redirect"]["actual"]];
    }

}