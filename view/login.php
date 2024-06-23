<?php
session_start();
include_once "../config/database.php";
global  $connect;
unset($_SESSION["user"]);
unset($_SESSION['buttonregister']);
?>
<!-- bolor classner@ kam id ner@ sksum en login ov -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>instagram</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body style="color: #00376BFF">
<div class="login_main">
    <div class="login_main_phone">
        <img src="../assets/img/phone.png" alt="phone" class="screenphone">
        <img src="../assets/img/screenshot1.png" class="screenshot1" id="login_carousel" alt="">
    </div>
    <div class="login_form_register">
        <div class="login_form">
            <img src="../assets/img/logo.png" alt="logo" class="login_instagram_logo">
            <form action="../actions/loginAction.php" method="post" class="login_form_form">
                <input type="email" name="email" placeholder="Телефон, имя пользователя или эл. адрес" class="login_input_username">
                <span class="login_error_email_span" id="login_span_error">
                <?php if (isset( $_SESSION['error']['login']['username'])) echo  "*".$_SESSION['error']['login']['username'];?>
                </span>
                <input type="password" name="password" placeholder="Пароль" class="login_input_password">
                <span class="post_error-password_span" id="login_span_error">
                <?php if(isset( $_SESSION['error']['login']['password'])) echo  "*".$_SESSION['error']['login']['password']; ?>
                </span>
                <input  type="submit" name="submit" value="Войти" class="login_input_submit">
            </form>
            <div class="login_or">
                <div id="login_left_line"></div>
                <div class="login_ili">или</div>
                <div id="login_right_line"></div>
            </div>
            <div class="login_facebook">
                <img src="../assets/img/fb.png" alt="fb">
                <div style="color: #385185FF">Войти через Facebook</div>
            </div>
            <div id="login_forgot"><p>Забыли пароль?</p></div>
        </div>
        <div class="login_registration">
            <p class="login_p_registration">  У вас ещё нет аккаунта?  <form action="../actions/loginAction.php" method="post"><input style="position: absolute;bottom: 17px;left: 200px" type="submit" name="registration" value = "Зарегистрироваться"> </form></p>
        </div>
        <div class="login_app_install">
            <p>Установите приложение.</p>
            <div class="login_googleplay_apple">
                <img src="../assets/img/googleplay-button.png" class="login_googleplay">
                <img src="../assets/img/apple-button.png" class="login_apple">
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/login.js"></script>
</body>
</html>
</body>
</html>
