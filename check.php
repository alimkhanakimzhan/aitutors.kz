<?php 
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = $_POST['password'];
$reg_date = date("Y-m-d");

$name =filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$surname=filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
$patronomic=filter_var(trim($_POST['patronymic']),FILTER_SANITIZE_STRING);
$dateofbirth=filter_var(trim($_POST['dateofbirth']),FILTER_SANITIZE_STRING);
$gender=filter_var(trim($_POST['gender']),FILTER_SANITIZE_STRING);
$phone_number=filter_var(trim($_POST['phone_number']),FILTER_SANITIZE_STRING);
$telegram=filter_var(trim($_POST['telegram']),FILTER_SANITIZE_STRING);

$course=filter_var(trim($_POST['course']),FILTER_SANITIZE_STRING);
$gpa=filter_var(trim($_POST['gpa']),FILTER_SANITIZE_STRING);
$price=filter_var(trim($_POST['price']),FILTER_SANITIZE_STRING);
$ict=filter_var(trim($_POST['ict']),FILTER_SANITIZE_STRING);
$web=filter_var(trim($_POST['web']),FILTER_SANITIZE_STRING);
$java=filter_var(trim($_POST['java']),FILTER_SANITIZE_STRING);
$cpp=filter_var(trim($_POST['cpp']),FILTER_SANITIZE_STRING);
$calculus1=filter_var(trim($_POST['calc1']),FILTER_SANITIZE_STRING);
$calculus2=filter_var(trim($_POST['calc2']),FILTER_SANITIZE_STRING);
$discrete=filter_var(trim($_POST['disk']),FILTER_SANITIZE_STRING);
$linear=filter_var(trim($_POST['lalgebra']),FILTER_SANITIZE_STRING);

$rus=filter_var(trim($_POST['russian']),FILTER_SANITIZE_STRING);
$eng=filter_var(trim($_POST['english']),FILTER_SANITIZE_STRING);
$kaz=filter_var(trim($_POST['kazakh']),FILTER_SANITIZE_STRING);

$personal_inf=$_POST['persinformation'];
$subject_inf=$_POST['subjectinformation'];

$city=filter_var(trim($_POST['city']),FILTER_SANITIZE_STRING);
$online=filter_var(trim($_POST['online']),FILTER_SANITIZE_STRING);
$usebya=filter_var(trim($_POST['usebya']),FILTER_SANITIZE_STRING);
$uchenika=filter_var(trim($_POST['uchenika']),FILTER_SANITIZE_STRING);
$free_lesson=filter_var(trim($_POST['free_lesson']),FILTER_SANITIZE_STRING);



$password=md5($password."se2016");

print_r($_POST);

 //$mysql=new mysqli('localhost','root','root','aitututors');
// $mysql->query("INSERT INTO users (`email`,`password`,`reg_date`) VALUES ('$email','$password','$reg_date')" );

// $mysql->close();

// header('Location: /')

 ?>