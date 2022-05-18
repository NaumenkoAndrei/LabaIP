<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/core/db.class.php";
DB::getInstance();
$query = "SELECT * FROM `users` WHERE id=".$_GET['id'];
$result = DB::query($query);
if( ($item = DB::fetch_array($result)) != false) {
  $delete_user = $item['id'];
}
$user_type = $_SESSION['user_type'];
if (!empty($delete_user)) {
  $query = "DELETE FROM `users` WHERE id=".$delete_user;
  $result = DB::query($query);
  if ($user_type == 1) {
    unset($_SESSION['auth']);
    unset($_SESSION['name']);
    unset($_SESSION['id']);
    unset($_SESSION['user_type']);
    unset($_SESSION['login']);
    header("location: ../admin/listusers.php");
  }
  else if ($user_type == 5) {
    header("location: ../admin/listusers.php");
  }
}

?>