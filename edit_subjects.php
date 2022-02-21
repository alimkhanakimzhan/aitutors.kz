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
						<a href="user #otzyvy_container"><span>Отзывы: <?php 
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
	<form action="change_subjects.php" method="POST" class="form_df1" enctype="multipart/form-data">
		<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['ict']==1): ?>
				<div class="subandprice">
					<div class="blue_squares mb-0">
						<span>ICT</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="ictprice" value="<?php echo $user_sub_price['ICT']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="ictinformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['ICT'] ?></textarea> 
			
		<?php endif; ?>
	<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['java']==1): ?>
				<div class="subandprice mt30">
					<div class="blue_squares mb-0">
						<span>JAVA</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="javaprice" value="<?php echo $user_sub_price['JAVA']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="javainformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['JAVA'] ?></textarea> 
			
		<?php endif; ?>
		<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['web']==1): ?>
				<div class="subandprice mt30">
					<div class="blue_squares mb-0">
						<span>WEB</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="webprice" value="<?php echo $user_sub_price['WEB']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="webinformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['WEB'] ?></textarea> 
			
		<?php endif; ?>
		<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['c']==1): ?>
				<div class="subandprice mt30">
					<div class="blue_squares mb-0">
						<span>C++</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="cppprice" value="<?php echo $user_sub_price['C++']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="cppinformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['C++'] ?></textarea> 
			
		<?php endif; ?>
		<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['calculus1']==1): ?>
				<div class="subandprice mt30">
					<div class="blue_squares mb-0">
						<span>CALC1</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="calc1price" value="<?php echo $user_sub_price['CALC1']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="calc1information" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['CALC1'] ?></textarea> 
			
		<?php endif; ?>
			<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['calculus2']==1): ?>
				<div class="subandprice mt30">
					<div class="blue_squares mb-0">
						<span>CALC2</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="calc2price" value="<?php echo $user_sub_price['CALC2']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="calc2information" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['CALC2'] ?></textarea> 
			
		<?php endif; ?>
			<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['discrete_math']==1): ?>
				<div class="subandprice mt30">
					<div class="blue_squares mb-0">
						<span>DISK</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="diskprice" value="<?php echo $user_sub_price['DISK']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="diskinformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['DISK'] ?></textarea> 
			
		<?php endif; ?>
	
			<?php 
			$user_sub_price=$mysql->query("SELECT*FROM `user_sub_price` WHERE `id`='$getid'")->fetch_assoc();
			$user_sub_inf=$mysql->query("SELECT*FROM `user_sub_inf` WHERE `id`='$getid'")->fetch_assoc();
				if($users_subjects['linear_algebra']==1): ?>
				<div class="subandprice mt30">
					<div class="blue_squares mb-0">
						<span>LINE</span>
					</div>
					<div class="sub_price">
						<input class="input__edited w-133" style="height: 27px;" type="number" name="lineprice" value="<?php echo $user_sub_price['LINE']; ?>"> - тг/час
					</div>
				</div>
					<textarea class="edit_persinformation" id="subjectinformation" name="lineinformation" placeholder="Напишите ваш опыт, методики и особенности обучения, какие результаты могут достичь ваши ученики по выбранному предмету"><?php echo $user_sub_inf['LINE'] ?></textarea> 
			
		<?php endif; ?>

		<button class="edit_button" style="margin-top: 50px;" type="submit" name="submit" onclick="">Изменить данные</button>
		<input name="id" class="hidden_input" type="text" value="<?php echo $getid; ?> ">
	</form>
	</div>


	
	


	<?php require "templates/footer_template.php"; ?>

	<script src="https://unpkg.com/imask"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="scripts/script.js"></script>
</body>
</html>