<?php 
session_start()?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<title>Авторизация</title>
	<link rel="shortcut icon" href="img/logominii.png" type="image/x-icon">
</head>
<body>
	<?php require "templates/header_template.php"; ?>

	
	<?php 
	if(isset($_SESSION['message'])){
		echo '<p class="success_reg">' . $_SESSION['message'] . '</p>';
	}
	unset($_SESSION['message']);
	 ?>

	<div class="subjects_tittle signin">Вход в личный кабинет</div>


	<form action="auth.php" method="POST">
		<div class="registration_container signin">
				<div class="input_and_text signin">
					<p>E-mail:</p>
					<input class="input__edited" type="text" name="email" placeholder="aitutors2016@gmail.com">
				</div>
				<div class="input_and_text signin">
					<p>Пароль:</p>
					<input class="input__edited" type="password" name="password" placeholder="">
				</div>
				<?php echo $error; ?>
					
				<span class="textss">Если у вас нет аккаунта, то нажмите <a href="signup">сюда</a></span>
				<button class="sign" type="submit" name="submit">Войти</button>
		</div>
	<?php 
	if(isset($_SESSION['error'])){
		echo '<p class="unsuccess_auth">' . $_SESSION['error'] . '</p>';
	}
	unset($_SESSION['error']);
	 ?>

		
	</form>

		<?php require "templates/footer_template.php"; ?>
	<script src="scripts/script.js"></script>
</body>
</html>