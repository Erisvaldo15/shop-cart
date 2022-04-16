<?php

session_start();

require_once "../vendor/autoload.php";

use app\classes\Cart;

(new Cart)->clear();

header("location: index.php");