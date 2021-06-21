<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = ($_POST['password']);
    $password = md5($password);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "email" => $user['email'],
            "status" => $user['status']
        ];

        if($user['status'] == 1){
            header('Location: ../user.php');
        }
        else if($user['status'] == 10){
            header('Location: ../superadmin.php');
        }

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
