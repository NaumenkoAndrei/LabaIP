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
</head>
<body>
  <header class="header">
    <div class="container" >
      <a class="nameU">


        <?php
        if (isset($_SESSION['auth'])) {
          echo "Пользователь: " . $_SESSION['name'];
          echo "<a class='reg' href ='exit.php'> Выход </a>";
        }else {?>
          <a class="reg" href="../pages/registration.php">Регистрация</a>
          <a class="reg" href="../pages/authorization.php">Авторизация</a>
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
            <a class="nav_link" href="index.php"><u>Главная</u></a>
            <a class="nav_link" href="../pages/rating.php">Рейтинг</a>
            <a class="nav_link" href="../pages/facts.php">Факты</a>
            <a class="nav_link" href="../pages/quotes.php">Цитаты</a>
            <a class="nav_link" href="../pages/photo.php">Фото</a>
            <a class="nav_link" href="../pages/game.php">Игра</a>
          </nav>
        </div>
      </div>
    </div>


    <div class="txtIndex">
      <h2>Описание сайта</h2>
      <pre>
Добро пожаловать пользователи сайта 573GamesOfKings
на портал посвященный игровой тематике.
Здесь вы найдете рейтинг лучших игр,
факты, цитаты, так же фотогерею
с косплеями и артами,
а если станет скучно — поиграйте в нашу игру.
Заходите, вам понравиться!
      </pre>
    </div>


  </header>
<div class="introI"></div>
</body>
</html>