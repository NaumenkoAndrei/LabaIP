<?php
include_once $_SERVER['DOCUMENT_ROOT']."/core/db.class.php";
DB::getInstance();
$str_pass="";
if(isset($_POST['user_pass1']) && !empty($_POST['user_pass1'])){
  $str_pass=", `pass`= MD5(".$_POST['user_pass1'].")";
}

$query = "UPDATE `users` SET `login` = '".$_POST['user_name']."', `fio`= '".$_POST['user_fio']."', `pass`= '".$str_pass."' WHERE id=".$_POST['id'];
$res = DB::query($query);
header("location: /admin/listusers.php");