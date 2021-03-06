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
    <div class="container form__container mb-50">
        <form action="/action/action.php" method="post" enctype="multipart/form-data" class="form__action">
            <input type="hidden" name="token" value="<?=$app->token?>">
            <input type="hidden" name="action_type" value="questionnaire">
            <div class="form__paragraph">
                <div class="form__paragraph-item form__paragraph-item--active">Шаг 1</div>
                <div class="form__paragraph-item">Шаг 2</div>
                <div class="form__paragraph-item">Шаг 3</div>
                <div class="form__paragraph-item">Шаг 4</div>
            </div>
            <div class="form__list">
                <div class="form__item form__item--active">
                    <div class="form__group mb-15">
                        <div class="form__field-name">Выбор пола <span class="form__required">*</span></div>
                        <div class="form__field">
                            <input id="male" type="radio" checked name="param[gender]" value="Мужской">
                            <label for="male">мужской</label>
                        </div>
                        <div class="form__field">
                            <input id="female" type="radio" name="param[gender]" value="Женский">
                            <label for="female">женский</label>
                        </div>
                    </div>
                    <div class="form__field form__field--required mb-15">
                        <label for="surname" class="form__field-name">Фамилия <span class="form__required">*</span></label>
                        <input id="surname" required type="text" checked name="param[surname]" value="">
                        <div class="form__field-error">
                            <span>Введите фамилию</span>
                        </div>
                    </div>
                    <div class="form__field mb-15">
                        <label for="name" class="form__field-name">Имя</label>
                        <input id="name" type="text" name="param[name]" value="">
                    </div>
                    <div class="form__field mb-15">
                        <label for="middle" class="form__field-name">Отчество</label>
                        <input id="middle" type="text" name="param[middle]" value="">
                    </div>
                    <div class="form__field form__field--required mb-15">
                        <label for="data_birth" class="form__field-name">Дата рождения <span class="form__required">*</span></label>
                        <input required id="data_birth" type="text" name="param[data_birth]" value="" placeholder="Пример: дд.мм.гггг">
                        <div class="form__field-error form__field-error--text">
                            <span>Введите дату рождения</span>
                        </div>
                        <div class="form__field-error form__field-error--birth">
                            <span>Не верно введина дата</span>
                        </div>
                    </div>
                    <div class="form__nav">
                        <a href="" class="form__nav-next">Вперёд</a>
                    </div>
                </div>
                <div class="form__item">
                    <div class="form__field form__field--required mb-15">
                        <label for="avatar" class="form__field-name">Загрузка аватарки</label>
                        <input id="avatar" type="file" data-max-weight="100" name="param[avatar]" value="" accept=".png, .jpg, .jpeg">
                        <div class="form__field-error form__field-error--weight">
                            <span>Не более 100 Кб</span>
                        </div>
                    </div>
                    <div class="form__group form__group mb-15">
                        <div class="form__field-name">Выбор цвета</div>
                        <div class="form__color">
                            <?php foreach ($app->color as $key => $val){ ?>
                                <div class="form__field">
                                    <input id="color<?=$key?>" <?=$key == 0 ? 'checked' : ''?> type="radio" name="param[color]" value="<?=$val['name']?>">
                                    <label for="color<?=$key?>" style="background-color: <?=$val['hex']?>"></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form__nav">
                        <a href="" class="form__nav-prev">Назад</a>
                        <a href="" class="form__nav-next">Вперёд</a>
                    </div>
                </div>
                <div class="form__item">
                    <div class="form__field mb-15">
                        <label for="personal_qualities" class="form__field-name">Личные качества</label>
                        <textarea id="personal_qualities" name="param[personal_qualities]" cols="40" rows="8"></textarea>
                    </div>
                    <div class="form__group mb-15">
                        <div class="form__field-name">Ваши навыки</div>
                        <?php foreach ($app->skills as $key => $val){ ?>
                            <div class="form__field">
                                <input id="skills<?=$key?>" type="checkbox" name="param[skills][]" value="<?=$val?>">
                                <label for="skills<?=$key?>"><?=$val?></label>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form__nav">
                        <a href="" class="form__nav-prev">Назад</a>
                        <a href="" class="form__nav-next">Вперёд</a>
                    </div>
                </div>
                <div class="form__item">
                    <div class="form__field form__field--required mb-15">
                        <label for="photo" class="form__field-name">Загрузка фотографий</label>
                        <input id="photo" multiple type="file" data-max-weight="1024" data-max-count="5" name="param[photo][]" value="" accept=".png, .jpg, .jpeg">
                        <div class="form__field-error form__field-error--weight">
                            <span>Не более 1 Мб фото</span>
                        </div>
                        <div class="form__field-error form__field-error--count">
                            <span>Не более 5 фото</span>
                        </div>
                    </div>

                    <div class="form__nav">
                        <a href="" class="form__nav-prev">Назад</a>
                        <button class="form__nav-button" type="submit">Отправить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>