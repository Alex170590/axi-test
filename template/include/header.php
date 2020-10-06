<section class="header">
    <div class="container header__container">
        <div class="header__block">
            <div class="header__logo">
                <a href="/">Анкетирование</a>
            </div>
            <div class="header__auto">
                <?php if($_SESSION['user'] == 'applicant'){ ?>
                    <a href="/auth">Вход</a>
                <?php } else { ?>
                    <a href="/admin">Админ панель</a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>