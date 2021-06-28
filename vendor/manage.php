<?php
    session_start();
    require_once 'connect.php';

    function show_categories(){
        global $connect;
        $query = "SELECT `id`, `name` FROM `categories`";
        $result = mysqli_query($connect, $query);
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all;
    }

    function show_orders(){
        global $connect;
        $query = "SELECT * FROM `orders`";
        $result = mysqli_query($connect, $query);
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all;
    }

    function show_status(){
        global $connect;
        $query2 = "SELECT `status` FROM `orders`";
        $result2 = mysqli_query($connect, $query2);
        $statuses = mysqli_fetch_all($result2, MYSQLI_ASSOC);

        $query = "SELECT `id`, `status` FROM `statuses`";
        $result = mysqli_query($connect, $query);
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all;
    }

    function show_on_index_page(){
        global $connect;
        $query = "SELECT `title`, `date`, `description`, `photo`, `design` FROM `orders` WHERE `status` = 'Выполнено' ORDER BY `date` LIMIT 4";
        $result = mysqli_query($connect, $query);
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all;
    }