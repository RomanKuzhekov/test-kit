<?php

namespace app\controllers;

use app\base\App;
use app\services\Auth;


/**
 * Главный контроллер для работы с админкой
 * Class AdminController
 * @package app\controllers
 */
class AdminController extends Controller
{

    public function actionIndex()
    {
        if (empty($_SESSION['sid'])) { // Если не авторизованы - переходим на страницу авторизации
            $this->redirect('admin/login');
        }

        $items = $this->getModelItems()->getAll();

        echo $this->render("{$this->controllerName}/$this->actionName", [
            'items' => $items
        ]);
    }

    /**
     * Авторизация
     * @return false|void
     */
    public function actionLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!$user = $this->getModel()->getByLoginPass(trim(strip_tags($_POST['login'])), trim(strip_tags($_POST['password'])))) {
                $message = "Вы ввели не корректные данные!";
                echo $this->render("{$this->controllerName}/$this->actionName", ['message' => $message]);
                return false;
            }
            (new Auth())->openSession($user);
            $this->redirect('admin/index');
        }

        if (!empty($_SESSION['sid'])) {
            $this->redirect('admin/index');
        }

        echo $this->render("{$this->controllerName}/$this->actionName");
    }

    /**
     * Выход из авторизации
     * @return void
     */
    public function actionLogout()
    {
        session_unset();
        session_destroy();
        $this->redirect('admin');
    }

    /**
     * Регистрация
     * @return false|void
     */
    public function actionSignup()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($this->getModel()->create(
                [
                    'name' => trim(strip_tags($_POST['name'])),
                    'login' => trim(strip_tags($_POST['login'])),
                    'email' => trim(strip_tags($_POST['email'])),
                    'password' => md5(trim(strip_tags($_POST['password']))),
                    'created_at' => trim(strip_tags($this->getDate()))
                ]
            )
            ) {
                if (!$user = $this->getModel()->getByLoginPass(trim(strip_tags($_POST['login'])), trim(strip_tags($_POST['password'])))) {
                    return false;
                }
                (new Auth())->openSession($user);
                $this->redirect('admin');
            }
        } else {
            echo $this->render("{$this->controllerName}/$this->actionName");
        }
    }

    /**
     * Редактируем выбранный элемент
     * @return void
     */
    public function actionEdit()
    {
        $idElement = App::call()->request->getParams();
        if (!empty($idElement)) {
            $item = $this->getModelItems()->getOne($idElement);
            if (empty($item)) {
                die('Такого элемента нет. Вернитесь назад.');
            }

            $items = $this->getModelItems()->getAll();

            //Если отредактировали данные в форме и нажали Сохранить
            if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["name"]) && !empty($_POST["text"])) {
                if ($this->getModelItems()->update(
                    [
                        'id' => $idElement,
                        'name' => trim(strip_tags($_POST['name'])),
                        'text' => trim(strip_tags($_POST['text'])),
                        'parent_id' => trim(strip_tags($_POST['parent']))
                    ]
                )) {
                    $this->redirect('admin');
                }
            }

            echo $this->render("{$this->controllerName}/$this->actionName", [
                'item' => $item,
                'items' => $items,
            ]);
        }
    }

    /**
     * Удаляем выбранный элемент
     * @return void
     */
    public function actionDelete()
    {
        $idElement = App::call()->request->getParams();
        if (!empty($idElement) && $_SERVER['REQUEST_METHOD'] == "GET") {
            //Если он корневой - ищем потомков и удаляем их тоже
            $items = $this->getModelItems()->getAll();
            foreach ($items as $item) {
                if ($item->parent_id == $idElement) {
                    $itemsDelete = createTreeForDelete($items, $item->id);
                }
            }
            $itemsDelete[] = $idElement;
            foreach ($itemsDelete as $key => $id) {
                $this->getModelItems()->delete('id', $id); // удаляем элемент
                unset($itemsDelete[$key]);
            }

            // Если все элементы удалены - переходим на главную страницу
            if (empty($itemsDelete)) {
                $this->redirect('admin');
            }
        }
    }

    private function getModel()
    {
        return App::call()->user;
    }

    private function getModelItems()
    {
        return App::call()->items;
    }
}