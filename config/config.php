<?php

return [
    'root_dir' => $_SERVER['DOCUMENT_ROOT']."/",
    'controller_namespace' => 'app\controllers\\',
    'defaultController' => 'site',
    'defaultAction' => 'index',
    'useLayout' => true,
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'test-kit',
            'charset' => 'UTF8'
        ],
        'main' => [
            'class' => \app\controllers\FrontController::class
        ],
        'request' => [
            'class' => \app\services\Request::class
        ],
        'user' => [
            'class' => \app\models\User::class
        ],
        'items' => [
            'class' => \app\models\Items::class
        ],
    ],
];
