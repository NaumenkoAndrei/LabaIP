<?php
define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);
//echo PATH;
include_once PATH."../core/db.class.php";
DB::getInstance();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Список пользователей</title>
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
          <a class="reg" href="../pages/registration.php">Регистрация</a>
          <a class="reg" href="../pages/authorization.php"><u>Авторизация</u></a>
        <?}?>
      </a>

      <div class="rectangle">
        <div class="header_inner">
          <div class="header_logo">573GamesOfKings</div>
          <nav class="nav">
            <?
            $type = $_SESSION['user_type'];
            if($type == 5){?>
              <a class="nav_link" href="../admin/listusers.php"><u>Список пользователей</u></a><?
            }?>
            <a class="nav_link" href="../index.php">Главная</a>
            <a class="nav_link" href="../pages/rating.php">Рейтинг</a>
            <a class="nav_link" href="../pages/facts.php">Факты</a>
            <a class="nav_link" href="../pages/quotes.php">Цитаты</a>
            <a class="nav_link" href="../pages/photo.php">Фото</a>
            <a class="nav_link" href="../pages/game.php">Игра</a>
          </nav>
        </div>
      </div>
    </div>
  </div>

</header>

<center>
  <div class="txt">
    <center><h2>Список пользователей</h2></center>
  <table class="list">

    <tr>
      <td>id</td>
      <td>Логин</td>
      <td>ФИО</td>
      <td>Тип пользователя</td>
      <td>Редактирование</td>
    </tr>

      <?
      $query = "SELECT * FROM `users`";
      $res = DB::query($query);

      while (($item = DB::fetch_array($res)) != false) {?>
        <tr>
          <td><?=$item['id']?></td>
          <td><?=$item['login']?></td>
          <td><?=$item['fio']?></td>
          <td><?=$item['user_type']?></td>
          <td>
            <a href="edituser.php? id=<?=$item['id']?>">
              <img class="icons" src="../images/edit.png" title="Редактировать">
            </a>
            <a href="deleteuser.php? id=<?=$item['id']?>">
              <img class="icons" src="../images/delete.png" title="Удалить">
            </a>
          </td>
        </tr>
      <?} ?>
    </table>
  </center>
</div>
</body>
</html>