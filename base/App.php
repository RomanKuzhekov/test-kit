<?php

namespace app\base;

require '../vendor/autoload.php';
require '../traits/Singleton.php';

use app\controllers\Controller;
use app\services\Db;
use app\traits\Singleton;


/**
 * Главный класс для входа в приложение
 * Используем Синглтон для одиночного подключения класса
 * подключили автозагрузчик файлов Composera
 * используем магический метод get для подключения компонентов прописанных в конфиге
 * запускаем FrontController для обработки строки(controller/action/id) переданной в бразуер
 *
 * Class App
 * @package app\base
 * @property Controller main
 * @property Db db
 */
class App
{
    use Singleton;

    public $config;
    private $items = [];
    private $components;

    public static function call()
    {
        return static::getInstance();
    }

    public function run()
    {
        $this->config = include "../config/config.php";
        include "../config/functions.php";
        $this->main->runAction();  //запускаем FrontController
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param string $key
     * @return mixed
     */
    private function get(string $key)
    {
        if (!isset($this->items[$key])) {
            $this->items[$key] = $this->createComponent($key);
        }
        return $this->items[$key];
    }

    /**
     * @param string $name
     * @return object
     * @throws \Exception
     */
    private function createComponent(string $name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $className = $params['class'];
            if (class_exists($className)) {
                //реализуем подгрузку компонента для создания экзмепляра и загрузки свойств в конструктор(например для класса Db)
                unset($params['class']);
                $reflection = new \ReflectionClass($className);
                return $this->components = $reflection->newInstanceArgs($params);
            }
            throw new \Exception("Класс $className не был найден");
        }
        throw new \Exception("Компонент $name не существует в config.php");
    }

}