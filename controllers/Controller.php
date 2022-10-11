<?php

namespace app\controllers;

use app\base\App;
use app\interfaces\IRenderer;
use app\services\Renderer;
use app\traits\TController;

/**
 * Основной класс
 * Запуск FrontControllerа c обработкой request запроса в браузере
 * Рендеринг шаблона, вывод на экран
 *
 * Class Controller
 * @package app\controllers
 * @property string controllerName
 * @property string actionName
 */
class Controller
{
    protected $controllerName;
    protected $actionName;
    protected $layout = 'main';
    /** @var Renderer|null */
    public $renderer = null;

    use TController;

    /**
     * Controller constructor.
     * @param null $renderer
     */
    public function __construct(IRenderer $renderer = null)
    {
        $this->renderer = $renderer;
    }

    public function runAction($controller = null, $action = null)
    {
        $this->controllerName = $controller;
        $this->actionName = $action ?: App::call()->config['defaultAction'];
        $action = "action" . ucfirst($this->actionName);
        //формируем имя actiona и запускаем как метод вызываемого класса
        $this->$action();
    }

    public function render($template, $params = [])
    {

        if (App::call()->config['useLayout']) {
            $this->layout = ($this->controllerName !== 'admin') ? $this->layout : 'admin'; //Проверяем если мы в Админке - подгружаем шаблон админки

            return $this->renderTemplate("layouts/" . $this->layout,
                [
                    'content' => $this->renderTemplate($template, $params),
                ]
            );
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    private function renderTemplate($template, $params = [])
    {
        return $this->renderer->render($template, $params);
    }

    protected function redirect($url)
    {
        header("Location: /$url");
    }

    public function getDate()
    {
        return date('Y-m-d H-i-s');
    }

}
