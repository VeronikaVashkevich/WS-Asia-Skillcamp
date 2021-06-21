<?php
     session_start();
     require_once 'connect.php';

     error_reporting(E_ALL | E_STRICT);
     ini_set('display_errors', TRUE);
     ini_set('display_startup_errors', TRUE);

     $title = $_POST['title'];
     $description = $_POST['description'];
     $category =  $_POST['category'];
     $date = date('Y-m-d');
     $user_id = $_SESSION['user']['id'];
     $status = 'In process';

     $path = 'assets/img/' . time() . $_FILES['avatar']['name'];
     if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
         header('Location: ../make_order.php');
     }
     else{
         $query2 = "INSERT INTO orders(title, date, complited, description, category, photo, status, user_login) VALUES ('$title', '$date', false, '$description', '$category', '$path', '$status', '$user_id')";
         //$query = "INSERT INTO orders(title, date, complited, description, category, photo, status, user_login) VALUES ('$title', '2021-06-19', false, 'Красивая милая квартира', 'flat', '$path', 'In process', 2)";

         if(mysqli_query($connect, $query2)){
             //echo "Данные успешно добавлены";
             header('Location: ../user.php');
         }
         else{
             echo "Ошибка при добавлении";
             printf("Сообщение ошибки: %s\n", mysqli_error($connect));
             //header('Location: ../index.php');
         }
     }
