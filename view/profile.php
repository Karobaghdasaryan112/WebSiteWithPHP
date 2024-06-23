<?php
session_start();
include_once "../config/database.php";
global  $connect;
if(isset($_SESSION["user"])){
    unset($_SESSION["user"]["post_images"]["src"]);
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/css/profile.css">
        <link rel="stylesheet" href="../assets/css/menu.css">
    </head>
    <body style="font-family: 'Segoe UI'; ">
    <div class="Profile_change_img" style="display: none">
        <div class="Profile_change_img_table">
            <img>
        </div>
        <span class="Profile_change_img_sync">Синхронизация фото профиля</span>
        <p class="Profile_change_img_instagram_facebook">Instagram, Facebook</p>
        <div class="button_change_img_div">
            <form action="../actions/profileAction.php" method="post" enctype="multipart/form-data"
                  class="form_Profile_img">
                <input type="submit" id="button_change_img" style="background: white;color: blue"
                       class="button_change_img_file" value="Загрузить фото">
                <input type="submit" id="button_change_img" style="background: white;color: red"
                       value="Удалить текущее фото" name="delete">
                <div id="button_change_img"><span class="button_change_img"><div>Отмена</div></span></div>
            </form>
        </div>
    </div>
    <div class="Profile_add_post_div_all">
        <div class="Profile_add_post_div">
            <form class="Profile_add_post_form" method="post" action="../actions/postAction.php"
                  enctype="multipart/form-data">
                <h6 class="Profile_add_post_title">Создание публикации</h6>
                <div class="Profile_add_post_line"></div>
                <img src="">
                <input type="submit" name="submitadd" value="Выбрать на компьютере" class="Profile_add_post_submit">

            </form>
        </div>
    </div>
    <div class="second_sloy"></div>
    <div class="Profile_view" aria-hidden="true">
        <?php
        require "../layounts/menu.php";
        ?>
        <div class="Profile_post_add_sloy">
        </div>
        <div class="Profile_post_add_all" id="Profile_post_divflex" style="display: none">
            <div class="Profile_add_post">
                <div class="Post_div_for_none_first">
                    <div class="Profile_addpost_title_div"><span class="Profile_addpost_title_">Создание публикации</span>
                    </div>
                    <div class="Profile_addpost_line"></div>
                    <div class="Profile_addpost_icon_div"><img src="../assets/img/videos-icon.png" style="width: 50px;height: 50px;" class="Profile_addpost_icon"></div>
                    <div class="Profile_addpost_ttile_add_div"><span class="Profile_addpost_title_add">Перетащите сюда фото и видео</span>
                    </div>
                </div>
                <div class="Post_addpost_form_div">
                    <div class="Post_addpost_form_div_secondsloy">
                        <div class="Post_div_for_none_second">
                            <form action="../actions/profileAction.php" method="post" enctype="multipart/form-data"
                                  class="Post_addpost_form">
                                <input type="button" name="addpost_submit" value="Выбрать на компьютере"
                                       class="addpost_submit" id="addpost_submit_choosen" multiple>
                                <input type="submit" name="addpost_submit_ok" id="addpost_submit_ok" value="ok"
                                       class="addpost_submit" style="position: relative;bottom: 40px;display: none">
                            </form>
                        </div>
                        <button class="addpost_submit" id="addpost_submit">отмена</button>
                        <form class="Post_display_none_after_form" action="../actions/postAction.php" method="post">
                            <div class="Post_display_none_after" style="display: none">
                                <div class="Post_display_none_after_img">

                                </div>
                                <div class="Post_display_none_after_right">
                                <textarea style="display: none" class="Post_text_area" name="comment"
                                          placeholder="comment"></textarea>
                                    <br>
                                    <input type="submit" name="add_submit_add" class="addpost_submit" value="add">
                                    <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="Profile_header">
            <div class="Profile_about_you">
                <div class="Profile_header_img" style="overflow: hidden">
                    <img src="<?php if (isset($_SESSION['user']['avatar'])) echo $_SESSION['user']['avatar'] ?>" style="width: 150px;height: 150px;display: flex;justify-content: center;align-items: center;z-index: -1">
                </div>
                <div class="Profile_edit_information">
                    <div class="information">
                        <span class="Profile_fullname"><?php echo $_SESSION["user"]["fullname"] ?></span>
                        <form action="./edit.php" method="post">
                            <button id="Profile_button">Редактировать профиль</button>
                        </form>
                        <button id="Profile_button">Посмотреть архив</button>
                    </div>
                    <div class="follow_and_posts">
                        <div class="posts">php публикаций</div>
                        <div class="follow">php подписчиков</div>
                        <div class="follower">php подписок</div>
                    </div>
                    <div class="Profile_name">
                        <?php echo $_SESSION["user"]["username"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/profile.js"></script>
    </body>
    </
<?php
}else{
    header("location: ../view/login.php");
}
?>


