<?php
session_start();

$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = $_POST['password'];

$name =filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$surname=filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
$patronomic=filter_var(trim($_POST['patronymic']),FILTER_SANITIZE_STRING);
$dateofbirth=filter_var(trim($_POST['dateofbirth']),FILTER_SANITIZE_STRING);
$gender=filter_var(trim($_POST['gender']),FILTER_SANITIZE_STRING);
$phone_number=filter_var(trim($_POST['phone_number']),FILTER_SANITIZE_STRING);


$password=md5($password."se2016");
$mysql=new mysqli('localhost','root','','aitutors_aitu');
$result = $mysql->query("SELECT*FROM `users` WHERE `email` = '$email'");
$result2 = $mysql->query("SELECT*FROM `feedbackers` WHERE `email` = '$email'" );

$user = $result2->fetch_assoc();
$user2 = $result->fetch_assoc();
if($user>0 || $user2>0){
$_SESSION['error']="Такой e-mail уже зарегистрирован!";
	header('Location: register_users');
}else{
	$tokens = random_bytes(15);
	$token = bin2hex($tokens);
	$zero=0;

 $mysql->query("INSERT INTO feedbackers (`name`,`surname`,`patronym`,`birth_date`,`email`,`password`,`phone_number`,`gender`,`token`,`verified`) VALUES ('$name','$surname','$patronomic','$dateofbirth','$email','$password','$phone_number','$gender','$token',$zero)");

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$mail->Host = "ssl://smtp.mail.aitutors.kz";
$mail->SMTPAuth = true;
$mail->Username = 'helper@aitutors.kz'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Astana2020*'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';


$mail->Port = 465 ; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('helper@aitutors.kz'); // от кого будет уходить письмо?
$mail->addAddress($email);     // Кому будет уходить письмо

$mail->isHTML(true);

$mail->Subject = 'Подтверждение электронной почты';
$mail->Body    =  'Здравствуйте, '.$name.' '.$surname.'. Чтобы подтвердить почту перейдите по этой ссылке: aitutors.kz/verify/email_verifier?token='.$token;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
}



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$_SESSION['message']= "Для завершения регистрации проверьте вашу почту. На вашу почту отправлено письмо для подтверждения электронной почты.";
 $mysql->close();
	header('Location: signin');
}


?>
