<?php 
require "db.php";
$id=$_POST['feedbacker_id'];
$name=$_POST['name'];
$stars=$_POST['rating'];
$course=$_POST['course'];
$otzyv=$_POST['otzyv_text'];
$getid=$_POST['hidden_input'];
$currentdate=date("Y-m-d");
$one=1;

$isOtzyv=$mysql->query("SELECT*FROM otzyvy WHERE `feedbacker_id`=$id AND `tutor_id`=$getid")->fetch_assoc();
if($isOtzyv>1){
	$mysql->query("UPDATE otzyvy SET `feedback`='$otzyv',`date`='$currentdate',`subject`='$course',`updated`='$one',`stars`='$stars' WHERE `feedbacker_id`=$id AND `tutor_id`=$getid");
	$_SESSION['error_']="К сожалению, вы не можете оставить отзыв этому пользователю. Ранее вы уже оценивали его услуги. Но ваш предыдущий отзыв был обновлен.";
header('Location: /user?id='.$getid);
exit();
}

$mysql->query("INSERT INTO otzyvy (`feedbacker_id`,`name`,`subject`,`tutor_id`,`date`,`feedback`,`stars`) VALUES ($id,'$name','$course','$getid','$currentdate','$otzyv','$stars')");

 header('Location: /user?id='.$getid);

 ?>