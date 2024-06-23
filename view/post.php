<?php
session_start();
include_once "../config/database.php";
global $connect;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="stylesheet" href="../assets/css/post.css">
    <title>Document</title>
</head>
<body>

<div class="Profile_view" aria-hidden="true">
    <?php
    require "../layounts/menu.php";
    ?>
    <div class="Post_images">
        <button class="Post_left_carousel" id="button_carousel"><</button>
        <?php
        foreach ($_SESSION["user"]["post_images"]["src"] as $img){
            ?>
            <img src="<?php echo $img ?>" class="Post_img_tag">
            <?php
        }
        ?>
        <button class="Post_right_carousel" id="button_carousel">></button>
    </div>
    <div class="Post_header">
        <span>Напишите что-нибудь</span>
        <form action="../actions/postAction.php" method="post" class="Post_header_form">
                <textarea class="Post_title" name="title">
                </textarea>
                <input type="submit" class="Post_add" name="submit_post">
        </form>
    </div>
</div>
<script src="../assets/js/post.js"></script>
</body>
</html>

