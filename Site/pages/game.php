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
  <link rel="stylesheet" href="../styles/style.css">

  <meta charset="utf-8">
</head>
<body>
<header class="header">
  <div class="container">
    <div class="header_body">
      <div class="header_logo">573GamesOfKings</div>
      <div class="header_burger">
        <span></span>
      </div>
      <nav class="header_menu">
        <ul class="header_list">
          <?
          $type = $_SESSION['user_type'];
          if (isset($_SESSION['auth'])) {
            if($type == 5){?>
              <a href="../admin/listusers.php" class="header_link">Список</a><?
            }
          }?>
          <li>
            <a href="../index.php" class="header_link">Главная</a>
          </li>
          <li>
            <a href="rating.php" class="header_link">Рейтинг</a>
          </li>
          <li>
            <a href="facts.php" class="header_link">Факты</a>
          </li>
          <li>
            <a href="quotes.php" class="header_link">Цитаты</a>
          </li>
          <li>
            <a href="photo.php" class="header_link">Фото</a>
          </li>
          <li>
            <a href="game.php" class="header_link">Игра</a>
          </li>
          <?php
          if (isset($_SESSION['auth'])) {
            echo "<li class='header_link''>Пользователь: " . $_SESSION['name']."</li>";?>
            <li><a href ='../exit.php' class="header_link"> Выход </a></li>
          <?}else {?>
            <li>
              <a href="registration.php" class="header_link">Регистрация</a>
            </li>
            <li>
              <a href="authorization.php" class="header_link">Авторизация</a>
            </li>
          <?}?>

        </ul>
      </nav>
    </div>
  </div>

</header>

<div class="wrapper">
  <canvas width="0" height="0" class="canvas" id="canvas">Ваш браузер не поддерживает JavaScript и HTML5!</canvas>
</div>
<script src="../scripts/script.js"></script>
<script src="../scripts/game.js"></script>
</body>
</html>

