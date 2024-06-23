<?php
session_start();
include_once  "../config/database.php";
global $connect;
if(isset($_POST["submit_post"])){
    $title = $_POST["title"];
    $myid = $_SESSION["user"]["id"];
    $sql = "INSERT INTO `posts` (`user_id`,`title`) VALUES ($myid,'$title')";
    mysqli_query($connect,$sql);
    $sql = "SELECT * FROM `posts` ORDER BY `id` DESC";
    $post_info = mysqli_fetch_assoc(mysqli_query($connect,$sql));
    $post_id =$post_info["id"];
    for($i=0;$i<count($_SESSION["user"]["post_images"]["src"]);$i++){
        $src = $_SESSION["user"]["post_images"]["src"][$i];
            $sql = "INSERT INTO `posts_images` (`post_id`,`user_id`,`src`) VALUES ($post_id,$myid,'$src')";
            mysqli_query($connect,$sql);
    }
    header("location: ../view/instagram.php");
}
