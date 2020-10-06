<?php
$app = new App();
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

<?php include "include/header.php"?>

<section class="form">
    <div class="container form__container mt-50">
        <form action="/action/action.php" method="post" class="form__action">
            <input type="hidden" name="token" value="<?=$app->token?>">
            <input type="hidden" name="action_type" value="auth">
            <?php if(isset($_GET['error'])){ ?>
                <div class="form__block-error">
                    <p>Введен неверный логин или пароль!</p>
                </div>
            <?php } ?>
            <div class="form__field form__field--required mb-15">
                <label for="login" class="form__field-name">Логин <span class="form__required">*</span></label>
                <input id="login" type="text" checked name="param[login]" value="">
                <div class="form__field-error">
                    <span>Введите логин</span>
                </div>
            </div>
            <div class="form__field form__field--required mb-15">
                <label for="pasыword" class="form__field-name">Пароль <span class="form__required">*</span></label>
                <input id="pasыword" type="password" checked name="param[password]" value="">
                <div class="form__field-error">
                    <span>Введите пароль</span>
                </div>
            </div>
            <div class="form__nav">
                <button class="form__nav-button form__nav-button--float-left" type="submit">Войти</button>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>