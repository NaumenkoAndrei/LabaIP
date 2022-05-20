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
  <title>Игровые факты</title>
  <link rel="stylesheet" href="../styles/style.css">
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
      <ul>
        <p>
          <center><h2>Цитаты из игр</h2></center>
        </p>
        <p>
        <li>
          The <b>Witcher 3</b> игра имеет около 36 концовок с различным состоянием мира.
        </li>
        </p>
        <p>
        <li>
          В <b>Fallout 3</b> и <b>Scyrim</b> нельзя убивать или ранить детей.
        </li>
        </p>
        <p>
        <li>
          <b>Red Dead Redemption</b> снег на деревьях не декороция: его можно стярхнуть, пройдя рядом или выстрелив.
        </li>
        </p>
        <p>
        <li>
          <b>The Witcher 3</b> каким бы не были действия игрока - они всегда влияют на мир. Этот принцип распространяется на новую экономическую систему, которая выглядит примерно так: чем дальше поселение от воды, тем дороже там рыба.
        </li>
        </p>
        <p>
        <li>
          Васс из <b>Far Cry 3</b> Убил всю семью кроме сестры.
        </li>
        </p>
        <p>
        <li>
          <b>S.T.A.L.K.E.R.</b> рекорд прохождения игры составляет всего 15 минут.
        </li>
        </p>
        <p>
        <li>
          Крупнейшей фирмой разработчиком игр является компания <b>Electronic Arts</b>.
        </li>
        </p>
        <p>
        <li>
          Дмитрий глуховский хотел добавить в <b>Metro: Exodus</b> мамонтов.
        </li>
        </p>
        <p>
        <li>
          <b>Prototype</b> при вскрытии игры был обнаружен совсем другой скин Алекса, одетый в белую одежду напоминающий персонажа из серии <b>Assassins Creed</b> Альтаира.
        </li>
        </p>
        <p>
        <li>
          <b>Assassins Creed: Brotherhood</b> во время воспоминания "Троянский конь", на вопрос от французского стражн куда родом Эцио, он отвечает: "Из Монреаля". <b>Ubisoft Montreal</b> - разработчик игры.
        </li>
        </p>
      </ul>
    </div>
  </div>
</div>
<script src="../scripts/script.js"></script>
</body>
</html>