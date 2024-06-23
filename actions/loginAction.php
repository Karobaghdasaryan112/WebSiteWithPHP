<?php
session_start();
global $connect;
include_once ("../config/database.php");
$error = 0;
if(isset($_POST["registration"])){
    $_SESSION['buttonregister'] = true;
    header("location: ../view/registration.php");
}
if(isset($_POST["submit"])){
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        if(!$email){
            $error = 1;
            $_SESSION['error']['login']['username'] = "username or phone or email is empty";
        }else{
            unset( $_SESSION['error']['login']['username']);
            $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
            $user = mysqli_fetch_assoc(mysqli_query($connect,$sql));
            if($user == 0){
                $error = 1;
                $_SESSION['error']['login']['username']  = "wrong email";
            }else{
                unset(  $_SESSION['error']['login']['username'] );
                var_dump($user);
            }
        }
    }
    if(isset($_POST["phone"])){
        $phone = $_POST["phone"];
        $sql = "SELECT * FROM `user` WHERE `phone` = '$phone'";
        $user = mysqli_fetch_assoc(mysqli_query($connect,$sql));
        if($user == 0){
            $error = 1;
            $_SESSION['error']['login']['username']  = "wrong phone";
        }else{
            unset(  $_SESSION['error']['login']['username'] );
            var_dump($user);
        }
    }
    if(isset($_POST["username"])){
        $username = $_POST["username"];
        $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
        $user = mysqli_fetch_assoc(mysqli_query($connect,$sql));
        if($user == 0){
            $error = 1;
            $_SESSION['error']['login']['username']  = "wrong username";
        }else{
            unset(  $_SESSION['error']['login']['username'] );
            var_dump($user);
        }
    }
    $password = $_POST["password"];
    if(!$password){
        $error = 1;
        $_SESSION['error']['login']['password'] = "password is empty";
    }else{
        unset($_SESSION['error']['login']['password']);
        $prover = $user["password"];
        $verify =  password_verify($password,$prover);
        if(!$verify){
            $error = 1;
            $_SESSION['error']['login']['password'] = "wrong password";
        }else{
            unset($_SESSION['error']['login']['password']);
        }
    }
    if($error == 1){
        header("location: ../view/login.php");
    }else{
        $_SESSION["user"] = $user;
        header("location: ../view/profile.php");
    }
}
?>
