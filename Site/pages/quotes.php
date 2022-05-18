<?php
define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);

include_once PATH."../core/db.class.php";
DB::getInstance();

session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="UTF-8">
    <title>Цитаты из игр</title>
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
              <a class="nav_link" href="quotes.php"><u>Цитаты</u></a>
              <a class="nav_link" href="photo.php">Фото</a>
              <a class="nav_link" href="game.php">Игра</a>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="txt">
      <center><h2>Цитаты из игр</h2></center>
      <ul>
        <li>Сумасшедшие люди и не догадываются, что они сумасшедшие — поэтому они и сумасшедшие.</br>
          <b>(Alan Wake)</b></li></p>
        <li>Правду говорят — убивает не падение, а внезапная остановка в конце.</br>
          <b>(Alan Wake)</b></li></p>
        <li>Для того, чтобы спорить, нужны два глупца.</br>
          <b>(Alice: Madness Returns)</b></li></p>
        <li>Кто ищет, тот всегда найдет… если правильно ищет.</br>
          <b>(American McGee's Alice)</b></li></p>
        <li>Если Чеширский кот улыбается, значит, это кому-нибудь нужно.</br>
          <b>(American McGee's Alice)</b></li></p>
        <li>Временами в ее безумии я вижу проблески настоящего таланта.</br>
          <b>(American McGee's Alice)</b></li></p>
        <li>Некоторые не видят выход, даже если найдут. Другие же просто не ищут...</br>
          <b>(American McGee's Alice)</b></li></p>
        <li>Бедняки не нужны никому. Забери с собой сирот, и мир поблагодарит тебя. Заставь исчезнуть шлюху, и джентльмен
          поаплодирует тебе. Убей нищего, и леди сможет гулять по улицам, не боясь.</br>
          <b>(Amnesia: Machine for Pigs)</b></li></p>
        <li>Иногда большинство — это лишь кучка идиотов.</br>
          <b>(AquaNox 2: Revelation)</b></li></p>
        <li>Бабы нынче — всё равно что гравитационные отсеки в ядерном реакторе. Никто толком не знает, как они работают.</br>
          <b>(AquaNox 2: Revelation)</b></li></p>
      </ul>
    </div>
  </header>
  <div class="introQ"></div>
</body>
</html>