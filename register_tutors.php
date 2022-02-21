<?php 
session_start()?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css?v=1">
	<link rel="shortcut icon" href="img/logominii.png" type="image/x-icon">
	<title>Регистрация</title>
</head>
<body>
<?php require "templates/header_template.php"; ?>

	<div class="subjects_tittle">Создание личного кабинета</div>
	<div class="tittle_subtext">Информация очень важна для привлечения учеников. Постарайтесь заполнить все поля.</div>
	<?php 
	if(isset($_SESSION['error'])){
		echo '<p class="unsuccess_auth">' . $_SESSION['error'] . '</p>';
	}
	unset($_SESSION['error']);
	 ?>
	

		
		<div class="registration_container">	
			<form id="iin" action="iinchecker.php" method="POST" style="display:flex;">
				
			<div class="input_and_text">
					<p>ИИН:</p>
					<input class="input__edited" type="text" name="name" placeholder="Айгерим">
			</div>
				<button class="iinchecker_button">Найти</button>
			</form>
			
			<form id="reg_form" action="register.php" method="POST" enctype="multipart/form-data">
			<div class="avatar_upload">
				<img src="img/uploadavatar.png" alt="" width="174px" height="174px">
				<span>Загрузите фото профиля</span>
				<input type="file" name="avatar">
			</div>
			
		
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
					<input class="input__edited radio" type="radio" name="gender" value="Мужской">
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

				<div class="input_and_text">
					<p>Телеграм:</p>
					<input class="input__edited" type="text" name="telegram" placeholder="@f0opy">
				</div>

			</div>

			<div class="registration_category">
				Информация по преподаванию:
			</div>
			<div class="input_and_text">
				<p>Курс:</p>
				<select name="course" id="course_select">
					<option value="1">1 - курс</option>
					<option value="2">2 - курс</option>
					<option value="3">3 - курс</option>
				</select>
			</div>

			<div class="input_and_text">
				<p>GPA:</p>
				<input class="input__edited w-133" type="number" name="gpa" id="course_select" max="4" min=0  step="0.01">
			</div>


		
				<div class="input_and_text">
					<p>Предмет:</p>	

					<div class="information_educating_columns">
						<input type="checkbox" class="custom-checkbox" id="ict" name="ict" value="1">
						<label for="ict">ICT</label>
						
						<input type="checkbox" class="custom-checkbox" id="web" name="web" value="1">
						<label for="web">WEB</label>

						<input type="checkbox" class="custom-checkbox" id="java" name="java" value="1">
						<label for="java">Java</label>

						<input type="checkbox" class="custom-checkbox" id="cpp" name="cpp" value="1">
						<label for="cpp">C++</label>

						<input type="checkbox" class="custom-checkbox" id="calc1" name="calc1" value="1">
						<label for="calc1">Calculus I</label>
						
						<input type="checkbox" class="custom-checkbox" id="calc2" name="calc2" value="1">
						<label for="calc2">Calculus II</label>

						<input type="checkbox" class="custom-checkbox" id="disk" name="disk" value="1">
						<label for="disk">Discrete Math</label>
						
						<input type="checkbox" class="custom-checkbox" id="lalgebra" name="lalgebra" value="1">
						<label for="lalgebra">Linear Algebra</label>
					</div>

				</div>

				<div class="input_and_text">
					<p>Цена:</p>
					<input class="input__edited w-133" type="number" name="price" placeholder="2500">
				</div>

				<div class="input_and_text w258px">
					<p>Язык преподавания:</p>
					<input type="checkbox" class="custom-checkbox" id="russian" name="russian" value="1" checked>
					<label for="russian">Русский</label>
					<input type="checkbox" class="custom-checkbox" id="english" name="english" value="1">
					<label for="english">Английский</label>
					<input type="checkbox" class="custom-checkbox" id="kazakh" name="kazakh" value="1">
					<label for="kazakh">Казахский</label>
				</div>
			
				<div class="registration_category">
				Дополнительная информация:
				</div>
				<div class="input_and_text fullwidth">
					<p>Короткая информация о себе:</p>
					<textarea class="persinformation" id="persinformation" name="persinformation" placeholder="Расскажите чем занимаетесь, какие достижения, награды и т.п.  "></textarea> 
				</div>

				<div class="input_and_text fullwidth">
					<p>Информация о предмете:</p>
					<textarea class="addinformation" id="subjectinformation" name="subjectinformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранным выше предметам и т.п.   "></textarea> 
				</div>
				<div class="registration_category mt-0">
				Место преподавания:
				</div>
				<div class="input_and_text w136px">
				<p>Ваш город:</p>
				<select name="city" id="city">
					<option value="Нур-Султан">Нур-Султан</option>
					<option value="Алматы">Алматы</option>
					<option value="Шымкент">Шымкент</option>
					<option value="Актобе">Актобе</option>
					<option value="Караганда">Караганда</option>
					<option value="Тараз">Тараз</option>
					<option value="Актау">Актау</option>
					<option value="Уральск">Уральск</option>
					<option value="Кызылорда">Кызылорда</option>
					<option value="Павлодар">Павлодар</option>
					<option value="Усть-Каменогорск">Усть-Каменогорск</option>
					<option value="Семей">Семей</option>
					<option value="Атырау">Атырау</option>
					<option value="Костанай">Костанай</option>
				</select>
				</div>
				<div class="input_and_text w344px db">
					<p>Способы преподавания:</p>
					<input type="checkbox" class="custom-checkbox" id="online" name="online" value="1" checked>
					<label for="online">Онлайн</label>
					<input type="checkbox" class="custom-checkbox" id="usebya" name="usebya" value="1">
					<label for="usebya">У себя</label>
					<input type="checkbox" class="custom-checkbox" id="uchenika" name="uchenika" value="1">
					<label for="uchenika">У ученика</label>

				</div>
				<div class="input_and_text w344px df ">
					<p>Пробный бесплатный урок:</p>
					<input class="input__edited radio" type="radio"  id="yes" name="free_lesson" value="1">
					<label for="yes">Да</label>
					<input class="input__edited radio" type="radio"  id="lesson" name="free_lesson" value="0" checked>
					<label for="lesson">Нет</label>


					

				</div>
				<button type="submit" name="submit" onclick="frmotpr()">Создать аккаунт</button>
		</div>

		
	</form>
		<div id="messenger" ></div>

		<?php require "templates/footer_template.php"; ?>
	 <script src="https://unpkg.com/imask"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="scripts/script.js"></script>
   
	


</body>

</html>