<?php

    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {

        $password = md5($password);

        //mysqli_query($connect, "INSERT INTO users(full_name, login, email, password, status) VALUES (`$full_name`, `$login`, `$email`, `$password`, 1)");
        $query = "INSERT INTO users(full_name, login, email, password, status) VALUES ('$full_name', '$login', '$email', '$password', 1)";

        if(mysqli_query($connect, $query)) {
            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: ../user.php');
        }

    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../index.php');
    }