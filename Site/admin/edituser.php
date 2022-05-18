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
  <title>Редактировние пользователя</title>
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
              <a class="nav_link" href="../admin/listusers.php">Список пользователей</a><?
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

?>
<?php
$query = "SELECT * FROM `users` WHERE id=".$_GET['id'];
$res = DB::query($query);
if(($item = DB::fetch_array($res)) != false) {
?>
<div class="txt">
  <center><h2>Редактирование пользователя</h2></center>
  <center>
    <form action="../admin/updateuser.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?=$item['id']?>">
      <table>
        <tr>
          <td>Логин</td>
          <td>
            <input type="text" name="user_name" value="<?=$item['login']?>"/>
          </td>
        </tr>
        <tr>
          <td>ФИО</td>
          <td>
            <input type="text" name="user_fio" value="<?= $item['fio'] ?>"/>
          </td>
        </tr>
        <tr>
          <td>Пароль</td>
          <td>
            <input type="password" name="user_pass1"/>
          </td>
        </tr>
        <tr>
          <td>Пароль повторно</td>
          <td>
            <input type="password" name="user_pass2"/>
          </td>
        </tr>
      </table>
      <input type="submit" value="Изменить">
    </form>
  </center>
</div>
<?}?>
</body>
</html>