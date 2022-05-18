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
              <a class="nav_link" href="facts.php"><u>Факты</u></a>
              <a class="nav_link" href="quotes.php">Цитаты</a>
              <a class="nav_link" href="photo.php">Фото</a>
              <a class="nav_link" href="game.php">Игра</a>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="txt">
      <center><h2>Игровые факты</h2></center>
      <ul>
        <li><b>The Witcher 3</b> игра имеет около 36 концовок с различным состоянием мира.</li></br>
        <li>В <b>Fallout 3</b> и <b>Scyrim</b> нельзя убивать или ранить детей.</li></br>
        <li><b>Red Dead Redemption</b> снег на деревьях не декороция: его можно стярхнуть, пройдя рядом или выстрелив.</li></br>
        <li><b>The Witcher 3</b> каким бы не были действия игрока - они всегда влияют на мир. Этот принцип распространяется на
          новую экономическую систему, которая выглядит примерно так: чем дальше поселение от воды, тем дороже там рыба.</li></br>
        <li>Васс из <b>Far Cry 3</b> Убил всю семью кроме сестры.</li></br>
        <li><b>S.T.A.L.K.E.R.</b> рекорд прохождения игры составляет всего 15 минут.</li></br>
        <li>Крупнейшей фирмой разработчиком игр является компания <b>Electronic Arts</b>.</li></br>
        <li>Дмитрий глуховский хотел добавить в <b>Metro: Exodus мамонтов</b>.</li></br>
        <li><b>Prototype</b> при вскрытии игры был обнаружен совсем другой скин Алекса, одетый в белую одежду напоминающий
          персонажа из серии <b>Assassins Creed</b> Альтаира.</li></br>
        <li><b>Assassins Creed: Brotherhood</b> во время воспоминания "Троянский конь", на вопрос от французского стражн
          куда родом Эцио, он отвечает: "Из Монреаля". <b>Ubisoft Montreal</b> - разработчик игры.</li></br>
      </ul>
    </div>
  </header>
  <div class="introF"></div>
</body>
</html>