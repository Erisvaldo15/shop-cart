<?php

function load() {

    $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $page = (!$page) ? "views/home.php" : "views/{$page}.php";

    if (!file_exists($page)) {
        throw new Exception("Ops, alguma coisa de errada aconteceu");
    }

    return $page;
}
