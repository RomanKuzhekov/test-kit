<h2>Главная страница сайта</h2>

<div id="data-structure">
    <?php
    $data = createTree($items); //получаем массив с нужной иерархией: родитель - потомки

    if (!empty($data)) { ?>
        <p><b>Структура данных:</b></p>
        <ul class='list-items'>
            <? foreach ($data as $id => $item) { ?>
                <li><?=$item?></li>
            <? } ?>
        </ul>
    <?php } ?>
</div>



