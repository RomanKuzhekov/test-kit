<?php
//получаем массив с нужной иерархией: родитель - потомки
function createTree($array, $sub=0, $tab='')
{
    $data = [];
    if ($sub > 0) {
        $tab .= "<span class='child'>&nbsp;&nbsp;&nbsp;</span>";
    }
    foreach ($array as $v) { // с помощью рекурсии проверяем вложенные элементы
        if ($sub == $v->parent_id) {
            $data[$v->id] = "<span class='item' data-id='{$v->id}' data-parent='{$v->parent_id}'>" . $tab.$v->name . " <span class='text'>(".mb_strimwidth($v->text, 0, 20, "...").")<span> </span>";
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