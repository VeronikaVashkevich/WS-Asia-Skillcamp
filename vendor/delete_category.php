<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $query = "DELETE FROM `categories` WHERE `name` = '$name'";

    if(mysqli_query($connect, $query)){
        $query2 = "DELETE FROM `orders` WHERE `category` = '$name'";
        mysqli_query($connect, $query2);
        header('Location: ../superadmin.php');
    }
    else{
        printf("Сообщение ошибки: %s\n", mysqli_error($connect));
        header('Location:/');
    }
