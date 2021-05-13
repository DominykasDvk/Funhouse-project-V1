<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $password = md5($password);
    $checkUser = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login'");
    if (mysqli_num_rows($checkUser) > 0) {
        $_SESSION['registerError'] = '<span class="error-msg">The user is already registered!</span>';
        header('Location: ../register.php');
    }
    else{
        $sql = "INSERT INTO users (id, login, password) VALUES (NULL, '$login', '$password')";
        mysqli_query($connect, $sql);
        $_SESSION['loginError'] = '<span class="error-msg">User registered. Please login.</span>';
        header('Location: ../index.php');  
    }
    }
else {
        $_SESSION['registerError'] = '<span class="error-msg">Passwords don\'t match!</span>';
        header('Location: ../register.php');
    }
?>