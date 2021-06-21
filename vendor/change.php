<?php

session_start();
require_once 'connect.php';

$pass = (mysqli_query($connect, "SELECT 'password' FROM `users` WHERE `id` = 3"));
$password = mysqli_fetch_assoc($pass);
mysqli_query($connect, "UPDATE `users` SET `password` = '$pass' WHERE `id` = 3");
