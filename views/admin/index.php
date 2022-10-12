<? if($_SESSION['sid']): ?>
    <h1>Главная страница админки</h1>

    <?php //получаем массив с нужной иерархией: родитель - потомки
    function createTree($array, $sub=0, $tab='')
    {
        $data = [];
        if ($sub > 0) {
            $tab.='&nbsp;&nbsp;';
        }
        foreach ($array as $v) { // с помощью рекурсии проверяем вложенные элементы
            if ($sub == $v->parent_id) {
                $data[$v->id] = $tab.$v->name . " (".mb_strimwidth($v->text, 0, 20, "...").")";
                $data += createTree($array, $v->id, $tab);
            }
        }
        return $data;
    }
    $data = createTree($items);

    if (!empty($data)) { ?>
        <p><b>Структура данных:</b></p>
        <ul class='list-items'>
            <? foreach ($data as $item) { ?>
                <li><?=$item?></li>
            <? } ?>
        </ul>
    <?php } ?>

<? endif; ?>

