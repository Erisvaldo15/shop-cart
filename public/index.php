<?php

ob_start();

session_start();

require_once "../vendor/autoload.php";

use app\core\MyApp;

try {

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
    $dotenv->load();

    $app = new MyApp;
    $app->execute();

} 

catch (\Throwable $th) {
    echo $th->getMessage();
}