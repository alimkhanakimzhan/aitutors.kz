<?php require "db.php";

		$currentdate=new DateTime();


		$userid=$_SESSION['user']['id'];
		$username=$_SESSION['user']['name'];
		$usersurname=$_SESSION['user']['surname'];
		if($_GET['id'] ==''){
			header('Location: /user?id='.$userid);
		}

		$getid=$_GET['id'];
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
	<link rel="stylesheet" href="css/styles.css?v=1">
	<link rel="shortcut icon" href="img/logominii.png" type="image/x-icon">
</head>
<body>

	<?php require "templates/header_template.php"; ?>

	<?php if(isset($_SESSION['error_'])): ?>
	<div class="error_container">
		<p><?php echo $_SESSION['error_']; ?></p>
	</div>
	<?php unset($_SESSION['error_'] ) ?>
<?php endif; ?>
	<div class="user_container">
		<div class="main_user_info">
			<div class="photo_and_name ">
				<a href="/user?id=<?php echo $getid; ?>" class="photo <?php $verifier=$mysql->query("SELECT `id` FROM `verified_users` WHERE `id`='$getid'")->fetch_assoc();
				if(count($verifier)!=0){
						 	echo ' verified'; }?>" id="photo_static">
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
				<div class="modal" id="modalwindow" >
				    <div id="modal_share_data">
						<form action="mail.php" method="POST">
							<span>Если ты ученик и вы договорились с репетитором по поводу времени и место преподавания, то пожалуйста заполни все поля. Все данные отправятся на почту репетитора.</span>
							<div class="input_and_text1">
								<p class="modal_window_text">Имя:</p>
								<input class="input__edited modalinput" type="text" name="name" placeholder="Азамат">
							</div>
							<div class="input_and_text1">
								<p class="modal_window_text">Фамилия:</p>
								<input class="input__edited modalinput" type="text" name="surname" placeholder="Аманжолов">
							</div>
							<div class="input_and_text1">
								<p class="modal_window_text">Предмет:</p>
								<select name="course" id="course_select">
									<?php if($users_subjects['ict']==1): ?>
									<option value="ICT">ICT</option>
									<?php endif; ?>
									<?php if($users_subjects['web']==1): ?>
									<option value="WEB">WEB</option>
									<?php endif; ?>
									<?php if($users_subjects['java']==1): ?>
									<option value="JAVA">JAVA</option>
									<?php endif; ?>
									<?php if($users_subjects['c']==1): ?>
									<option value="C++">C++</option>
									<?php endif; ?>
									<?php if($users_subjects['calculus1']==1): ?>
									<option value="Calculus1">Calculus1</option>
									<?php endif; ?>
									<?php if($users_subjects['calculus2']==1): ?>
									<option value="Calculus2">Calculus2</option>
									<?php endif; ?>
									<?php if($users_subjects['discrete_math']==1): ?>
									<option value="Discrete Math">Discrete Math</option>
									<?php endif; ?>
									<?php if($users_subjects['linear_algebra']==1): ?>
									<option value="Linear Algebra">Linear Algebra</option>
									<?php endif; ?>
								</select>
							</div>
							<div class="input_and_text1">
								<p class="modal_window_text ">Дни недели:</p>
								<input class="input__edited modalinput" type="text" name="days" placeholder="ПН,ВТ,ЧТ">
							</div>

							<div class="input_and_text1">
								<p class="modal_window_text">Время:</p>
								<input class="input__edited modalinput" type="text" name="time" placeholder="14:00">
							</div>
							<div class="input_and_text1">
								<p class="modal_window_text ">Номер телефона:</p>
								<input class="input__edited modalinput" type="text" name="phone_number"  placeholder="+7(775)777 77 77">
							</div>
							<input name="name_surname" class="hidden_input" type="text" value="<?php echo $user['name'].' '.$user['surname']; ?> ">
							<input name="email" class="hidden_input" type="text" value="<?php echo $user_avatar['email']; ?> ">
							<button class="share_data mb-34" type="submit">ОТПРАВИТЬ</button>
							<a href="#" id="closeb" onclick="closedoor()">x</a>
						</form>

					</div>
				  </div>


				<?php if($_GET['id']!=$userid): ?>
				<button class="share_data" id="modal" onclick="modal()">Поделиться данными</button>
				<?php else: ?>
				<a href="edit" class="share_data edited" id="modal"><p>Изменить данные</p></a>
				<?php endif; ?>


			</div>

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
						if($_GET['sub']=='C'){
							$sub="C++";
						}else {$sub=$_GET['sub'];}



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

		<p class="user_headers mb-0">
			Информация о предмете:
		</p>
		<div class="main_user_info mb-50">
			<span class="subject_inf"><?php echo $user['subject_inf']  ?></span>

		</div>

		<p class="user_headers mb-0">
			Контактные данные:
		</p>
		<div class="main_user_info mb-50 height-a">
			<div class="eachfield">
				<span class="ft-20">Номер телефона:</span> <p ><?php
				echo $user['phone_number'] ?></p>
			</div>
			<div class="eachfield">
				<span class="ft-20">E-mail:</span> <p ><?php
					echo $user_avatar['email'] ?></p>
			</div>
			<div class="eachfield">
				<span class="ft-20">Telegram:</span> <p ><?php
					echo $user['telegram'] ?></p>
			</div>
		</div>

		<div class="user_headers">
			<span>Способы преподавания:</span> <p ><?php if($users_places['online']==1){
				echo 'Онлайн &nbsp;&nbsp;&nbsp;';
			}
			if($users_places['usebya']==1){
				echo 'У Себя &nbsp;&nbsp;&nbsp;';
			}
			if($users_places['uchenika']==1){
				echo 'У ученика &nbsp;&nbsp;&nbsp;';
			} ?></p>
		</div>


		<div class="user_headers">
			<span>Языки преподавания:</span> <p ><?php if($users_languages['russian']==1){
				echo 'Русский &nbsp;&nbsp;&nbsp;';
			}
			if($users_languages['english']==1){
				echo 'Английский &nbsp;&nbsp;&nbsp;';
			}
			if($users_languages['kazakh']==1){
				echo 'Казахский &nbsp;&nbsp;&nbsp;';
			} ?></p>
		</div>
	</div>

	<div id="otzyvy_container" class="otzyvy_container">
		<p class="user_headers mb-0">
			Отзывы:
		</p>
		<div class="main_user_info mb-50 height-a mh0">
			<?php if($_SESSION['feedbacker']): ?>
			<div class="writing_otzyv_block">

				<div class="writing_otzyv_block_upper">
					<form id="otzyv" action="otzyv_send.php" method="POST" class="form_df">
						<input name="hidden_input" class="hidden_input" type="text" value="<?php echo $getid ?> ">
						<div class="otzyv_upper">
							<input type="text" name="name" class="otzyv_name_block" placeholder=" Введите имя" value="<?php echo $_SESSION['feedbacker']['name'];  ?> "><div class="stars_block">
							<div class="rating">
								 <input type="radio" name="rating" value="5" id="5">
								 <label for="5">☆</label>
								 <input type="radio" name="rating" value="4" id="4">
								 <label for="4">☆</label>
								 <input type="radio" name="rating" value="3" id="3">
								 <label for="3">☆</label>
								 <input type="radio" name="rating" value="2" id="2">
								 <label for="2">☆</label>
								 <input type="radio" name="rating" value="1" id="1">
								 <label for="1">☆</label>

							</div>
						</div>
						<select name="course" id="course_select" class="otzyv_name_block">
											<?php if($users_subjects['ict']==1): ?>
											<option value="ICT">ICT</option>
											<?php endif; ?>
											<?php if($users_subjects['web']==1): ?>
											<option value="WEB">WEB</option>
											<?php endif; ?>
											<?php if($users_subjects['java']==1): ?>
											<option value="JAVA">JAVA</option>
											<?php endif; ?>
											<?php if($users_subjects['c']==1): ?>
											<option value="C++">C++</option>
											<?php endif; ?>
											<?php if($users_subjects['calculus1']==1): ?>
											<option value="Calculus1">Calculus1</option>
											<?php endif; ?>
											<?php if($users_subjects['calculus2']==1): ?>
											<option value="Calculus2">Calculus2</option>
											<?php endif; ?>
											<?php if($users_subjects['discrete_math']==1): ?>
											<option value="Discrete Math">Discrete Math</option>
											<?php endif; ?>
											<?php if($users_subjects['linear_algebra']==1): ?>
											<option value="Linear Algebra">Linear Algebra</option>
											<?php endif; ?>
						</select>
						<button type="submit" class="otzyv_send mr-0" onclick="frmotpr1()"><b>Отправить</b></button>
						</div>
					<div>
						<textarea name="otzyv_text" id="otzyv_text" class="otzyv_textarea"></textarea>
					</div>
					<input name="feedbacker_id" class="hidden_input" type="text" value="<?php echo $_SESSION['feedbacker']['id'] ?> "></form>
				</div>

					<div id="messenger1" class="messenger otzyv" ></div>


			</div>
			<?php endif; ?>

			<?php
			$otzyvy=$mysql->query("SELECT*FROM `otzyvy` WHERE `tutor_id`=$getid ORDER by date DESC" );
			$counter=0;
			while($roo=$otzyvy->fetch_assoc()){
				$counter=$counter+1;
				echo '	<div class="otzyvy_users">
				<div class="otzyvy_users_left">
					<div class="otzyv_subject">
						'.$roo['subject'].'
					</div>
					<span class="otzyvy_users_name">'.$roo['name'].'</span>
					<div class="rating">
								<div class="overlaying"></div>
								 <input type="radio" name="rating '.$counter.'" value="5" id="5"';if($roo['stars']==5){
								 	echo 'checked';
								 } echo' >
								 <label for="5">☆</label>
								 <input type="radio" name="rating '.$counter.'" value="4" id="4"';if($roo['stars']==4){
								 	echo 'checked';
								 } echo'>
								 <label for="4">☆</label>
								 <input type="radio" name="rating '.$counter.'" value="3" id="3"';if($roo['stars']==3){
								 	echo 'checked';
								 } echo'>
								 <label for="3">☆</label>
								 <input type="radio" name="rating '.$counter.'" value="2" id="2"';if($roo['stars']==2){
								 	echo 'checked';
								 } echo'>
								 <label for="2">☆</label>
								 <input type="radio" name="rating '.$counter.'" value="1" id="1"';if($roo['stars']==1){
								 	echo 'checked';
								 } echo'>
								 <label for="1">☆</label>

							</div>

						<div class="otzyv_date">
							<span class="ft-13">'.$roo['date'].'</span>
						</div>
				</div>
				<div class="otzyvy_users_right">
					<p>'.$roo['feedback'].'</p>
				</div>';
				if($roo['updated']==1){
					echo '<div class="updated">
					<i>Обновлён</i>
				</div>';
				}
				echo '

			</div>';

			}
			if($counter==0){
				echo '<p class="net_otzyvov"> У этого пользователя пока нет отзывов. Будьте первыми!</p>';
			}
 			?>

		</div>
	</div>
	<?php require "templates/footer_template.php"; ?>
	<script src="https://unpkg.com/imask"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="scripts/script.js"></script>
</body>
</html>
