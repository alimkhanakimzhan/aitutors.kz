<?php 
	require "db.php";

	$id=$_POST['id'];
	$personal_inf=$_POST['persinformation'];
	$subject_inf=$_POST['subjectinformation'];

	$phone_number=filter_var(trim($_POST['phone_number']),FILTER_SANITIZE_STRING);
	$telegram=filter_var(trim($_POST['telegram']),FILTER_SANITIZE_STRING);

	$ict=filter_var(trim($_POST['ict']),FILTER_SANITIZE_STRING);
	$web=filter_var(trim($_POST['web']),FILTER_SANITIZE_STRING);
	$java=filter_var(trim($_POST['java']),FILTER_SANITIZE_STRING);
	$cpp=filter_var(trim($_POST['cpp']),FILTER_SANITIZE_STRING);
	$calculus1=filter_var(trim($_POST['calc1']),FILTER_SANITIZE_STRING);
	$calculus2=filter_var(trim($_POST['calc2']),FILTER_SANITIZE_STRING);
	$discrete=filter_var(trim($_POST['disk']),FILTER_SANITIZE_STRING);
	$linear=filter_var(trim($_POST['lalgebra']),FILTER_SANITIZE_STRING);

	$price=$_POST['price'];

	$rus=filter_var(trim($_POST['russian']),FILTER_SANITIZE_STRING);
	$eng=filter_var(trim($_POST['english']),FILTER_SANITIZE_STRING);
	$kaz=filter_var(trim($_POST['kazakh']),FILTER_SANITIZE_STRING);

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
		$linear=0;}
	if($rus==''){
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

	$mysql->query("UPDATE `users_inf` SET `personal_inf`='$personal_inf', `subject_inf`='$subject_inf', `phone_number`='$phone_number', `telegram`='$telegram', `price`='$price',`free_lesson`='$free_lesson' WHERE `id`='$id'");

	$mysql->query("UPDATE `users_languages` SET `russian`='$rus', `english`='$eng',`kazakh`='$kaz' WHERE `id`='$id'");

	$mysql->query("UPDATE `users_places` SET `online`='$online', `usebya`='$usebya',`uchenika`='$uchenika' WHERE `id`='$id'");

	$mysql->query("UPDATE `users_subjects` SET `ict`='$ict', `web`='$web',`java`='$java',`c`='$cpp',`calculus1`='$calculus1',`calculus2`='$calculus2',`discrete_math`='$discrete',`linear_algebra`='$linear' WHERE `id`='$id'");

	$_SESSION['success']="Данные успешно изменены!";

	header('Location:edit')







 ?>
