<?php

include $_SERVER['DOCUMENT_ROOT'] . "/src/core.php";

includeTemplate("header.php", ['text' => "Авторизация", 'miniText' => "Email и пароль"]);

if (! empty($_POST)) {
    $user = $_POST['email'];
    $password = $_POST['password'];
    $userNotExist = is_null(checkUser($user));
    $rightPassword = checkPassword($user, $password);
    if(! $userNotExist && $rightPassword) {
        $succes = true;
        session_start();
        $_SESSION['id'] = checkUser($user)['id'];
    }

}

?>
<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Форма
                <strong>Авторизации</strong>
            </h2>
            <hr>
            <p>Все очень просто. Email и пароль</p>
            <form action="/login/" role="form" method="post">
            <?php if(! empty($_POST)) { 
                    if($succes) { includeTemplate("/message/succesMessage.php", ['message' => "Вы успешно авторизованы"]); 
                    } elseif ($userNotExist) {
                        includeTemplate("/message/errorMessage.php", ['message' => "Пользователь с этим email не зарегистрирован"]);
                    }
                }?> 
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $name = $_POST['email'] ?? "" ?>">
                    </div>
                </div>
                <?php if(! empty($_POST)) {
                    if(! $rightPassword) {
                        includeTemplate("/message/errorMessage.php", ['message' => "Неверный пароль"]);
                    }
                } ?>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Пароль</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                        <input type="hidden" name="action" value="login">
                        <button type="submit" class="btn btn-default">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php includeTemplate("footer.php");
