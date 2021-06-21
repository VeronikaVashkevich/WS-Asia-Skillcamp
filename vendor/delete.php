<?php
    session_start();
    require_once 'connect.php';

    $user_id = $_SESSION['user']['id'];
    $id = $_POST['id'];
    $query = "DELETE FROM `orders` WHERE `user_login` = '$user_id' AND `id` = '$id'";

    if(mysqli_query($connect, $query)){
        header('Location: ../user.php');
    }
    else{
        printf("Сообщение ошибки: %s\n", mysqli_error($connect));
        header('Location:/');
    }
