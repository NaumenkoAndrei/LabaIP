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
            <li><a href ='../exit.php' class="header_link"> Выход </a></li>
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
      <center>
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
  </div>
</div>
<script src="../scripts/script.js"></script>


</body>
</html>