<?php

namespace app\services;


/**
 * Парсим адресную строку браузера и возвращаем имя:
 * контроллера, актион, параметры
 *
 * Class Request
 * @package app\services
 * @property string requestString
 */
class Request
{
    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;
    private $patterns = [
        "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui"
    ];

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest()
    {
        foreach ($this->patterns as $pattern) {
            if (preg_match_all($pattern, $this->requestString, $matches)) {
                $this->controllerName = $matches['controller'][0];
                $this->actionName = $matches['action'][0];
                $this->params = $matches['params'][0];
                return;
            }
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getactionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }
}