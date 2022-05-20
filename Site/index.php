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
  <title>Главная страница</title>
  <link rel="stylesheet" href="../styles/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a href="index.php" class="header_link">Главная</a>
          </li>
          <li>
            <a href="../pages/rating.php" class="header_link">Рейтинг</a>
          </li>
          <li>
            <a href="../pages/facts.php" class="header_link">Факты</a>
          </li>
          <li>
            <a href="../pages/quotes.php" class="header_link">Цитаты</a>
          </li>
          <li>
            <a href="../pages/photo.php" class="header_link">Фото</a>
          </li>
          <li>
            <a href="../pages/game.php" class="header_link">Игра</a>
          </li>
          <?php
          if (isset($_SESSION['auth'])) {
            echo "<li class='header_link''>Пользователь: " . $_SESSION['name']."</li>";?>
            <li><a href ='exit.php' class="header_link"> Выход </a></li>
          <?}else {?>
          <li>
            <a href="../pages/registration.php" class="header_link">Регистрация</a>
          </li>
          <li>
            <a href="../pages/authorization.php" class="header_link">Авторизация</a>
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
      <center><h2>Описание сайта</h2>
          Добро пожаловать пользователи сайта 573GamesOfKings<br> на портал посвященный игровой тематике.<br>
        Здесь вы найдете рейтинг лучших игр, факты, цитаты,<br> так же фотогерею с косплеями и артами,<br> а если станет скучно — поиграйте в нашу игру.</br>
        Заходите, вам понравиться!
      </center>
    </div>
  </div>
</div>
<script src="../scripts/script.js"></script>

</body>
</html>