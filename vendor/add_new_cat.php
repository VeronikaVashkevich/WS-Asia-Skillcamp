<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['new_name'];
    if(!empty($name)){
        $query2 = "INSERT INTO categories(name) VALUES ('$name')";
        if(mysqli_query($connect, $query2)){
            header('Location: ../superadmin.php');
        }
        else{
            echo 'Ошибка при довалении записи ';
            printf("Сообщение ошибки: %s\n", mysqli_error($connect));
            //header('Location: /');
        }
    }
    else{
        $_SESSION['message'] = 'Поле пустое';
        header('Location: ../superadmin.php');
    }
