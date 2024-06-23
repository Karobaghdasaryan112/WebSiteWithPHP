<?php
session_start();
global $connect;
include_once ("../config/database.php");
$error = 0;
if(isset($_POST["submit"])){
    if(isset($_POST["username"])){
        $username = $_POST["username"];
        if(!$username){
            $error = 1;
            $_SESSION["error"]["registration"]["username"] = "username is empty";
        }else{
            unset($_SESSION["error"]["registration"]["username"]);
            $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
            $user = mysqli_num_rows(mysqli_query($connect,$sql));
            if($user >0){
                $error = 1;
                $_SESSION["error"]["registration"]["username"] = "this username is used";
            }else{
                unset($_SESSION["error"]["registration"]["username"]);
            }
        }
    }
    if(isset($_POST["email"])) {
        $email = $_POST["email"];
        if(!$email){
            $error = 1;
            $_SESSION["error"]["registration"]["email"] = "phone or email is empty";
        }else{
            unset($_SESSION["error"]["registration"]["email"]);
            $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
            $user = mysqli_num_rows(mysqli_query($connect,$sql));
            if($user >0){
                $error = 1;
                $_SESSION["error"]["registration"]["email"] = "this email is used";
            }else{
                unset($_SESSION["error"]["registration"]["email"]);
            }
        }
    }
    if(isset($_POST["phone"])){
        $phone = $_POST["phone"];
        unset($_SESSION["error"]["registration"]["email"]);
        $sql = "SELECT * FROM `user` WHERE `phone` = '$phone'";
        $user = mysqli_num_rows(mysqli_query($connect,$sql));
        if($user >0){
            $error = 1;
            $_SESSION["error"]["registration"]["email"] = "this phone is used";
        }else{
            unset($_SESSION["error"]["registration"]["phone"]);
        }
    }
    $password = $_POST["password"];
    $passwordhash = password_hash($password,PASSWORD_DEFAULT);
    if(!$password){
        $error = 1;
        $_SESSION["error"]["registration"]["password"] = "password is empty";
    }else{
        unset($_SESSION["error"]["registration"]["password"]);
    }
    $fullname = $_POST["fullname"];
    if(!$fullname){
        $error = 1;
        $_SESSION["error"]["registration"]["fullname"] = "fullname is empty";
    }else{
        unset($_SESSION["error"]["registration"]["fullname"]);
    }
    if($error == 1){
        header("location: ../view/registration.php");
    }else{
        if(isset($_POST["email"])){
            $sql = "INSERT INTO `user` (`email`,`fullname`,`password`,`username`) VALUES ('$email','$fullname','$passwordhash','$username')";
            mysqli_query($connect,$sql);

        }else if(isset($_POST["phone"])){
            $sql = "INSERT INTO `user` (`phone`,`fullname`,`password`,`username`) VALUES ('$phone','$fullname','$passwordhash','$username')";
            mysqli_query($connect,$sql);
        }
        header("location: ../view/login.php");
    }
}
?>
