<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="header">
        <a href="index.php">Design.pro</a>
        <img class="logo_main" src="assets/img/logo.png" alt="logo-main">
    </div>
    <div class="content">
        <form action="vendor/orders.php" class="form" method="post" style="width: 690px" enctype="multipart/form-data">
            <label>Название проекта</label>
            <input type="text" name="title" placeholder="Название" class="input">
            <label>Описание</label>
            <textarea name="description" cols="30" rows="5" maxlength="1000" class="input"></textarea>
            <label>Категория</label>
            <select name="category" class="categories">
                <option value="flat">Квартира</option>
                <option value="house">Дом</option>
                <option value="room">Комната</option>
                <option value="penthouse">Пентхаус</option>
            </select>
            <input type="file" name="avatar">
            <br>
            <button type="submit">Создать</button>
        </form>
    </div>
</body>
</html>