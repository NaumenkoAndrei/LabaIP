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
  <div class="container" >
    <div class="rectangle1">
      <a class="nameU">
        <?php
        if (isset($_SESSION['auth'])) {
          echo "Пользователь: " . $_SESSION['name'];
          echo "<a class='reg' href ='../exit.php'> Выход </a>";
        }else {?>
          <a class="reg" href="registration.php"><u>Регистрация</u></a>
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
  <center><h2>Регистрация</h2></center>


  <?php
    if(isset($error) && !empty($error))
        {
            ?>

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
</body>
</html>