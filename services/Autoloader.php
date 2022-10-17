<?php

namespace app\services;


class Autoloader
{
    function loadClass($classname)
    {
        $classname = str_replace("app\\", $_SERVER['DOCUMENT_ROOT']."/", $classname);
        $classname = str_replace("\\","/",$classname.".php");
        if (file_exists($classname)) {
            require $classname;
        }
    }
}