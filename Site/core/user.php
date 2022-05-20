<?php
  define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);

  //echo PATH;
  include_once PATH."../core/db.class.php";
  DB::getInstance();

  session_start();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars($_POST['user_name']);
    $fio = htmlspecialchars($_POST['user_fio']);
    $pas1 = htmlspecialchars($_POST['user_pass']);
    $pas2 = htmlspecialchars($_POST['user_pass2']);
    $error = "";

    if(!empty($login) && !empty($pas1) && !empty($pas2)){
      $find_login = "SELECT * FROM `users` WHERE login='$login'";
      $result = DB::query($find_login);
      if(($item = DB::fetch_array($result)) != false) {
        $error="Этот логин уже занят другим пользователем.";
      }
    }

    if (empty($login))
      $error = "Логин не может быть пустым <br>";
    if (empty($pas1))
      $error .= "Пароль не может быть пустым <br>";
    if ($pas1 != $pas2)
      $error .= "Пароли должны совпадать";
    if (empty($fio))
      $fio = $login;


    if(empty($error)){
      $query = "INSERT INTO `users` (`login`, `fio`, `pass`) VALUES ('$login', '$fio', MD5('$pas1'))";

      DB::query($query);

      $_SESSION['auth'] = true;
      $_SESSION['name'] = $login;
      $_SESSION['user_type'] = 1;
      header('location: /');
    }
;
    include_once "../pages/registration.php";
  }
?>
