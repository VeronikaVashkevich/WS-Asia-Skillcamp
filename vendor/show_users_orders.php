<?php
    session_start();
    require_once 'connect.php';

    function show(){
        global $connect;
        $query = "SELECT `id`, `title`, `date`, `description`, `photo` FROM `orders` WHERE `user_login` = 2";
        $result = mysqli_query($connect, $query);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $orders;
    }
