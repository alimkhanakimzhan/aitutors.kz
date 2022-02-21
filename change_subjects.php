<?php 
require "db.php";
$ictprice=0;
$javaprice=0;
$webprice=0;
$cppprice=0;
$calc1price=0;
$calc2price=0;
$diskprice=0;
$lineprice=0;

if($_POST['ictprice']!=''){
	$ictprice=$_POST['ictprice'];
}
if($_POST['javaprice']!=''){
	$javaprice=$_POST['javaprice'];
}
if($_POST['webprice']!=''){
	$webprice=$_POST['webprice'];
}
if($_POST['cppprice']!=''){
	$cppprice=$_POST['cppprice'];
}
if($_POST['calc1price']!=''){
	$calc1price=$_POST['calc1price'];
}
if($_POST['calc2price']!=''){
	$calc2price=$_POST['calc2price'];
}
if($_POST['diskprice']!=''){
	$diskprice=$_POST['diskprice'];
}
if($_POST['lineprice']!=''){
	$lineprice=$_POST['lineprice'];
}

$ictinformation=$_POST['ictinformation'];
$javainformation=$_POST['javainformation'];
$webinformation=$_POST['webinformation'];
$cppinformation=$_POST['cppinformation'];
$calc1information=$_POST['calc1information'];
$calc2information=$_POST['calc2information'];
$diskinformation=$_POST['diskinformation'];
$lineinformation=$_POST['lineinformation'];

$id=$_POST['id'];


$mysql->query("UPDATE `user_sub_price` SET `ICT`=$ictprice,`JAVA`=$javaprice,`WEB`=$webprice, `C++`=$cppprice, `CALC1`=$calc1price,`CALC2`=$calc2price,`DISK`=$diskprice,`LINE`=$lineprice WHERE `id`='$id'");

$mysql->query("UPDATE `user_sub_inf` SET `ICT`='$ictinformation',`JAVA`='$javainformation',`WEB`='$webinformation', `C++`='$cppinformation',`CALC1`='$calc1information',`CALC2`='$calc2information',`DISK`='$diskinformation',`LINE`='$lineinformation' WHERE `id`='$id'");

$_SESSION['success']="Данные успешно изменены!";


header('Location:/edit_subjects');

 ?>