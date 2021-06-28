<?php
    session_start();
    if (!$_SESSION['user']) {
    header('Location: /');
    }
    require_once 'vendor/manage.php';
    require_once 'vendor/show_users_orders.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/profiles_style.css">
</head>
<body>
<div class="header">
    <a href="index.php">Design.pro</a>
    <img class="logo_main" src="assets/img/logo.png" alt="logo-main">
</div>
<div class="content">
    <div class="content">
        <div class="profile">
            <h2 class="username"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#" class="mail"><?= $_SESSION['user']['email'] ?></a>
            <hr style="color: #000; background-color: #000; height: 5px; margin-top: 10px">

            <div class="manage">
                <div class="categories">
                    <div class="title">Управление категориями</div>
                    <div class="add_new">
                        <div >Добавить новую категорию</div>
                        <form action="vendor/add_new_cat.php" class="form" method="post" style="margin-top: 10px">
                            <input type="text" class="input" name="new_name">
                            <?php
                                if($_SESSION['message']){
                                    echo '<p class="message">' . $_SESSION['message'] . '</p>';
                                }
                                unset($_SESSION['message']);
                            ?>
                            <button type="submit">Добавить</button>
                        </form>
                    </div>
                    <?php $all_categories = show_categories(); ?>
                    <?php foreach ($all_categories as $category): ?>
                    <div class="category">
                        <div class="basic" name="<?= $category['name'] ?>">
                            <?= $category['name'] ?>
                        </div>
                        <div class="delete_button">
                            <form method="post" action="vendor/delete_category.php">
                                <input type="hidden" name="name" value="<?= $category['name']?>">
                                <button type="submit"> Удалить </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="orders">
                    <div class="title">Управление заказами</div>
                    <h3 style="font-size: 35px;">Все заказы</h3>
                    <?php $posts = show_orders(); ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="order">
                            <div class="basic">
                                <div class="name"> <?= $post['title'] ?> </div>
                                <div class="date"> <?= $post['date'] ?></div>
                            </div>
                            <div class="description">
                                <?= $post['description'] ?>
                            </div>
                            <form class="change_cat" method="post" action="edit_order.php">
                                <input type="hidden" name="orderId" value="<?= $post['id']?>">
                                <button type="submit">Изменить</button>
                            </form>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>

            <a href="vendor/logout.php" class="logout">Выход</a>
        </div>
    </div>
</div>
</body>
</html>