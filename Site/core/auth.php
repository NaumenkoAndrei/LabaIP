<?php
define( 'PATH' , $_SERVER['DOCUMENT_ROOT']);

//echo PATH;
include_once PATH."../core/db.class.php";
DB::getInstance();
session_start();

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $login = htmlspecialchars($_POST['login']);
  $pas1 = htmlspecialchars($_POST['pas']);

  if (empty($login) || empty($pas1))
    $error = "Ошибка авторизации <br>";
  if(empty($error)){
    $query = "SELECT * FROM `users` WHERE `login` = '$login' and `pass` = MD5('$pas1')";
    $res = DB::query($query);
    if (($item = DB::fetch_array($res)) != false) {
      $_SESSION['auth'] = true;
      $_SESSION['name'] = $login;
      $_SESSION['user_type'] = $item['user_type'];
      header('location: /');
    }
    else
      include_once "../pages/registration.php";

  }
}
