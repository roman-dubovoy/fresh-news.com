<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FRESH NEWS</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <div class="container" style="max-height: 100%">
        <? require "common/header.php"; ?>
        <div id="auth-form">
            <label class="form-title">Вход</label></br>
            <p class="error-msg"><?=!empty($_COOKIE['authError']) ? $_COOKIE['authError'] : ""; ?></p>
            <form action="/user/auth" method="post">
                <input type="email" id="email-input" name="email" placeholder="Введите e-mail" required></br>
                <input type="password" id="pswd-input" name="password" placeholder="Введите пароль"
                       maxlength="30" pattern="^[a-zA-z0-9_]{8,}$"required></br>
                <a id="reg-link" href="/user/reg">Регистрация</a></br>
                <button class="submit-btn">Войти</button>
            </form>
        </div>
        <? require "common/footer.php"; ?>