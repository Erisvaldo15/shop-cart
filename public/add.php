<?php

session_start();

ini_set("display_errors", 1);

require_once "../vendor/autoload.php";

use app\classes\Cart;

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

(new Cart)->add($id);

header("location: index.php?produto {$id} adicionado com sucesso");