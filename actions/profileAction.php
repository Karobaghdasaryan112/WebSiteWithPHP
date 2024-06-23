<?php
session_start();
include_once "../config/database.php";
global $connect;
$myid = $_SESSION["user"]["id"];
////
///add avatar
if(isset($_POST["otpravit"])){
    $image = $_FILES["file"];
    $format = $image["name"];
    $png = "../avatar/".$format;
    if(move_uploaded_file($_FILES["file"]["tmp_name"],__DIR__.'\\../avatar\\'.$_FILES["file"]["name"])){
        $_SESSION["user"]["avatar"] = "../avatar/".$_FILES["file"]["name"];
        $avatar = $_SESSION["user"]["avatar"];
        $sql = "UPDATE `user` SET `avatar` = '$avatar' WHERE `id` = $myid";
        mysqli_query($connect,$sql);
        header("location: ../view/profile.php");
    }
}
if(isset($_POST["delete"])){
    $diraction = __DIR__.'\\../avatar\\'.$_SESSION["user"]["avatar"];
    if(file_exists($diraction)){
        unlink($diraction);
    }
    header("location: ../view/profile.php");
}
/////
/// add post
if (isset($_FILES["file_post"])){
$count_images = count($_FILES["file_post"]["name"]);
    for($i=0;$i<$count_images;$i++){
        if(move_uploaded_file($_FILES["file_post"]["tmp_name"][$i],__DIR__.'\\../posts_images\\'.$_FILES["file_post"]["name"][$i])){
            $_SESSION["user"]["post_images"]["src"][$i] = "../posts_images/".$_FILES["file_post"]["name"][$i];
        }
    }
    header("location: ../view/post.php");
}
?>

