<?php
define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);

include_once PATH."../core/db.class.php";
DB::getInstance();

session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Цитаты из игр</title>
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
            Сумасшедшие люди и не догадываются, что они сумасшедшие — поэтому они и сумасшедшие.</br>
            <b>(Alan Wake)</b>
          </li>
        </p>
        <p>
          <li>
            Правду говорят — убивает не падение, а внезапная остановка в конце.</br>
            <b>(Alan Wake)</b>
          </li>
        </p>
        <p>
          <li>
            Для того, чтобы спорить, нужны два глупца.</br>
            <b>(Alice: Madness Returns)</b>
          </li>
        </p>
        <p>
          <li>
            Кто ищет, тот всегда найдет… если правильно ищет.</br>
            <b>(American McGee's Alice)</b>
          </li>
        </p>
        <p>
          <li>
            Если Чеширский кот улыбается, значит, это кому-нибудь нужно.</br>
            <b>(American McGee's Alice)</b>
          </li>
          </p>
        <p>
          <li>
            Временами в ее безумии я вижу проблески настоящего таланта.</br>
            <b>(American McGee's Alice)</b>
          </li>
        </p>
        <p>
          <li>
            Некоторые не видят выход, даже если найдут. Другие же просто не ищут...</br>
            <b>(American McGee's Alice)</b
          </li>
        </p>
        <p>
          <li>
            Бедняки не нужны никому. Забери с собой сирот, и мир поблагодарит тебя. Заставь исчезнуть шлюху, и джентльмен
            поаплодирует тебе. Убей нищего, и леди сможет гулять по улицам, не боясь.</br>
            <b>(Amnesia: Machine for Pigs)</b>
          </li>
        </p>
        <p>
          <li>
            Иногда большинство — это лишь кучка идиотов.</br>
            <b>(AquaNox 2: Revelation)</b></b>
          </li>
        </p>
        <p>
          <li>
            Бабы нынче — всё равно что гравитационные отсеки в ядерном реакторе. Никто толком не знает, как они работают.</br>
            <b>(AquaNox 2: Revelation)</b></b>
          </li>
        </p>
      </ul>
    </div>
  </div>
</div>
<script src="../scripts/script.js"></script>

</body>
</html>