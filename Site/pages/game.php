<?php
define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);

include_once PATH."../core/db.class.php";
DB::getInstance();

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Игра</title>
  <link rel="stylesheet" href="../styles/game.css">
  <meta charset="utf-8">
</head>
<body>
<header class="header">
  <div class="container" >

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
          <a class="nav_link" href="photo.php">Фото</a>
          <a class="nav_link" href="game.php"><u>Игра</u></a>
        </nav>
      </div>
    </div>
  </div>
</header>

<div class="wrapper">
  <canvas width="0" height="0" class="canvas" id="canvas">Ваш браузер не поддерживает JavaScript и HTML5!</canvas>
</div>
<script src="../scripts/game.js"></script>
</body>
</html>