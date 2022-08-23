<?php

include $_SERVER['DOCUMENT_ROOT'] . "/src/core.php";

includeTemplate("header.php", ['text' => "Главная страница", 'miniText' => "Ничего кроме главного"]);

?>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <h2 class="brand-before">
                    <small>А вы выпили с утра чашечку кофе?</small>
                </h2>
                <hr class="tagline-divider">
                <h2>
                    <small>By
                        <strong>Илья Горшков</strong>
                    </small>
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Краткое описание 
                    <strong>тестового задания</strong>
                </h2>
                <hr>
                <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">
                <hr class="visible-xs">
                <p>Небольшая работа для стажировки в OnlyTeam. Реализованы формы регистрации и авторизации. Форма регистрации состоит из четырех полей. Если email зарегистрирован, пользователь получит уведомление. Если пароли не совпадают, пользователь получит другое уведомление. При успешной регистрации пользователь не останется в недоумении. Зарегистрированные пользователи могут авторизоваться, и так же получить уведомления в случае успеха, или неудачи.</p>
            </div>
        </div>
    </div>
</div>
<?php includeTemplate("footer.php");