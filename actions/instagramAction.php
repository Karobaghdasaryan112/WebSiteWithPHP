<?php
session_start();
include_once "../config/database.php";
global $connect;
$myid = $_SESSION["user"]["id"];
if(isset($_POST["status"])){
    $post_id = $_POST["post_id"];
    if($_POST["status"] == "like"){
       $sql = "INSERT INTO `posts_like` (`like`,`post_id`,`user_id`) VALUES ('like',$post_id,$myid)";
        mysqli_query($connect,$sql);
    }else{
        $sql = "DELETE FROM `posts_like` WHERE `post_id` = '$post_id'";
        mysqli_query($connect,$sql);
    }
}
if(isset($_POST["comment"])){
    $comment = $_POST["comment"];
    $post_id = $_POST["post_id"];
    $sql = "INSERT INTO `posts_comment` (`post_id`,`user_id`,`comment`) VALUES ($post_id,$myid,'$comment')";
    mysqli_query($connect,$sql);
}

?>