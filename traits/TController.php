<?php

namespace app\traits;


trait TController
{
    public function __call($name, $arguments)
    {
        echo "Вызываемый метод $name не существует";
    }

    public function __set($name, $value)
    {
        echo "Записать свойство {$name} нельзя, так как его не существует \n";
    }

    public function __get($name)
    {
        echo "Получить свойство {$name} нельзя, так как его не существует \n";
    }
}
