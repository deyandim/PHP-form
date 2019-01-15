<?php

namespace Core;

class Application
{
    private $controllerName;
    private $actionName;
    private $params = [];

    /**
     * Application constructor.
     * @param $controllerName
     * @param $actionName
     * @param array $arguments
     */
    public function __construct($controllerName, $actionName, array $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }

    public function start(): void
    {
        $fullQualifiedName = "Controllers\\" . ucfirst($this->controllerName) . "Controller";
        $controller = new $fullQualifiedName();
        call_user_func_array(
            [$controller, $this->actionName],
            $this->params
        );
    }
}