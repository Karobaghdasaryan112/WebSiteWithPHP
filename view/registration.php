<?php
session_start();
include_once "../config/database.php";
global  $connect;
if(!isset($_SESSION['buttonregister'])){
    header("location: ./login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/registration.css">
</head>
<body>
<!-- bolor classner@ kam id ner@ sksum en registration ov -->
<div class="registration_window">
    <div class="registration_header">
        <img src="../assets/img/logo.png" alt="logo" class="registration_instagram_logo">
        <span class="registration_text_registration">Зарегистрируйтесь, чтобы смотреть фото и видео ваших друзей.</span>
        <button class="registration_with_fb">
            <img src="../assets/img/fb.png">
            <span class="with_facebook">Войти через Facebook</span>
        </button>
        <div class="registration_or">
            <div id="registration_left_line"></div>
            <div class="registration_ili">или</div>
            <div id="registration_right_line"></div>
        </div>
        <form class="registration_form" action="../actions/registrationAction.php" method="post">
            <input type="email" class="registration_email" name="email" placeholder="Моб. телефон или эл. адрес "id="input">
                <span id="registration_error">
                    <?php if (isset($_SESSION['error']['registration']['email'])) echo  "*".$_SESSION['error']['registration']['email']?>
                </span>
            <input type="text" class="name_and_lastname" name="fullname" placeholder="Имя и фамилия" id="input">
                <span  id="registration_error">
                    <?php if (isset($_SESSION['error']['registration']['fullname'])) echo  "*".$_SESSION['error']['registration']['fullname']?>
                </span>
            <input type="text" class="username" name="username" id="input" placeholder="Имя пользователя">
                <span  id="registration_error">
                    <?php if (isset($_SESSION['error']['registration']['username'])) echo  "*".$_SESSION['error']['registration']['username']?>
                </span>
                <input type="password" class="password" name="password" placeholder="Пароль" id="input">
                <span  id="registration_error">
                    <?php if (isset($_SESSION['error']['registration']['password'])) echo  "*".$_SESSION['error']['registration']['password']?>
                </span>
            <span style="text-align: center" class="span" id="span_1">Люди, которые пользуются нашим сервисом, могли загрузить вашу контактную информацию в Instagram. </span>
            <br>
            <span style="text-align: center" class="span">Регистрируясь, вы принимаете наши Условия Политику конфиденциальности и Политику в отношении файлов cookie</span>
            <input type="submit" class="registration_submit" value="Регистрация" name="submit">
        </form>
    </div>
    <div class="back_login">
        <span style="color: #737373FF; margin-right: 5px">Есть аккаунт? </span>
        <a href="login.php" style="text-decoration: none">Вход</a>
    </div>
    <div class="registration_app_install">
        <p>Установите приложение.</p>
        <div class="registration_googleplay_apple">
            <img src="../assets/img/googleplay-button.png" class="registration_googleplay">
            <img src="../assets/img/apple-button.png" class="registration_apple">
        </div>
    </div>
</div>
<script src="../assets/js/registrations.js"></script>
</body>
</html>
