<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FRESH NEWS</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<div class="container"  style="max-height: 100%">
    <? require "common/header.php"; ?>
    <div id="reg-form">
        <label class="form-title">Регистрация</label></br>
        <p class="error-msg"><?=!empty($_COOKIE['regError']) ? $_COOKIE['regError'] : ""; ?></p>
        <p class="error-msg"><?=!empty($_COOKIE['pswdError']) ? $_COOKIE['pswdError'] : ""; ?></p>
        <form action="/user/reg" method="post">
            <input type="text" id="name-input" name="name" placeholder="Введите Ваше имя" required></br>
            <input type="email" id="email-input" name="email" placeholder="Введите e-mail" required></br>
            <input type="password" id="pswd-input" name="password" placeholder="Введите пароль"
                   maxlength="30" pattern="^[a-zA-z0-9_]{8,}$" required></br>
            <p class="pswd-hint">(латинские буквы, цифры, знаки подчеркивания, не менее 8 символов)</p>
            <button class="submit-btn">Зарегистрироваться</button>
        </form>
    </div>
    <? require "common/footer.php"; ?>