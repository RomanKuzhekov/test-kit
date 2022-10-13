<?php

namespace app\controllers;

use app\base\App;

/**
 * Главная страница сайта
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $items = $this->getModelItems()->getAll();

        echo $this->render("{$this->controllerName}/$this->actionName", [
            'items' => $items
        ]);
    }

    private function getModelItems()
    {
        return App::call()->items;
    }
}