<?php
  define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);

  //echo PATH;
  include_once PATH."../core/db.class.php";
  DB::getInstance();

  session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
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
      <center><h2>Регистрация</h2></center>
        <?php
          if(isset($error) && !empty($error)) {?>
          <div class="reg"> <center>
              <?=$error?>
          </div> </center>

      <?php } ?>

      <?php if (!isset($error) || (isset($error) && !empty($error))) { ?>

        <center>
          <form action="../core/user.php" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <td>Ваш логин</td>
                <td>
                  <input type="text" name="user_name" value="<?=$login?>" REQUIRED>
                </td>
              </tr>
              <tr>
                <td>Ваше ФИО</td>
                <td>
                  <input type="text" name="user_fio" value="<?=$fio?>">
                </td>
              </tr>
              <tr>
                <td>Пароль</td>
                <td>
                  <input type="password" name="user_pass">
                </td>
              </tr>
              <tr>
                <td>Пароль повторно</td>
                <td>
                  <input type="password" name="user_pass2">
                </td>
              </tr>
            </table>

            <input type="submit" value="Зарегистрироваться">
          </form>
        </center>

      <?php } else
        if(empty($error))
          echo "<center> Пользователь зарегистрирован </center>";
      ?>

    </div>
  </div>
</div>
<script src="../scripts/script.js"></script>


</body>
</html>