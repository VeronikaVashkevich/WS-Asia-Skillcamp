<?php
    session_start();
    require_once 'connect.php';

    $order_id = $_POST['orderId'];
    $new_status = $_POST['ch_category'];
    $comment = $_POST['comment'];

    //$query = "UPDATE `orders` SET `status` = '$new_status', `comment` = '$comment' WHERE `id` = '$order_id'";
    /*
    $query = "UPDATE `orders` SET `status` = '$new_status', `comment` = '$comment' WHERE `id` = '$order_id'";
    if(mysqli_query($connect , $query)){
        header('Location: ../superadmin.php');
    }*/

    if(!empty($_FILES) && $new_status == 'Выполнено') {
        $path = 'assets/img/' . time() . $_FILES['design']['name'];
        if (!move_uploaded_file($_FILES['design']['tmp_name'], '../' . $path)) {
            header('Location: ../superadmin.php');
        } else {
            $query = "UPDATE `orders` SET `status` = '$new_status', `design` = '$path' WHERE `id` = '$order_id'";
            if (mysqli_query($connect, $query)) {
                header('Location: ../superadmin.php');
            }
        }
    }
    elseif($new_status == 'Принято в работу'){
        $query = "UPDATE `orders` SET `status` = '$new_status', `comment` = '$comment' WHERE `id` = '$order_id'";
        if(mysqli_query($connect , $query)) {
            header('Location: ../superadmin.php');
        }
    }
    else {
        echo 'error';
    }

    /*$path = 'assets/img/' . time() . $_FILES['design']['name'];
    if (!move_uploaded_file($_FILES['design']['tmp_name'], '../' . $path)) {
        header('Location: ../make_order.php');
    }
    else{

    }

    /*
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        echo 'файл не перемещен';
    }
    else{
        echo 'файл перемещен';
    }*/