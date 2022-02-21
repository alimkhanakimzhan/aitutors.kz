<?php
session_start();
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = $_POST['password'];
$reg_date = date("Y-m-d");

$one=1;
$password=md5($password."se2016");


$mysql=new mysqli('localhost','root','','aitutors_aitu');

$result = $mysql->query("SELECT*FROM `users` WHERE `email` = '$email' AND `password` = '$password' AND `verified` = $one" );
$result2 = $mysql->query("SELECT*FROM `feedbackers` WHERE `email` = '$email' AND `password` = '$password'  AND `verified` = $one"  );

$user = $result->fetch_assoc();
$user2 = $result2->fetch_assoc();

if(count($user)==0 && count($user2)==0){
	$_SESSION['error']="Не правильный логин или пароль";
	header('Location:signin.php');
	exit();
} if (count($user)!=0){
	$_SESSION['user']=[
	"id" => $user['id'],
	"email" => $user['email'],
	"avatar"=> $user['avatar']
	];
	header('Location:user');
}
if (count($user2)!=0){
	$_SESSION['feedbacker']=[
	"id" => $user2['id'],
	"email" => $user2['email'],
	"name"=> $user2['name'],
	"surname"=> $user2['surname']
	];
	header('Location:tutors');
}






 ?>
