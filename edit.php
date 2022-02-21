<?php require "db.php";

		$currentdate=new DateTime();
		

		$userid=$_SESSION['user']['id'];
		$username=$_SESSION['user']['name'];
		$usersurname=$_SESSION['user']['surname'];
		
		$getid=$_SESSION['user']['id'];
		$user = $mysql->query("SELECT*FROM `users_inf` WHERE `id` = '$getid'")->fetch_assoc();

		$user_avatar= $mysql->query("SELECT*FROM `users` WHERE `id` = '$getid'")->fetch_assoc();	

		$users_subjects=$mysql->query("SELECT*FROM `users_subjects` WHERE `id` = '$getid'")->fetch_assoc();

		$users_places=$mysql->query("SELECT*FROM `users_places` WHERE `id` = '$getid'")->fetch_assoc();

		$users_languages=$mysql->query("SELECT*FROM `users_languages` WHERE `id` = '$getid'")->fetch_assoc();

		$reg_date1=date_create($user_avatar['reg_date']);
		$interval= date_diff($reg_date1,$currentdate);
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> <?= $user['name'].' '.$user['surname'] ?></title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="shortcut icon" href="img/logominii.png" type="image/x-icon">
	
</head>
<body>
	
	<?php require "templates/header_template.php"; ?>
	<div class="edit_block">
		<a href="edit_photo">
			<div class="collapse_elements p5px">
				Изменить фото профиля
			</div>
		</a>
		<a href="edit_pass">
			<div class="collapse_elements p5px">
				Изменить пароль
			</div>
		</a>
		<a href="edit_subjects">
			<div class="collapse_elements p5px">
				Изменить предметы
			</div>
		</a>
	</div>

	<div class="user_container">
		<div class="main_user_info">
			<div class="photo_and_name">
				<a href="/user?id=<?php echo $getid; ?>" class="photo <?php $verifier=$mysql->query("SELECT `id` FROM `verified_users` WHERE `id`='$getid'")->fetch_assoc(); 
				if(count($verifier)!=0){
						 	echo ' verified'; }?>">
					<img src="<?php echo  $user_avatar['avatar']  ?>" alt="">

				</a>

				<div class="FIO" style="text-align: center;">
					<span><?php echo $user['name'].' '.mb_substr($user['surname'],0,1);echo '.';
					 
					  ?></span>
					  <?php if(count($verifier)!=0){
						 	echo '<img src="img/1200px-Checkmark_green.svg.png" alt="">';
						 } ?>
				</div>
			</div>

			<div class="user_personal_information">
				<div class="users_subjects">

					<?php if($users_subjects['ict']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=ICT" class="blue_squares">
						<span>ICT</span>
					</a>
					<?php endif; ?>

					<?php if($users_subjects['web']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=WEB" class="blue_squares">
						<span>WEB</span>
					</a>
					<?php endif; ?>

					<?php if($users_subjects['java']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=JAVA" class="blue_squares">
						<span>JAVA</span>
					</a>
					<?php endif; ?>

					<?php if($users_subjects['c']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=C" class="blue_squares">
						<span>C++</span>
					</a>
					<?php endif; ?>

					<?php if($users_subjects['calculus1']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=CALC1" class="blue_squares">
						<span>CALC1</span>
					</a>
					<?php endif; ?>

					<?php if($users_subjects['calculus2']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=CALC2" class="blue_squares">
						<span>CALC2</span>
					</a>
					<?php endif; ?>

					<?php if($users_subjects['discrete_math']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=DISK" class="blue_squares">
						<span>DISK</span>
					</a>
					<?php endif; ?>

					<?php if($users_subjects['linear_algebra']==1): ?>
					<a href="/user?id=<?php echo $getid ?>&sub=LINE" class="blue_squares">
						<span>LINE</span>
					</a>
					<?php endif; ?>

					<?php if($user['free_lesson']==1): ?>
						<div class="free_lesson_logo">
							<img src="img/free_PNG90763.png" alt="">
						</div>
					<?php endif; ?>
				</div>

				<span class="personal_inf">
					<?php echo $user['personal_inf']  ?>
				</span>
			</div>

			<div class="user_vertical_line">
				
			</div>

			<div class="user_right_content">
				<div class="eachfield mb-5">
					<span class="ft-15">На сайте:</span> <p ><?php
					echo mb_substr($interval->format('%R%a дней'),1); 
					 ?></p>
				</div>
				<div class="eachfield mb-5">
					<span class="ft-15">GPA:</span> <p ><?php echo $user['gpa'] ?></p>
				</div>
				<div class="eachfield mb-5">
					<span class="ft-15">Course:</span> <p ><?php echo $user['course'] ?></p>
				</div>
				<div class="eachfield mb-5">
					<div class="stars_number">
						<img src="img/star_PNG41474.png" alt="">
						<span><big><b><?php 
							$otzyvy_avg=$mysql->query("SELECT*FROM `otzyvy` WHERE `tutor_id`=$getid");
							$otzyvy_avg_counter=0;
							$sum=0;
							while($roo1=$otzyvy_avg->fetch_assoc()){
								$sum=$sum+$roo1['stars'];
								$otzyvy_avg_counter=$otzyvy_avg_counter+1;
							}
							if($otzyvy_avg_counter==0){
								echo '0';}
							else {
								$avg=$sum/$otzyvy_avg_counter;
								echo mb_substr($avg,0,3);}
						 ?></b></big> </span>
					</div>

					<div class="otzyvy_number">
						<a href="#otzyvy_container"><span>Отзывы: <?php 
							$otzyvy_num=$mysql->query("SELECT*FROM `otzyvy` WHERE `tutor_id`=$getid");
							$otzyvy_num_counter=0;
							while($roo=$otzyvy_num->fetch_assoc()){
								$otzyvy_num_counter=$otzyvy_num_counter+1;
							}
							echo $otzyvy_num_counter;
						 ?></span></a> 
					</div>
				</div>
			

			
				<a href="edit" class="share_data edited" id="modal"><p>Изменить данные</p></a>

			</div>

		</div>
			<?php  if(isset($_SESSION['success'])){
					echo '<p class="success posa">' . $_SESSION['success'] . '</p>';
				}
				unset($_SESSION['success']);
				 ?>
	<form action="edit_main.php" method="POST" class="form_df1">
		<div class="input_and_text fullwidth">
					<p class="user_headers">Короткая информация о себе:</p>
					<textarea class="edit_persinformation" id="persinformation" name="persinformation" placeholder="Расскажите чем занимаетесь, какие достижения, награды и т.п."><?php echo $user['personal_inf'] ?></textarea> 
		</div>

		<?php  if($_GET['sub']!=''): ?>
				<div class="subandprice">
					<div class="blue_squares mb-0">
						<span><?php if($_GET['sub']=='C'){
							echo "C++";
						}else echo $_GET['sub'] ?></span>
					</div>
					<div class="sub_price">
						- <?php 
						$sub=$_GET['sub'];
						
							
						$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
					echo $user_sub_price[$sub]; ?>тг/час
					</div>
				</div>
				<div class="main_user_info mb-50 mt-5"> 
					<span class="subject_inf"><?php 
					
					$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
					echo $user_sub_inf[$sub];
					?></span>
				</div>
		<?php endif; ?>

	
			<div class="input_and_text fullwidth">
					<p class="user_headers">Информация о предмете:</p>
					<textarea class="edit_persinformation" id="subjectinformation" name="subjectinformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранным выше предметам и т.п."><?php echo $user['subject_inf'] ?></textarea> 
		</div>

		<p class="user_headers mb-0">
			Контактные данные:
		</p>
		<div class="main_user_info mb-50 height-a">
			<div class="eachfield">
				<span class="ft-20">Номер телефона:</span> <input name="phone_number" class="edit_number" type="text" id="input_phone" value="<?php 
				echo $user['phone_number'] ?>">
			</div>
			<div class="eachfield">
				<span class="ft-20">E-mail:</span> <p ><?php 
					echo $user_avatar['email'] ?></p>
			</div>
			<div class="eachfield">
					<span class="ft-20">Telegram:</span> <input name="telegram" class="edit_number" type="text" value="<?php 
				echo $user['telegram'] ?>">
			</div>
		</div>
		<div class="input_and_text">
					<p class="user_headers mr5">Предмет:</p>	

					<div class="information_educating_columns">
						<input type="checkbox" class="custom-checkbox" id="ict" name="ict" value="1" <?php if($users_subjects['ict']==1){echo "checked";} ?>>
						<label for="ict">ICT</label>
						
						<input type="checkbox" class="custom-checkbox" id="web" name="web" value="1" <?php if($users_subjects['web']==1){echo "checked";} ?>>
						<label for="web">WEB</label>

						<input type="checkbox" class="custom-checkbox" id="java" name="java" value="1" <?php if($users_subjects['java']==1){echo "checked";} ?>>
						<label for="java">Java</label>

						<input type="checkbox" class="custom-checkbox" id="cpp" name="cpp" value="1" <?php if($users_subjects['c']==1){echo "checked";} ?>>
						<label for="cpp">C++</label>

						<input type="checkbox" class="custom-checkbox" id="calc1" name="calc1" value="1" <?php if($users_subjects['calculus1']==1){echo "checked";} ?>>
						<label for="calc1">Calculus I</label>
						
						<input type="checkbox" class="custom-checkbox" id="calc2" name="calc2" value="1" <?php if($users_subjects['calculus2']==1){echo "checked";} ?>>
						<label for="calc2">Calculus II</label>

						<input type="checkbox" class="custom-checkbox" id="disk" name="disk" value="1" <?php if($users_subjects['discrete_math']==1){echo "checked";} ?>>
						<label for="disk">Discrete Math</label>
						
						<input type="checkbox" class="custom-checkbox" id="lalgebra" name="lalgebra" value="1" <?php if($users_subjects['linear_algebra']==1){echo "checked";} ?>>
						<label for="lalgebra">Linear Algebra</label>
					</div>

				</div>
		<div class="input_and_text">
					<p class="user_headers mr5">Цена:</p>
					<input class="input__edited w-133" type="number" name="price" value="<?php echo $user['price']; ?>">
				</div>

				<div class="input_and_text w258px">
					<p class="user_headers mb-0">Язык преподавания:</p>
					<input type="checkbox" class="custom-checkbox" id="russian" name="russian" value="1" <?php if($users_languages['russian']==1) {echo "checked";} ?>>
					<label for="russian">Русский</label>
					<input type="checkbox" class="custom-checkbox" id="english" name="english" value="1" <?php if($users_languages['english']==1) {echo "checked"; }?>>
					<label for="english">Английский</label>
					<input type="checkbox" class="custom-checkbox" id="kazakh" name="kazakh" value="1" <?php if($users_languages['kazakh']==1) {echo "checked";} ?>>
					<label for="kazakh">Казахский</label>
				</div>
				<div class="input_and_text w344px db">
					<p class="user_headers mb-0">Способы преподавания:</p>
					<input type="checkbox" class="custom-checkbox" id="online" name="online" value="1" <?php if($users_places['online']==1){
						echo "checked";
					} ?>>
					<label for="online">Онлайн</label>
					<input type="checkbox" class="custom-checkbox" id="usebya" name="usebya" value="1" <?php if($users_places['usebya']==1){
						echo "checked";
					} ?>>
					<label for="usebya">У себя</label>
					<input type="checkbox" class="custom-checkbox" id="uchenika" name="uchenika" value="1" <?php if($users_places['uchenika']==1){
						echo "checked";
					} ?>>
					<label for="uchenika">У ученика</label>

				</div>
				<div class="input_and_text w344px df ">
					<p class="user_headers mb-0">Пробный бесплатный урок:</p>
					<input class="input__edited radio" type="radio"  id="yes" name="free_lesson" value="1" <?php if($user['free_lesson']==1){echo "checked";} ?>>
					<label for="yes">Да</label>
					<input class="input__edited radio" type="radio"  id="lesson" name="free_lesson" value="0" <?php if($user['free_lesson']==0){echo "checked";} ?>>
					<label for="lesson">Нет</label>
				</div>

				<button class="edit_button" type="submit" name="submit" onclick="">Изменить данные</button>
				<input name="id" class="hidden_input" type="text" value="<?php echo $getid; ?> ">
				</form>
	</div>
	
	


<?php require "templates/footer_template.php"; ?>

	<script src="https://unpkg.com/imask"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="scripts/script.js"></script>
</body>
</html>