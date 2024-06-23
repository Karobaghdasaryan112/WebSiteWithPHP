<?php
session_start();
include_once "../config/database.php";
global  $connect;
if(isset($_SESSION["user"])){
    $myid = $_SESSION["user"]["id"];
    $myusername = $_SESSION["user"]["username"];
    $myavatar = $_SESSION["user"]["avatar"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="stylesheet" href="../assets/css/instagram.css">
</head>
<body>
<div class="Instagram_view" aria-hidden="true">
    <!-- menu -->
    <?php require "../layounts/menu.php"?>
    <!-- menu -->
    <div class="Instagram_posts">
        <?php
        $sql = "SELECT * FROM `posts`";
        $countposts = mysqli_num_rows(mysqli_query($connect,$sql));
        $sql = "SELECT * FROM `posts`  ORDER BY `id` DESC ";
        $posts =(mysqli_query($connect,$sql));
        foreach ($posts as $post){
            $post_id = $post["id"];
            $post_title = $post["title"];
            $user_id = $post["user_id"];
            $sql = "SELECT * FROM `user` WHERE `id` = $user_id";
            $user = mysqli_fetch_assoc(mysqli_query($connect,$sql));
            $sql = "SELECT * FROM `posts_like` WHERE `user_id` = $myid AND `post_id` = $post_id";
            $count = mysqli_num_rows(mysqli_query($connect,$sql));
            $sql = "SELECT * FROM `posts_like` WHERE `post_id` = '$post_id'";
            $count_like = mysqli_num_rows(mysqli_query($connect,$sql));
            $sql = "SELECT * FROM `posts_comment` WHERE `post_id` = $post_id";
            $count_comment = mysqli_num_rows(mysqli_query($connect,$sql));
            $posts_comments = (mysqli_query($connect,$sql));

        ?>
                <div class="Instagram_post_all_flex<?php echo $post_id ?>">
            <div class="Instagram_post" id="Instagram_post<?php echo $post_id ?>">
                <div class="Instagram_post_user_up">
                    <div>
                        <img src="<?php echo $user["avatar"] ?>" class="Instagram_user_avatar">
                        <span class="Instagram_user_username">
                            <?php
                            echo $user["username"];
                            ?>
                        </span>
                    </div>
                </div>
                <br>
                <div class="Instagram_posts_information">
                    <div class="Instagram_post_carousel">
                        <button class="Post_left_carousel" id="button_carousel"><</button>
                            <div class="Instagram_post_images">
                                <?php
                                $sql = "SELECT * FROM `posts_images` WHERE `post_id` = $post_id";
                                $post_images = mysqli_query($connect,$sql);
                                foreach ($post_images as $post_img) {
                                ?>
                                            <img src="<?php echo $post_img["src"] ?>" class="Instagram_post_src">
                                <?php
                                }
                                ?>
                            </div>
                        <button class="Post_right_carousel" id="button_carousel">></button>
                    </div>
                    <div class="Instagram_post_comment_like">
                       <div class="Instagram_post_header">
                            <div class="Instagram_post_like">
                                <input type="checkbox" class="Instagram_post_like_check<?php echo $post_id ?>" onchange="post_like(<?php echo $post_id ?>,<?php echo $user_id ?>,event)" <?= $count>0 ? "checked" : "" ?>>
                                <div class="count_like_title_like">
                                    <span class="Instagram_post_like_count<?php echo $post_id ?>">
                                        <?php echo $count_like ?>
                                    </span>
                                    <span>
                                         отметок "Нравится"
                                    </span>
                                </div>
                            </div>
                            <div class="Instagram_username_and_post_title">
                                <span class="Instagram_post_username">
                                    <?php echo $user["username"]?>
                                </span>
                                <span class="Instagram_post_title">
                                    <?php echo $post["title"]?>
                                </span>
                            </div>
                       </div>
                        <div class="Instagram_post_comment_title_and_count">
                            <span class="Instagram_add_comment_view" id="Instagram_add_comment_view<?php echo $post_id ?>">

                            </span>
                                <span class="Instagram_post_title">
                                     <span class="view_all_comments"  onclick="view_comment(<?php  echo $post_id ?>)">Посмотреть все комментарии</span>

                                    <span id="view_all_comments_count<?php echo $post_id?>" class="view_all_comments_count">
                                        <?php echo $count_comment ?>
                                    </span>

                                </span>
                        </div>
                    </div>
                    <div class="Instagram_post_add_comment">
                        <input type="text" id="Instagram_comment<?php echo $post_id ?>" class="Instagram_comment" placeholder="Добавьте комментарий...">
                        <input type="submit" class="instagram_comment_submit" onclick="add_comment(<?= $post_id ?>,'<?php echo $myusername ?>','<?php echo $myavatar ?>')">
                    </div>
                </div>
            </div>
            <div class="Instagram_view_comment"  id="Instagram_view_comment<?php  echo $post_id ?>">

                <button class="Instagram_close_comment" id="view_post<?php echo $post_id ?>" onclick="close_comment(<?php echo $post_id ?>)">close</button>
                <?php
                foreach ($posts_comments as $comment){
                    ?>
                        <div class="posts_comment_and_username" id="posts_comment_and_username">
                            <span class="span_username">

                                <?php
                                    $id = $comment["user_id"];
                                    $sql = "SELECT * FROM `user` WHERE `id` = $id";
                                    $user_id_comment = mysqli_fetch_assoc(mysqli_query($connect,$sql));
                                    ?>
                                <img src="<?php echo $user_id_comment["avatar"] ?>" style="width: 40px;height: 40px;border-radius: 50%">
                                <?php
                                    echo $user_id_comment["username"];
                                    ?>
                            </span>
                            <div style="width: 7px">

                            </div>
                            <span class="span">
                                <?php
                                echo $comment["comment"];
                                ?>
                            </span>
                            <input type="checkbox" >
                        </div>
                <?php
                }
                ?>
            </div>
                </div>
            <div class="Instagram_line"></div>
        <?php
        }
        ?>
    </div>
</div>
<script src="../assets/js/instagram.js"></script>
</body>
</html>
<?php }else{
    header("location: ../view/login.php");
}