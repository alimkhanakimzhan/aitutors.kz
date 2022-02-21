<?php 
session_start()?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="shortcut icon" href="img/logominii.png" type="image/x-icon">
	<title>Регистрация</title>
</head>
<body>
<?php require "templates/header_template.php"; ?>

	<form id="reg_form" action="register_feedbackers.php" method="POST" enctype="multipart/form-data">
			<?php 
	if(isset($_SESSION['error'])){
		echo '<p class="unsuccess_auth">' . $_SESSION['error'] . '</p>';
	}
	unset($_SESSION['error']);
	 ?>
	
		<div class="registration_container">
		
			<div class="registration_category">
				Личная информация:
			</div>
			<div class="personal_information_left">
				

				<div class="input_and_text">
					<p>Имя:</p>
					<input class="input__edited" type="text" name="name" placeholder="Айгерим">
				</div>

				<div class="input_and_text">
					<p>Фамилия:</p>
					<input class="input__edited" type="text" name="surname" placeholder="Орумбай">
				</div>

				<div class="input_and_text">
					<p>Отчество:</p>
					<input class="input__edited" type="text" name="patronymic" placeholder="Искандеркызы">
				</div>

				<div class="input_and_text date">
					<p>Дата рождения</p>
					<input type="date" name="dateofbirth" id="date"  >
				</div>

				<div class="input_and_text">
					<p>Пол:</p>
					<label class="pol" for="gender"><img src="img/img_507320.png" alt=""></label>
					<input class="input__edited radio" type="radio" name="gender" value="Мужской" checked>
					<label class="pol" for="gender"><img src="img/91-917535_812-x-980-1-business-woman-icon-png.png" alt=""></label>
					<input class="input__edited radio" type="radio" name="gender" id="Женский" value="Женский">
				</div>

				<div class="input_and_text">
					<p>E-mail:</p>
					<input class="input__edited" type="text" name="email" placeholder="aitutors2016@gmail.com">
				</div>

				<div class="input_and_text">
					<p>Пароль:</p>
					<input class="input__edited" type="password" name="password" placeholder="Не менее 8 символов">
				</div>

				<div class="input_and_text">
					<p>Номер телефона:</p>
					<input class="input__edited" type="text" name="phone_number" id="input_phone" placeholder="+7(775)777-77-77">
				</div>

		

			</div>

			
				<button type="submit" name="submit" onclick="frmotpr()">Создать аккаунт</button>
		</div>

		
	</form>
		<div id="messenger" ></div>

		<?php require "templates/footer_template.php"; ?>
	 <script src="https://unpkg.com/imask"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="scripts/script.js"></script>
	<script src="scripts/script.js"></script>
   
	


</body>

</html>