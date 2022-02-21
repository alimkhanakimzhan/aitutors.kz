<?php 
require "../db.php";
$token = $_GET['token'];
$one=1;

$mysql->query("UPDATE `users` SET `verified` = $one,`token`=null WHERE `token` = '$token'");
$mysql->query("UPDATE `feedbackers` SET `verified` = $one,`token`=null WHERE `token` = '$token'");


$_SESSION['message']= "Вы успешно подтвердили электронную почту. Пожалуйста авторизируйтесь.";
header('Location: ../signin');

 ?>}
