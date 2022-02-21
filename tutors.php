<?php require "db.php";

		$currentdate=new DateTime();


		$userid=$_SESSION['user']['id'];
		$username=$_SESSION['user']['name'];
		$usersurname=$_SESSION['user']['surname'];


		$getid=$_GET['id'];
		$user1 = $mysql->query("SELECT*FROM `users_inf` ");

		$user_avatar1= $mysql->query("SELECT*FROM `users` ")->fetch_assoc();

		$users_subjects1=$mysql->query("SELECT*FROM `users_subjects` ")->fetch_assoc();

		$users_places1=$mysql->query("SELECT*FROM `users_places`")->fetch_assoc();

		$users_languages1=$mysql->query("SELECT*FROM `users_languages`")->fetch_assoc();

		$subject=$_GET['sub'];




		$price_ot=$_GET['ot'];
		$price_do=$_GET['do'];
		$free_lesson=$_GET['free'];
		if($_GET['sort']==''){
			$biguser=$mysql->query("SELECT * FROM `users` INNER JOIN `users_languages` ON `users`.id=`users_languages`.id INNER JOIN `users_places` ON `users`.id=`users_places`.id INNER JOIN `users_inf` ON `users`.id=`users_inf`.id INNER JOIN `users_subjects` ON `users`.id=`users_subjects`.id ORDER BY RAND ( )");
		}

		if($_GET['sort']=='asc' && $_GET['free']=='both'){

			$biguser=$mysql->query("SELECT * FROM `users` INNER JOIN `users_languages` ON `users`.id=`users_languages`.id INNER JOIN `users_places` ON `users`.id=`users_places`.id INNER JOIN `users_inf` ON `users`.id=`users_inf`.id INNER JOIN `users_subjects` ON `users`.id=`users_subjects`.id WHERE `users_inf`.price>='$price_ot' AND `users_inf`.price<='$price_do' AND `users_subjects`.$subject=1  ORDER BY `users_inf`.price ASC");
		}
		if($_GET['sort']=='asc' && $_GET['free']=='1' || $_GET['free']=='0'){

			$biguser=$mysql->query("SELECT * FROM `users` INNER JOIN `users_languages` ON `users`.id=`users_languages`.id INNER JOIN `users_places` ON `users`.id=`users_places`.id INNER JOIN `users_inf` ON `users`.id=`users_inf`.id INNER JOIN `users_subjects` ON `users`.id=`users_subjects`.id WHERE `users_inf`.price>'$price_ot' AND `users_inf`.price<'$price_do' AND `users_subjects`.$subject=1 AND `users_inf`.free_lesson='$free_lesson' ORDER BY `users_inf`.price ASC");
		}

		if($_GET['sort']=='desc' && $_GET['free']=='both'){

			$biguser=$mysql->query("SELECT * FROM `users` INNER JOIN `users_languages` ON `users`.id=`users_languages`.id INNER JOIN `users_places` ON `users`.id=`users_places`.id INNER JOIN `users_inf` ON `users`.id=`users_inf`.id INNER JOIN `users_subjects` ON `users`.id=`users_subjects`.id WHERE `users_inf`.price>'$price_ot' AND `users_inf`.price<'$price_do' AND `users_subjects`.$subject=1 ORDER BY `users_inf`.price DESC");
		}
		if($_GET['sort']=='desc' && $_GET['free']=='1' || $_GET['free']=='0'){

			$biguser=$mysql->query("SELECT * FROM `users` INNER JOIN `users_languages` ON `users`.id=`users_languages`.id INNER JOIN `users_places` ON `users`.id=`users_places`.id INNER JOIN `users_inf` ON `users`.id=`users_inf`.id INNER JOIN `users_subjects` ON `users`.id=`users_subjects`.id WHERE `users_inf`.price>'$price_ot' AND `users_inf`.price<'$price_do' AND `users_subjects`.$subject=1 AND `users_inf`.free_lesson='$free_lesson' ORDER BY `users_inf`.price DESC");
		}




		$reg_date1=date_create($user_avatar['reg_date']);
		$interval= date_diff($reg_date1,$currentdate);
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Поиск репетиторов</title>
	<link rel="stylesheet" href="css/styles.css?v=1">
	<link rel="shortcut icon" href="img/logominii.png" type="image/x-icon">
</head>
<body>

	<?php require "templates/header_template.php"; ?>

	<h1 class="tutors-finding">Поиск репетиторов</h1>
	<div class="user_container_and_filter">

			<div class="filter">
				<div class="filter_upper">
					<div class="verify_logo">
						<img src="img/1200px-Checkmark_green.svg.png" alt="">
						<span> - Проверенный репетитор</span>
					</div>
					<div class="free_logo">
						<img src="img/free.png" alt="">
						<span> - Бесплатный пробный урок</span>
					</div>
				</div>
				<form action="filter.php" class="form_df" method="POST">
				<div class="filter_lower">
					<div class="filter_lower_switches">
						<span>Предмет:</span>
						<select name="course" id="course_select" class="filter_subjects">

											<option value="ict" <?php if($_GET['sub']=="ict"){echo "selected";} ?>>ICT</option>
											<option value="web" <?php if($_GET['sub']=="web"){echo "selected";} ?>>WEB</option>

											<option value="java" <?php if($_GET['sub']=='java'){echo "selected";} ?>>JAVA</option>

											<option value="c" <?php if($_GET['sub']=='c'){echo "selected";} ?> >C++</option>

											<option value="calculus1" <?php if($_GET['sub']=='calculus1'){echo "selected";} ?>>Calculus1</option>

											<option value="calculus2" <?php if($_GET['sub']=='calculus2'){echo "selected";} ?>>Calculus2</option>

											<option value="discrete_math" <?php if($_GET['sub']=='discrete_math'){echo "selected";} ?>>Discrete Math</option>

											<option value="linear_algebra" <?php if($_GET['sub']=='linear_algebra'){echo "selected";} ?>>Linear Algebra</option>

						</select>
					</div>
						<div class="filter_lower_switches">
						<span>Цена: от </span> <input class="filter_subjects" name="price_ot" type="number" <?php if($_GET['ot']!=0){echo 'value="'.$_GET['ot'].'"';} ?>>
						</div>

						<div class="filter_lower_switches">
						<span>до </span> <input class="filter_subjects" name="price_do"  type="number" <?php if($_GET['do']!=100000 && $_GET['do']!=1000000 ){echo 'value="'.$_GET['do'].'"';} ?>>
						</div>

						<div class="filter_lower_switches">
							<span>Free Lesson:</span>
							<select name="free_lesson" id="course_select" class="filter_subjects">

												<option value="both" <?php if($_GET['free']=='both'){echo "selected";} ?> >Да/Нет</option>
												<option value="1" <?php if($_GET['free']=='1'){echo "selected";} ?>>Да</option>

												<option value="0" <?php if($_GET['free']=='0'){echo "selected";} ?>>Нет</option>

							</select>
						</div>
						<div class="filter_lower_switches">
							<span>Сортировка:</span>
							<select name="sort" id="course_select" class="filter_subjects">


												<option value="ASC" <?php if($_GET['sort']=='asc'){echo "selected";} ?>>По возрастанию цены</option>

												<option value="DESC" <?php if($_GET['sort']=='desc'){echo "selected";} ?>>По убыванию цены</option>

							</select>
						</div>
						<button type="submit" class="otzyv_send m-auto">Поиск</button>


				</div></form>

			</div>

		<div class="user_container">


			<?php

					while($row=$biguser->fetch_assoc()){
						$counter=$counter+1;
						$ids=$row['id'];
						$verifier=$mysql->query("SELECT `id` FROM `verified_users` WHERE `id`='$ids'")->fetch_assoc();
						echo '
						<div class="main_user_info mb-30">
							<div class="photo_and_name">
							<a href="/user?id='.$row['id'].'" class="photo';  if(count($verifier)!=0){
						 	echo ' verified';
						 } echo '">
							<img src="'.$row['avatar'].'" alt="">

					</a>

						<div class="FIO" style="text-align: center;">
						<span>'.$row['name'].' '.mb_substr($row['surname'],0,1).'.'.'
						 </span>';

						 if(count($verifier)!=0){
						 	echo '<img src="img/1200px-Checkmark_green.svg.png" alt="">';
						 }
						 echo '
						</div>
					</div>

				<div class="user_personal_information">
					<div class="users_subjects">

						';if($row['ict']==1){
							echo '<a href="/user?id='.$row['id'].'&sub=ICT" class="blue_squares">
							<span>ICT</span>
						</a>';
						}

						 if($row['web']==1){
						 	echo '<a href="/user?id='.$row['id'].'&sub=WEB" class="blue_squares">
							<span>WEB</span>
						</a>';

						}

						if($row['java']==1){
						echo '<a href="/user?id='.$row['id'].'&sub=JAVA" class="blue_squares">
							<span>JAVA</span>
							</a>';
						}

						if($row['c']==1){
						echo '<a href="/user?id='.$row['id'].'&sub=C" class="blue_squares">
						<span>C++</span>
						</a>';
						}

						if($row['calculus1']==1){
						echo '<a href="/user?id=<?php echo $getid ?>&sub=CALC1" class="blue_squares">
												<span>CALC1</span>
											</a>';
						}

						if($row['calculus2']==1){
						echo '<a href="/user?id='.$row['id'].'&sub=CALC2" class="blue_squares">
												<span>CALC2</span>
											</a>';
						}

						if($row['discrete_math']==1){
						echo '<a href="/user?id='.$row['id'].'&sub=DISK" class="blue_squares">
												<span>DISK</span>
											</a>';
						}

						if($row['linear_algebra']==1){
						echo '<a href="/user?idrow='.$row['id'].'&sub=LINE" class="blue_squares">
												<span>LINE</span>
											</a>';
						}

						if($row['free_lesson']==1){
							echo '<div class="free_lesson_logo">
								<img src="img/free_PNG90763.png" alt="">
							</div>';
						}
					echo '</div>
					<div class="eachfield mb-0">
						<span class="ft-15">GPA:</span> <p >'.$row['gpa'].'</p>
					</div>
						<div class="eachfield mb-0">
						<span class="ft-15">Курс:</span> <p >'.$row['course'].'</p>
					</div>
						<div class="eachfield mb-0 hidden">
						<span class="ft-15">Языки:</span> <p >';
						if($row['russian']==1){
						echo 'Русский &nbsp;&nbsp;&nbsp;';
						}
						if($row['english']==1){
						echo 'Английский &nbsp;&nbsp;&nbsp;';
						}
						if($row['kazakh']==1){
						echo 'Казахский &nbsp;&nbsp;&nbsp;';
						}
						echo '</p>
					</div>
					<p class="personal_inf mt-0">
						'.$row['personal_inf'].'
					</p>
				</div>

				<div class="user_vertical_line">

				</div>

				<div class="user_right_content tutors">
						<div class="stars_number jc-center">
							<img src="img/star_PNG41474.png" alt="">
							<span><big><b>';
								$getid1=$row['id'];
								$otzyvy_avg1=$mysql->query("SELECT*FROM `otzyvy` WHERE `tutor_id`=$getid1 " );
								$otzyvy_avg_counter=0;
								$sum=0;
								while($roo2=$otzyvy_avg1->fetch_assoc()){
									$sum=$sum+$roo2['stars'];
									$otzyvy_avg_counter=$otzyvy_avg_counter+1;
								}
								if($otzyvy_avg_counter==0){
									echo '0';}
								else {$avg=$sum/$otzyvy_avg_counter;
								echo mb_substr($avg,0,3);}
							 echo '</b></big> </span>
						</div>

						<div class="otzyvy_number jc-center">
								<span>Отзывы: ';
								$otzyvy_num=$mysql->query("SELECT*FROM `otzyvy` WHERE `tutor_id`=$getid1");
								$otzyvy_num_counter=0;
								while($roo=$otzyvy_num->fetch_assoc()){
									$otzyvy_num_counter=$otzyvy_num_counter+1;
								}
								echo $otzyvy_num_counter;
							 echo '</span>
						</div>
						<div class="tutors_price">
							<span class="tutors_price_price">'.$row['price'].'</span>
							<span class="tutors_price_hour">тг/час</span>
						</div>
						<a href="/user?id='.$row['id'].'" class="podrobnee">
						Подробнее
						</a>

					  </div>





				</div>


						';
						}
						if($counter==0){
				echo '<p class="net_otzyvov"> К сожалению, репетиторов по вашему запросу не нашлось. Попробуйте другие фильтры.</p>';
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
