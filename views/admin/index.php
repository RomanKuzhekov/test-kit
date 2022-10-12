<? if($_SESSION['sid']): ?>
    <h1>Главная страница админки</h1>

    <?
    $data = createTree($items); //получаем массив с нужной иерархией: родитель - потомки

    if (!empty($data)) { ?>
        <p><b>Структура данных:</b></p>
        <ul class='list-items'>
            <? foreach ($data as $id => $item) {?>
                <li><?=$item?> <span class="tools"><a href="#" class="add">&#10010;</a> <a href="/admin/edit/<?=$id?>" class="edit">&#9998;</a> <a href="/admin/delete/<?=$id?>" id="delete" class="delete">&#10006;</a></span></li>
            <? } ?>
        </ul>
    <?php } ?>

<? endif; ?>

