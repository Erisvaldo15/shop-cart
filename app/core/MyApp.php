<?php

namespace app\core;

use app\classes\Redirect;
use app\controllers\PageNotFoundController;
use app\routes\Routes;
use app\logs\LoggerFile;
use app\logs\Log;
use app\interfaces\MyAppInterface;
use app\enums\EnumLog;

class MyApp implements MyAppInterface
{

    public function execute()
    {

        $routes = Routes::extract();
        $actualUri = Uri::extract();
        $request = Request::extract();

        if (!isset($routes[$request][$actualUri]) && !Routes::filter($actualUri, $routes)) {
            Log::create(new LoggerFile("Problem with request type", EnumLog::RouterError));
            return Redirect::to("/");
        }

        $controllerAndMethod = Routes::filter($actualUri, $routes[$request]);

        $namespaceController = (new Controller)->extract($controllerAndMethod);

        $controllerInstance = new $namespaceController($actualUri);

        $method = (new Method)->extract($controllerAndMethod, $controllerInstance);

        $parameter = (new Parameter)->extract($controllerAndMethod, $routes[$request], $actualUri);

        if (!$method) {
            $controllerInstance = new PageNotFoundController($actualUri);
            $controllerInstance->index();
        } else {
            $controllerInstance->$method($parameter);
        }

        if (isset($_SERVER["CONTENT_TYPE"]) && strtolower($_SERVER["CONTENT_TYPE"]) === "application/json" || $request !== "get") {
            die;
        }

        if (isset($controllerInstance->data)) {
            extract($controllerInstance->data);
        }

        if (isset($controllerInstance->template) && isset($controllerInstance->view)) {

            try {
                require_once "../app/views/{$controllerInstance->template}";
            } catch (\Throwable $th) {
                Log::create(new LoggerFile($th->getMessage(), EnumLog::RouterError));
            }
        }
    }
}
