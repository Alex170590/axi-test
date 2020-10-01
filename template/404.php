<?php
header("HTTP/1.0 404 Not Found");
?>
<html>
<head>
    <title><?=Route::$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<section class="header">
    <div class="container header__container">
        <div class="header__block">
            <div class="header__logo">
                Анкетирование
            </div>
            <div class="header__auto">
                <a href="/auto.php">Вход</a>
            </div>
        </div>
    </div>
</section>

<section class="not-found">
    <div class="container not-found__container">
        <h1 class="not-found__h1">404</h1>
        <p class="not-found__p">Документ не найден</p>
        <a href="/" class="not-found__a">Главная</a>
    </div>
</section>

<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>