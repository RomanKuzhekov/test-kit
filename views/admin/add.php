<? if($_SESSION['sid']): ?>
    <p><a href="/admin/">Вернуться на главную</a></p>

    <h2>Добавление элемента</h2>

    <form method="POST">
        <p><label>Название: <input type="text" name="name" value="<?=$_POST["name"]?>" required></label></p>
        <p><label>Описание: <input type="text" name="text" value="<?=$_POST["text"]?>" required></label></p>
        <label>Родитель:
            <select style="padding: 10px;" name="parent">
                <? if (!empty($item->id)): ?>
                    <option value="<?=$item->id?>" selected><?=$item->name?></option>
                <? else: ?>
                    <option value="null" selected>В корень</option>
                <? endif; ?>
            </select>
        </label>
        <p><input type="submit" value="Сохранить"></p>
    </form>
<? endif; ?>