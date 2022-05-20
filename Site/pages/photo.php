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
  <script type="text/javascript" src="../scripts/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="../scripts/script.js"></script>
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
<div class="content">
  <div class="container">
    <div class="content_text">
      <center><h2>Фото</h2></center>
        <div class="row">
          <input type="button" value="Влево" onclick="leftChangeImage()">
          <div id="mainImage"></div>
          <input type="button" value="Вправо" onclick="rightChangeImage()">
      </div

    </div>
  </div>
</div>



</body>
</html>



<!--
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
-->
