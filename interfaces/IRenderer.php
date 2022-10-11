<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 14.12.2017
 * Time: 21:35
 */

namespace app\interfaces;


interface IRenderer
{
    public function render($template, $params);
}
