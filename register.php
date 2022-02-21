<?php
session_start();

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


if($ict==''){
	$ict=0;
} if($web==''){
	$web=0;
} if($java==''){
	$java=0;
} if($cpp==''){
	$cpp=0;
} if($calculus1==''){
	$calculus1=0;
} if($calculus2==''){
	$calculus2=0;
} if($discrete==''){
	$discrete=0;
} if($linear==''){
	$linear=0;
} if($rus==''){
	$rus=0;
} if($eng==''){
	$eng=0;
} if($kaz==''){
	$kaz=0;
} if($online==''){
	$online=0;
} if($usebya==''){
	$usebya=0;
} if($uchenika==''){
	$uchenika=0;
}
	$path='Avatars/' . time() . $_FILES['avatar']['name'];
	move_uploaded_file($_FILES['avatar']['tmp_name'], $path );


 $password=md5($password."se2016");



$mysql=new mysqli('localhost','root','','aitutors_aitu');

$result = $mysql->query("SELECT*FROM `users` WHERE `email` = '$email'" );
$result2 = $mysql->query("SELECT*FROM `feedbackers` WHERE `email` = '$email'" );

$user = $result->fetch_assoc();
$user2 = $result2->fetch_assoc();
if($user>0 || $user2>0){
	$_SESSION['error']="Такой e-mail уже зарегистрирован!";
	header('Location: register_tutors');
}
else{
	$tokens = random_bytes(15);
	$token = bin2hex($tokens);
	$zero=0;
 $mysql->query("INSERT INTO users (`email`,`password`,`reg_date`,`avatar`,`token`,`verified`) VALUES ('$email','$password','$reg_date','$path','$token',$zero)" );
 $mysql->query("INSERT INTO users_inf (`name`,`surname`,`patronymic`,`dateofbirth`,`gender`,`phone_number`,`telegram`,`course`,`gpa`,`price`,`city`,`free_lesson`,`personal_inf`,`subject_inf`) VALUES ('$name','$surname','$patronymic','$dateofbirth','$gender','$phone_number','$telegram',$course,$gpa,$price,'$city',$free_lesson,'$personal_inf','$subject_inf')" );
 $mysql->query("INSERT INTO users_languages (`russian`,`english`,`kazakh`) VALUES ($rus,$eng,$kaz)" );
 $mysql->query("INSERT INTO users_places (`online`,`usebya`,`uchenika`) VALUES ('$online','$usebya','$uchenika')" );
 $mysql->query("INSERT INTO users_subjects (`ict`,`web`,`java`,`c`,`calculus1`,`calculus2`,`discrete_math`,`linear_algebra`) VALUES ('$ict','$web','$java','$cpp','$calculus1','$calculus2','$discrete','$linear')");

$mysql->query("INSERT INTO `user_sub_inf`(`ICT`, `WEB`, `JAVA`, `C++`, `CALC1`, `CALC2`, `DISK`, `LINE`) VALUES (null,null,null,null,null,null,null,null)");
	$mysql->query("INSERT INTO `user_sub_price`(`ICT`, `WEB`, `JAVA`, `C++`, `CALC1`, `CALC2`, `DISK`, `LINE`) VALUES (null,null,null,null,null,null,null,null)");




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
