<? if($_SESSION['sid']): ?>
    <p><a href="/admin/">Вернуться на главную</a></p>

    <h2>Редактирование элемента</h2>

    <form method="POST">
        <p><label>Название: <input type="text" name="name" value="<?=$item->name?>" required></label></p>
        <p><label>Описание: <input type="text" name="text" value="<?=$item->text?>" required></label></p>
        <label>Родитель:
            <select style="padding: 10px;" name="parent">
                <option value="null" selected>Выберите родителя</option>
                <? foreach ($items as $val) { // Показываем все элементы кроме самого себя и те которые ссылается на этот
                    if ($val->parent_id !== $item->id) {
                        if ($val->id == $item->parent_id) {
                            echo "<option value='{$val->id}' selected>{$val->name}</option>";
                        } elseif ($val->id !== $item->id) {
                            echo "<option value='{$val->id}'>{$val->name}</option>";
                        }
                    }
                } ?>
            </select>
        </label>
        <p><input type="submit" value="Сохранить"></p>
    </form>
<? endif; ?>