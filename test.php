<?php
    session_start();
    require_once 'vendor/connect.php';

    function get_orders(){
        global $connect;
        $query = "SELECT `title`, `date`, `description`, `photo` FROM `orders` WHERE `user_login` = 2";
        $result = mysqli_query($connect, $query);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $orders;
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/profiles_style.css">
    <style>
        .container{
            width: 300px;
            height: 300px;
            margin: 0 auto;
            overflow: hidden;
            border: 1px solid black;
        }
        img{
            width: 300px;
            height: 300px;
            position: absolute;
            -moz-transition: all 1s ease-in-out;
            -webkit-transition: all 1s ease-in-out;
            -o-transition: all 1s ease-in-out;
            transition: all 1s ease-in-out;
        }
        .container img.orig, .container:hover img.orig{
            margin-top: 0px;
        }
        .container img.move_up{
            margin-top: 300px;
            position: relative;
        }
        .container:hover img.move_up{
            margin-top: 0px;
        }
    </style>
</head>
<body >
    <div class="container">
        <img src="assets/img/classic.jpg" class="orig">
        <img src="assets/img/with_terrace.jpg" class="move_up">
    </div>
    <div class="container">
        <img src="assets/img/classic.jpg" class="orig">
        <img src="assets/img/with_terrace.jpg" class="move_up">
    </div>

    <input type="button" value="scroll" onclick='scroll()' id="inputbutton"/>
    <div class="text" id="aaa">scroll blya</div>
    <button type="button" onclick='scroll()'>Scrollll</button>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
    <div class="text" id="text">
        some text here
    </div>
    <script>
        function scroll() {
            //const element = document.getElementById("text");
            alert("element");
            //element.scrollIntoView({behavior: "smooth"});
        }
        document.getElementById("aaa").addEventListener('click', scroll);
    </script>
    <?php $date = date('Y-m-d'); echo $date?>
    <div class="orders">
        <h3 style="font-size: 35px;">My orders</h3>
        <?php
            $posts = get_orders();
        ?>
        <?php foreach ($posts as $post): ?>
        <div class="order">
            <div class="basic">
                <div class="name"> <?= $post['title'] ?> </div>
                <div class="date"> <?= $post['date'] ?></div>
                <div class="category"></div>
            </div>
            <div class="description">
                <?= $post['description'] ?>
            </div>
            <div class="delete_button">
                <a href="vendor/delete.php">Удалить</a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <?php
        /*$query = "SELECT `title`, `date`, `description`, `photo` FROM `orders` WHERE `user_login` = 2";
        $query2 = "SELECT COUNT(*) FROM `orders` WHERE `user_login` = 2";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0){
            $order = mysqli_fetch_array($result);
            $iter = mysqli_fetch_array(mysqli_query($connect, $query2));

            $count = mysqli_num_rows($result);
            echo '<div>' . 'num rows ' . $count . '</div>';

            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($rows as $item) {
                printf ("%s \n" , $item['title']);
                printf ("%s \n" , $item['date']);
                printf ("%s \n" , $item['description']);
                printf ("%s \n" , $item['photo']);
            }
        }
        else{
            echo '<div>' . 'в запросе ошибка' . '</div>';
        }*/
    ?>
</body>
</html>