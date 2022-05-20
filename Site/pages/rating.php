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
  <title>Рейтинг игр</title>
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
      <p>
        <center><h2>Рейтинг игр</h2></center>
      </p>
      <p>
        <b>1. Death Stranding (2019)</b> – необычная игра от “гениального” Хидео Кодзимы с кучей известных актеров и очень
        странным сюжетом, где главный герой является кем-то вроде курьера. Фанаты накрутили DS оценки, где только можно,
        так что она просто не могла не появиться в этом списке.
      </p>
      <p>
        <b>2. Devil May Cry 3: Dante’s Awakening (2005)</b> – классический слешер в чисто японском стиле про борца с демонами,
        который сам является наполовину демоном. Первоначальная версия игры была довольно сложной, особенно в сражениях с
        боссами, поэтому разработчики переиздали ее с правками.
      </p>
      <p>
        <b>3. Star Wars: The Old Republic (2011)</b> – ММО по Звездным Войнам периода Старой республики. Заслуживает внимания
        хотя бы потому, что это западная RPG, а не надоевшая всем корейщина, которой на рынке сейчас явно переизбыток.
      </p>
      <p>
        <b>4. Boulder Dash II (1986)</b> – персонажу Рокфорду приходится уворачиваться от падающих камней и светлячков, собирая
        алмазы на уровнях. С учетом возраста игра довольно-таки революционная. Так проявим же уважение к ветерану.
      </p>
      <p>
        <b>5. Terraria (2011)</b> – двухмерная песочница, которая способна потягаться с самим Minecraft по обилию возможностей,
        ресурсов для крафта и просторов для исследования. Несмотря на пиксели, увлекает на десятки часов.
      </p>
      <p>
        <b>6. Fable (2004)</b> – уникальная РПГ, где поступки главного героя и его боевые стили влияют на внешний вид персонажа.
        Можно сделать его качком, жирдяем, магом, даже натуральным чертом с рогами. Игра получила переиздание с улучшенной
        графикой.
      </p>
      <p>
        <b>7. The Witcher 3: Wild Hunt (2015)</b> – крутой главный герой сражается с монстрами, крутит романы с горячими
        чародейками и путешествует по огромному, шикарно проработанному миру. Главный хит последних лет, кто бы что ни
        говорил.
      </p>
      <p>
        <b>8. Batman: Arkham Asylum (2009)</b> – за всю историю жанра комиксов по-настоящему ярких игр вышло очень мало, по
        пальцам можно пересчитать. Серия Arkham, особенно первая часть, одна из лучших в плане боевой системы и истории.
      </p>
      <p>
        <b>9. Grand Theft Auto V (2013)</b> – очередная криминальная история из цикла GTA, три играбельных персонажа и превосходный
        мультиплеер с PVP-активностями и кооперативными миссиями, которому просто нет аналогов.
      </p>
      <p>
        <b>10. Deus Ex (2000)</b> – одна из лучших игр всех времен в жанре RPG, название которой приходит на ум в первую очередь,
        стоит только услышать слово “киберпанк”. Стелс, взлом или грубая сила – выбирайте способ прохождения, который вам
        больше по душе.
      </p>
    </div>
  </div>
</div>
<script src="../scripts/script.js"></script>
</body>
</html>