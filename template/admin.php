<?php
$app = new App();
$db = new Db();
$navigation = new Navigation($db->select('axi_questionnaires', $_SESSION['filter'])->num_rows(), 5, (new Route())->params[1], '/admin');
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

<section class="list">
    <div class="container list__container mt-50 mb-50">
        <div class="filter">
            <form action="/action/action.php" method="post">
                <input type="hidden" name="token" value="<?=$app->token?>">
                <input type="hidden" name="url" value="/admin">
                <input type="hidden" name="action_type" value="filter">
                <select name="params[skills.json]" id="skills">
                    <?php foreach ($app->skills as $key => $val){ ?>
                        <option <?=(!empty($_SESSION['filter']['skills']) && $_SESSION['filter']['skills'] == $val) ? 'selected' : ''?> value="<?=$val?>"><?=$val?></option>
                    <?php } ?>
                </select>
                <button type="submit" name="submit" value="search">Поиск</button>
                <button type="submit" name="submit" value="close">Отмена</button>
            </form>
        </div>
        <table class="table" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Аватар</th>
                    <th>
                        <form action="/action/action.php" method="post">
                            <input type="hidden" name="token" value="<?=$app->token?>">
                            <input type="hidden" name="url" value="<?=(new Route())->request_uri?>">
                            <input type="hidden" name="action_type" value="sort">
                            <input type="hidden" name="params[0]" value="surname">
                            <?php if($_SESSION['sort'][1] == 'desc'){ ?>
                                <input type="hidden" name="params[1]" value="asc">
                            <?php } else { ?>
                                <input type="hidden" name="params[1]" value="desc">
                            <?php } ?>
                            <button type="submit" name="submit" value="sort">Фамилия</button>
                            <?php if(count($_SESSION['sort']) != 0 && $_SESSION['sort'][0] == 'surname'){ ?>
                                <button type="submit" name="submit" value="close">&#10006;</button>
                            <?php } ?>
                        </form>
                    </th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Пол</th>
                    <th>Цвет</th>
                    <th>
                        <form action="/action/action.php" method="post">
                            <input type="hidden" name="token" value="<?=$app->token?>">
                            <input type="hidden" name="url" value="<?=(new Route())->request_uri?>">
                            <input type="hidden" name="action_type" value="sort">
                            <input type="hidden" name="params[0]" value="data_birth">
                            <?php if($_SESSION['sort'][1] == 'desc'){ ?>
                                <input type="hidden" name="params[1]" value="asc">
                            <?php } else { ?>
                                <input type="hidden" name="params[1]" value="desc">
                            <?php } ?>
                            <button type="submit" name="submit" value="sort">Дата рождения</button>
                            <?php if(count($_SESSION['sort']) != 0 && $_SESSION['sort'][0] == 'data_birth'){ ?>
                                <button type="submit" name="submit" value="close">&#10006;</button>
                            <?php } ?>
                        </form>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db->select('axi_questionnaires', $_SESSION['filter']);
                $db->limit($navigation->count_page);
                if(count($_SESSION['sort']) != 0){
                    $db->sort($_SESSION['sort'][0], $_SESSION['sort'][1]);
                } else {
                    $db->sort('id', 'desc');
                }
                $db->offset($navigation->start);
                foreach ($db->result() as $item){ ?>
                    <tr>
                        <td><?=$item['id']?></td>
                        <td>
                            <?php if($item['avatar'] != ''){ ?>
                                <img src="<?=$item['avatar']?>" alt="">
                            <?php } ?>
                        </td>
                        <td><?=$item['surname']?></td>
                        <td><?=$item['name']?></td>
                        <td><?=$item['middle']?></td>
                        <td><?=$item['gender']?></td>
                        <td><?=$item['color']?></td>
                        <td>
                            <?=$app->filterDbDate($item['data_birth'])?>
                        </td>
                        <td><a href="/admin/page<?=$item['id']?>">Подробнее</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php $navigation->view();?>
    </div>
</section>
<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>