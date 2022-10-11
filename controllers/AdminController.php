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

        echo $this->render("{$this->controllerName}/$this->actionName");
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

    private function getModel()
    {
        return App::call()->user;
    }
}