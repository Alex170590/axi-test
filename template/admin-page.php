<?php
$app = new App();
$db = new Db();
$app->noPage();
$page = $db->select('axi_questionnaires', ['id' => (new Route())->params[1]])->result(0);
//if()
?>

<html>
<head>
    <title>Анкета # <?=$page['id']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<?php include "include/header.php"?>

<section class="page">
    <div class="container page__container mt-50 mb-50">
        <h1 class="page__h1">Анкета # <?=$page['id']?></h1>
        <div class="page__meta">
            <div class="page__meta-title">Дата публикации</div>
            <div class="page__meta-text"><?=$app->filterDbDate($page['date'])?></div>
        </div>
        <?php if($page['avatar'] != ''){ ?>
            <div class="page__meta">
                <div class="page__meta-title">Аватар</div>
                <div class="page__meta-text">
                    <img src="<?=$page['avatar']?>" alt="">
                </div>
            </div>
        <?php } ?>
        <div class="page__meta">
            <div class="page__meta-title">Пол</div>
            <div class="page__meta-text"><?=$page['gender']?></div>
        </div>
        <div class="page__meta">
            <div class="page__meta-title">Фамилия</div>
            <div class="page__meta-text"><?=$page['surname']?></div>
        </div>
        <div class="page__meta">
            <div class="page__meta-title">Имя</div>
            <div class="page__meta-text"><?=$page['name']?></div>
        </div>
        <div class="page__meta">
            <div class="page__meta-title">Отчество</div>
            <div class="page__meta-text"><?=$page['middle']?></div>
        </div>
        <div class="page__meta">
            <div class="page__meta-title">Дата рождения</div>
            <div class="page__meta-text"><?=$app->filterDbDate($page['data_birth'])?></div>
        </div>
        <div class="page__meta">
            <div class="page__meta-title">Цвет</div>
            <div class="page__meta-text"><?=$page['color']?></div>
        </div>
        <div class="page__meta">
            <div class="page__meta-title">Личные качества</div>
            <div class="page__meta-text"><?=$page['personal_qualities']?></div>
        </div>
        <?php if($page['skills'] != ''){ ?>
            <div class="page__meta">
                <div class="page__meta-title">Навыки</div>
                <div class="page__meta-text">
                    <ul>
                        <?php foreach ($page['skills'] as $item){ ?>
                            <li><?=$item?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <?php if($page['photo'] != ''){ ?>
            <div class="page__meta">
                <div class="page__meta-title">Фото</div>
                <div class="page__meta-photo">
                    <?php foreach ($page['photo'] as $item){ ?>
                        <a href="<?=$item?>">
                            <img src="<?=$item?>" alt="">
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>