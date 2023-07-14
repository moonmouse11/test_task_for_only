<?php

include $_SERVER['DOCUMENT_ROOT'] . "/src/core.php";

if (!empty($_POST) && !empty($_POST['email'])) {
    $equalsPasswords = true;
    $user = $_POST['email'];
    $userNotExist = is_null(checkUser($user));
    if ($userNotExist && !empty($_POST['passwordFirst']) && !empty($_POST['passwordSecond'])) {
        $first = $_POST['passwordFirst'];
        $second = $_POST['passwordSecond'];
        $cmp = strcmp($first, $second);
        if ($cmp == 0) {
            $succes = registerUser($_POST['name'], $user, $_POST['passwordFirst']);
        } else {
            $equalsPasswords = false;
        }
    }    
}
includeTemplate("header.php", ['text' => "Регистрация", 'miniText' => "Email, имя и пароль"]);
?>

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Форма
                <strong>Регистрации</strong>
            </h2>
            <hr>
            <p>Ничего сложного</p>
            <form action="/registration/" role="form" method="post">
                <?php if(!empty($_POST)) { 
                    if($succes) { includeTemplate("/message/succesMessage.php", ['message' => "Вы успешно зарегистрированы"]); } }?> 
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Имя</label>
                        <input type="text" name="name" class="form-control" value="<?= $name = $_POST['name'] ?? "" ?>">
                    </div>
                </div>
                <?php if(!empty($_POST)) { 
                    if(!$userNotExist) { includeTemplate("/message/errorMessage.php", ['message' => "Пользователь с таким email зарегистрирован"]); } }?> 
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $name = $_POST['email'] ?? "" ?>">
                    </div>
                </div>
                <?php if(!empty($_POST)) {
                    if(!$equalsPasswords) { includeTemplate("/message/errorMessage.php", ['message' => "Пароли не одинаковы"]); } }?> 
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Пароль</label>
                        <input type="password" name="passwordFirst" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Подтверждение пароля</label>
                        <input type="password" name="passwordSecond" class="form-control">
                    </div>
                </div>
                <div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                        <input type="hidden" name="action" value="login">
                        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php includeTemplate("footer.php");
