<?php

namespace app\core;

use app\logs\LoggerFile;
use app\logs\Log;
use app\enums\EnumLog;

class Controller
{

    private string $namespace = "app\\controllers\\";

    public function extract($controllerAndMethod)
    {

        $controllerName = explode(":", $controllerAndMethod)[0];
        $namespaceController = $this->namespace . $controllerName;

        if (!class_exists($namespaceController)) {
            Log::create(new LoggerFile("Controller does not exist", EnumLog::ControllerError));
        }

        return $namespaceController;
    }
}
