<?php 

require "db.php";

$subject=$_POST['course'];

$price_ot=$_POST['price_ot'];
$price_do=$_POST['price_do'];
$free_lesson=$_POST['free_lesson'];

if($price_ot==''){
	$price_ot=0;
}
if($price_do==''){
	$price_do=100000;
}


if($_POST['sort']=='ASC'){
	header('Location: /tutors?sort=asc&sub='.$subject.'&ot='.$price_ot.'&do='.$price_do.'&free='.$free_lesson);
}
if($_POST['sort']=='DESC'){
	header('Location: /tutors?sort=desc&sub='.$subject.'&ot='.$price_ot.'&do='.$price_do.'&free='.$free_lesson);
}



 ?>