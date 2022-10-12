<?php
//получаем массив с нужной иерархией: родитель - потомки
function createTree($array, $sub=0, $tab='')
{
    $data = [];
    if ($sub > 0) {
        $tab.='&nbsp;&nbsp;&nbsp;';
    }
    foreach ($array as $v) { // с помощью рекурсии проверяем вложенные элементы
        if ($sub == $v->parent_id) {
            $data[$v->id] = $tab.$v->name . " (".mb_strimwidth($v->text, 0, 20, "...").")";
            $data += createTree($array, $v->id, $tab);
        }
    }
    return $data;
}

//получаем массив для удаления элементов (если выбрали родителя - удаляем и его потомков)
function createTreeForDelete($items, $id)
{
    $data = [$id];
    foreach ($items as $item) {
        if ($item->parent_id == $id) {
            $data[] = $item->id;
        }
    }
    return $data;
}