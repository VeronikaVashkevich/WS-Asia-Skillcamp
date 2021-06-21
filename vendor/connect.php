<?php

$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'designpro');

if (!$connect) {
    die('Error connect to DataBase');
}