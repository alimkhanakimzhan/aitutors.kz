<?php 
require "db.php";
$password=$_POST['password'];
$confirm=$_POST['confirmpassword'];

$id=$_POST['id'];

if($password==$confirm){
	$password=md5($password."se2016");
	$mysql->query("UPDATE `users` SET `password`='$password' WHERE `id`='$id'");
	$_SESSION['success']="Пароль успешно изменен";
}else{
	$_SESSION['confirm']="Пароли не совпадают. Попробуйте еще раз.";
}

header('Location:/edit_pass');

 ?>