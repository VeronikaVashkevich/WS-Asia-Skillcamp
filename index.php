<?php
    session_start();
    require_once 'vendor/connect.php';

    $query = "SELECT COUNT(*) FROM `orders` WHERE `status`='Принято в работу'";

    $res = mysqli_query($connect, $query);
    $counter = mysqli_fetch_array($res);

    require_once 'vendor/manage.php';
?>

<!DOCTYPE html>
<html xmlns:input="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Design.pro</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/scripts/main.js"> </script>
</head>
<body>
    <div class="header">
        <a href="index.php">Design.pro</a>
        <img class="logo_main" src="assets/img/logo.png" alt="logo-main">
    </div>

    <div class="content">
    
        <nav class="navigation">
            <ul>
                <li class="nav_li">
                    <?php
                        if($_SESSION['user']['status'] == 1){
                            echo '<a href="user.php">Профиль</a>';
                        }
                        else if($_SESSION['user']['status'] == 10){
                            echo '<a href="superadmin.php">Профиль</a>';
                        }
                    ?>
                </li>
                <li class="nav_li">
                    <a href="make_order.php"> Сделать заказ </a>
                </li>
                <li class="nav_li" id="scroll_to_reg_form">Регистрация</li>
                <li class="nav_li" id="scroll_to_auth_form">Авторизация</li>
            </ul>
        </nav>

        <div class="about_us">
            <div class="who_we_are">Кто мы?</div>
            <div class="about1">
                Мы строим дома и коттеджи под ключ или выполним отдельные
                строительные работы по заливке фундаментов, возведению стен и 
                кровли, отделке фасадов из различных материалов и выполняем 
                работы по внутренней отделке, ремонт квартир 
            </div>
            <hr>
            <div class="about2">
                Уже более 10 лет, мы строим и радуем наших заказчиков - качественными 
                работами и приятными ценами. Нами было сделано более 90 коттеджей и 
                домов под ключ, сдано более 300 объектов с разными видами работ. 
                Строительство домов сложный и долгий процесс, но большой опыт наших 
                бригад и мастеров, позволяет строить качественные коттеджи и выполнять 
                строительные, монтажные и отделочные работы разной сложности
            </div>
        </div>


        <div class="requests">
            <?php $posts = show_on_index_page(); ?>
            <?php foreach ($posts as $post): ?>
            <div class="request">
                <div class="name"> <?= $post['title'] ?></div>
                <div class="date"> <?= $post['date'] ?></div>
                <div class="image">
                    <img class="orig" src="<?= $post['photo'] ?>" alt="квартира с балконом">
                    <img class="move_up" src="<?= $post['design'] ?>" alt="квартира с балконом">
                </div>
            </div>
            <?php endforeach;?>
            <!--<div class="request">
                <div class="name"> Квартира с балконом</div>
                <div class="date"> 01.05.2021</div>
                <div class="image">
                    <img class="orig" src="assets/img/with_balcony.jpg" alt="квартира с балконом">
                    <img class="move_up" src="assets/img/3.jpg" alt="квартира с балконом">
                </div>
            </div>
            <div class="request">
                <div class="name"> Апартаменты с террасой </div>
                <div class="date"> 27.04.2021</div>
                <div class="image">
                    <img class="orig" src="assets/img/with_terrace.jpg" alt="квартира с терассой">
                    <img class="move_up" src="assets/img/grsp.jpg" alt="квартира с терассой">
                </div>
             </div>
             <div class="request">
                 <div class="name"> Квартира-студия с отдельной кухней </div>
                 <div class="date"> 30.03.2021</div>
                 <div class="image">
                     <img class="orig" src="assets/img/apartments-houses-3d-plans-examples86.png"
                          alt="студия с отдельной кухней">
                     <img class="move_up" src="assets/img/ter.jpg" alt="студия с отдельной кухней">
                 </div>
             </div>
             <div class="request">
                 <div class="name"> Двухкомнатная квартира в классическом стиле </div>
                 <div class="date"> 14.03.2021</div>
                 <div class="image">
                     <img class="orig" src="assets/img/classic.jpg" alt="квартира в классическом стиле">
                     <img class="move_up" src="assets/img/uuik.jpg" alt="квартира в классическом стиле">
                 </div>
             </div>-->

         </div>

         <div class="request_counter">
             <p>Всего выполнено заказов</p>
             <div class="counter">
                 <?php echo $counter[0]?>
             </div>
         </div>

         <div class="form">
             <form action="vendor/singin.php" method="post" id="auth_form">
                 <label>Логин</label>
                 <input type="text" name="login" placeholder="Введите логин" class="input">
                 <label>Пароль</label>
                 <input type="password" name="password" placeholder="Введите пароль">
                 <button type="submit">Войти</button>
             </form>
         </div>
        <div class="form">
            Нет аккаунта? <input type="button" id="reg_but" value="Зарегистрируйтесь" onclick="show_form()">
            <form action="vendor/singup.php" method="post" id="reg_form">
                <label>ФИО</label>
                <input type="text" name = "full_name"placeholder="Введите ФИО" class="input">
                <label>Логин</label>
                <input type="text" name = "login" placeholder="Введите логин" class="input">
                <label>Электронная почта</label>
                <input type="email" name = "email" placeholder="Введите электронную почту" class="input">
                <label>Пароль</label>
                <input type="password" name = "password" placeholder="Введите пароль">
                <label>Повторите пароль</label>
                <input type="password" name = "password_confirm" placeholder="Введите пароль">
                <button type="submit">Регистрация</button>
                    <?php
                    if($_SESSION['message']){
                        echo '<p class="message">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
            </form>
        </div>

     </div>
    <a href="user.php">Userpage</a>
    <script>
        //const authorisation = document.getElementById("scroll_to_auth_form");
        //const registration = document.getElementById("scroll_to_reg_form");
        function scroll(id) {
            if(id === "reg_form"){
                let reg_form = document.getElementById(id);
                reg_form.style.display = "initial";
            }
            const element = document.getElementById(id);
            element.scrollIntoView({behavior: "smooth"});
        }
        document.getElementById("scroll_to_auth_form").addEventListener('click', function (){scroll("auth_form")});
        document.getElementById("scroll_to_reg_form").addEventListener('click', function (){scroll("reg_form")});
    </script>
 </body>
 </html>