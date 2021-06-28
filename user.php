<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
    require_once 'vendor/show_users_orders.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?= $_SESSION['user']['full_name'] ?> Profile</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/profiles_style.css">
</head>
<body>
    <div class="header">
        <a href="index.php">Design.pro</a>
        <img class="logo_main" src="assets/img/logo.png" alt="logo-main">
    </div>
    <div class="content">

        <div class="profile">
            <h2 class="username"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#" class="mail"><?= $_SESSION['user']['email'] ?></a>
            <a href="make_order.php" style="font-size: 30px">Создать заявку</a>
            <hr style="color: #000; background-color: #000; height: 5px; margin-top: 10px">
            <div class="orders">
                <h3 style="font-size: 35px;">My orders</h3>
                <?php $posts = show(); ?>
                <?php foreach ($posts as $post): ?>
                    <div class="order" method="post" action="vendor/delete.php">
                        <div class="basic">
                            <div class="name"> <?= $post['title'] ?> </div>
                            <div class="date"> <?= $post['date'] ?></div>
                        </div>
                        <div class="description">
                            <?= $post['description'] ?>
                        </div>
                        <div class="delete_button">
                            <form method="post" action="vendor/delete.php">
                                <input type="hidden" name="id" value="<?= $post['id']?>">
                                <button type="submit"> Удалить </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>

            <a href="vendor/logout.php" class="logout">Выход</a>
        </div>
    </div>
</body>
</html>