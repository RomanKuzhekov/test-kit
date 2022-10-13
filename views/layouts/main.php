<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css" media="all"/>
    <script src="/assets/js/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/script.js"></script>
</head>
<body>
<div id="container">
    <header></header>
    <div class="leftblock"></div>

    <div class="content">
        <h1>Тестовое задание</h1>
<!--        <ul>-->
<!--            <li><a href="/" class="active">Главная</a></li>-->
<!--            --><?php //if(!empty($_SESSION['sid'])): ?>
<!--                <li>Личный кабинет:</li>-->
<!--                <li><a href="/auth/profile" style="text-decoration: underline; color: blue;">--><?//=ucfirst($_SESSION['name'])?><!-- (--><?//=$_SESSION['login']?><!--)</a></li>-->
<!--                <li><a href='/auth/logout'><u>Выйти</u> </a></li>-->
<!--            --><?php //else: ?>
<!--                <li><a href='/auth/login'><u>Войти</u></a></li>-->
<!--                <li><a href='/auth/signup'><u>Регистрация</u></a></li>-->
<!--            --><?php //endif; ?>
<!--        </ul>-->
<!--        <hr>-->

        <?=$content?>
    </div>

    <br><hr>
    <footer>
        <p>&copy; Test.</p>
    </footer>
</div>
</body>
</html>