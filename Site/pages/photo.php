<?php
define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);

include_once PATH."../core/db.class.php";
DB::getInstance();

session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Фото</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  <header class="header">
    <div class="container" >
      <div class="rectangle1">

        <a class="nameU">
          <?php
          if (isset($_SESSION['auth'])) {
            echo "Пользователь: " . $_SESSION['name'];
            echo "<a class='reg' href ='../exit.php'> Выход </a>";
          }else {?>
            <a class="reg" href="registration.php">Регистрация</a>
            <a class="reg" href="authorization.php">Авторизация</a>
          <?}?>
        </a>

        <div class="rectangle">
          <div class="header_inner">
            <div class="header_logo">573GamesOfKings</div>
            <nav class="nav">
              <?
              $type = $_SESSION['user_type'];
              if($type == 5){?>
                <a class="nav_link" href="../admin/listusers.php">Список пользователей</a><?
              }?>
              <a class="nav_link" href="../index.php">Главная</a>
              <a class="nav_link" href="rating.php">Рейтинг</a>
              <a class="nav_link" href="facts.php">Факты</a>
              <a class="nav_link" href="quotes.php">Цитаты</a>
              <a class="nav_link" href="photo.php"><u>Фото</u></a>
              <a class="nav_link" href="game.php">Игра</a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="photo-grid">
    <img src="../images/photo1.jpg">
    <img src="../images/photo2.jpg">
    <img src="../images/photo3.jpg">
    <img src="../images/photo4.jpg">
    <img src="../images/photo5.jpg">
    <img src="../images/photo6.jpg">
    <img src="../images/photo7.jpg">
    <img src="../images/photo8.jpg">
    <img src="../images/photo9.jpg">
    <img src="../images/photo10.jpg">
    <img src="../images/photo11.jpg">
    <img src="../images/photo12.jpg">
  </div>
</body>
</html>