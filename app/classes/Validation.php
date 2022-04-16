<?php

namespace app\classes;

use Throwable;

class Validation {

    public static function verifyPage() {

        try {
            require load(); // Aqui precisa ser um require...
        }

        catch(Throwable $e) {
            echo "<p class='text-danger'> Erro: {$e->getMessage()} </p> ";
        }

    }

}