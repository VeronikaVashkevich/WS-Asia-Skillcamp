<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
    require_once 'vendor/connect.php';
    $order_id = $_POST['orderId'];
    $query = "SELECT * FROM `orders` WHERE `id` = '$order_id'";
    $result = mysqli_query($connect, $query);
    $order = mysqli_fetch_all($result, MYSQLI_ASSOC);

    function show_status(){
        global $order;
        if($order[0]['status'] === 'Новая'){
            $statuses = ['Новая', 'Принято в работу', 'Выполнено'];
            return $statuses;
        }
        elseif ($order[0]['status'] === 'Принято в работу'){
            $statuses = ['Принято в работу'];
            return $statuses;
        }
        elseif ($order[0]['status'] === 'Выполнено'){
            $statuses = ['Выполнено'];
            return $statuses;
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать заказ</title>
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
            </div>
            <div class="orders">
                <form action="vendor/change_status.php" method="post" enctype="multipart/form-data">
                    <div class="order">
                        <div class="basic">
                            <div class="name"> <?= $order[0]['title'] ?> </div>
                            <div class="date"> <?= $order[0]['date'] ?> </div>
                        </div>
                        <div class="description">
                            <?= $order[0]['description'] ?>
                        </div>
                        <select name="ch_category" id="status">
                            <?php $all_statuses = show_status(); ?>
                            <?php foreach ($all_statuses as $status): ?>
                                <option value="<?= $status?>"><?= $status?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="orderId" value="<?= $order[0]['id']?>">
                        <textarea id="comment" style="display: none;" name="comment" cols="30" rows="5" maxlength="1000" class="input" placeholder="Добавьте комментарий"></textarea>
                        <input type="file" name="design" style="display: none" id="image">
                        <button type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let selectEl = document.getElementById("status");
        function show_el() {
            const commentEl = document.getElementById("comment");
            const imageEl = document.getElementById("image");

            switch (selectEl.value) {
                case "Новая":
                    imageEl.style.display = "none";
                    commentEl.style.display = "none";
                    break;
                case "Принято в работу":
                    commentEl.style.display = "initial";
                    imageEl.style.display = "none";
                    break;
                case "Выполнено":{
                    imageEl.style.display = "initial";
                    commentEl.style.display = "none";
                    break;
                }
            }
        }
        selectEl.addEventListener('change', show_el );
    </script>
</body>
</html>
