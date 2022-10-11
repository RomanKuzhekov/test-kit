<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css" media="all"/>
</head>
<body>
<div id="container">
    <header></header>
    <div class="leftblock"></div>

    <div class="content">
        <h1 class="title">Админка</h1>
        <ul>
            <li><a href="/" class="active">Перейти на сайт</a></li>
            <?php if(!empty($_SESSION['sid'])): ?>
                <li><b><?=ucfirst($_SESSION['login'])?></b></li>
                <li><a href='/admin/logout'><u>Выйти</u> </a></li>
            <?php else: ?>
                <li><a href='/admin/login'><u>Войти</u></a></li>
                <li><a href='/admin/signup'><u>Регистрация</u></a></li>
            <?php endif; ?>
        </ul>
        <hr class="clear">

        <?=$content?>
    </div>

    <br><hr>
    <footer>
        <p>&copy; Test.</p>
    </footer>
</div>
</body>
</html>