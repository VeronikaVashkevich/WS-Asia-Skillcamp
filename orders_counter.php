<?php
    session_start();
    require_once 'vendor/connect.php';

    $query = "SELECT COUNT(*) FROM `orders` WHERE complited=TRUE";

    $res = mysqli_query($connect, $query);
    $counter = mysqli_fetch_array($res);
    $_SESSION['counter'] = $counter[0] . ' ';
    //header('Location :/');
    //echo $_SESSION['counter'];

