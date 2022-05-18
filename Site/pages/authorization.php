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
  <title>Авторизация</title>
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
          <a class="reg" href="authorization.php"><u>Авторизация</u></a>
        <?}?>
      </a>

      <div class="rectangle">
        <div class="header_inner">
          <div class="header_logo">573GamesOfKings</div>
          <nav class="nav">
            <?
            $type = $_SESSION['user_type'];
            if($type == 0){?>
              <a class="nav_link" href="../admin/listusers.php">Список пользователей</a><?
            }?>
            <a class="nav_link" href="../index.php">Главная</a>
            <a class="nav_link" href="rating.php">Рейтинг</a>
            <a class="nav_link" href="facts.php">Факты</a>
            <a class="nav_link" href="quotes.php">Цитаты</a>
            <a class="nav_link" href="photo.php">Фото</a>
            <a class="nav_link" href="game.php">Игра</a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="txt">
  <center><h2>Авторизация</h2></center>
  <center>
    <form action="../core/auth.php" method="POST">
      <label for="login">Логин</label></br>
      <input name="login"></br>

      <label for="pas">Пароль</label></br>
      <input type="password" name="pas"></br>

      <input type="submit" value="Войти">

    </form>
  </center>
  <div> <center>
      <?=$error?>
  </div> </center>
</div>



</body>
</html>