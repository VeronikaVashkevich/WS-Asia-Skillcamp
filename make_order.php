<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

require_once 'vendor/manage.php';
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
                <?php $all_categories = show_categories(); ?>
                <?php foreach ($all_categories as $category): ?>
                <option value="<?= $category['name']?>"><?= $category['name']?></option>
                <?php endforeach; ?>
            </select>
            <input type="file" name="avatar">
            <br>
            <button type="submit">Создать</button>
            <?php
            if($_SESSION['message']){
                echo '<p class="message">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>

    </div>
</body>
</html>