<?php session_start();
if (!$_SESSION['user']) {
header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

            <a href="vendor/logout.php" class="logout">Выход</a>
        </div>
    </div>
</div>
</body>
</html>