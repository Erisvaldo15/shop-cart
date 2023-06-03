<?php

namespace app\core;

use app\logs\LoggerFile;
use app\logs\Log;
use app\enums\EnumLog;

class Method {

    public function extract($controllerAndMethod, $controllerInstance) {

        $methodController = explode(':', $controllerAndMethod)[1];
        
        if(!method_exists($controllerInstance, $methodController)) {
            Log::create(new LoggerFile('Method does not exist', EnumLog::ControllerError));
            return false;
        }

        return $methodController;
    }

}