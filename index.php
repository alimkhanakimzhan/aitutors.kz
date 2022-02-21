<?php 
session_start();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.1">
	
	 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="a'mean.css">
        <link rel="stylesheet" href="css/styles.css?v=1">
		<link rel="shortcut icon" href="img/logominii.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width">
	<title>AITUTORS</title>
</head>
	<?php require "templates/header_template.php"; ?>

	<body>	
		<div class="main_container">
			<h1 class="main_text">Ваш путь к знаниям
				<div class="main_subtext">
				Получайте знания от лучших студентов Astana IT University по академическим предметам в доступной форме.   
			</div>
			</h1>
			
			<div class="main_circle_image">
				
			</div>
		</div>

		<div class="wave_background">
			<div class="main_container_features">
				<div class="main_features">
					<img class="students_img" src="img/student-icon-png-23.png" alt="">
					<h3>Лучшие студенты</h3>
					<hr noshade width="75%" color="black">
					<p>Верифицированные нами студенты имеют хорошую репутацию, основывающаяся на среднем рейтинге GPA.</p>
				</div>

				<div class="main_features">
					<img class="talking_img" src="img/img_397748.png" alt="" width="130px" height="120px">
					<h3>Индивидуальность</h3>
					<hr noshade width="75%" color="black">
					<p>Каждое занятие индивидуально и индивидуально для вашей темы и вашего вопроса.</p>
				</div>

				<div class="main_features">
					<img class="books_img" src="img/130304.png" alt="">
					<h3>Вариативность предметов</h3>
					<hr noshade width="75%" color="black">
					<p>От алгебры, исчисления и статистики до веб-технологий, введение в программирование и ООП. Подготовка к локальным экзаменам.</p>
				</div>

			</div>

			<div class="how_itworks_container">
				<div class="how_itworks_left">
					<div class="how_itworks_tittle">
						Как это работает?
					</div>
					<hr class="blue_line" noshade color="#2890B9" width="80%" >
					<div class="how_itworks_subtext">
						Если вы ищете репетитора, то сперва выбираете нужный вам предмет. Затем избираете репетитора по предпочтениям: опыт, цена и язык. Посмотрите отзывы других учеников и задайте вопросы преподавателю в чате. Если вы хотите обучать, то заполняете соответствующую анкету. 
					</div>
					<div class="how_itworks_bgimage">
						<img src="img/clip-hardworking-man.png" alt="">
					</div>
				</div>

				<div class="how_itworks_right">
					<img src="img/clip-web-design.png" alt="">
					<div class="how_itworks_tittle">
						Как стать репетитором?
					</div>
					<hr class="blue_line" noshade color="#2890B9" width="80%" >
					<div class="how_itworks_subtext">
						Первым делом вы должны зарегистрироваться на нашем сайте. Заполните свой профиль репетитора: укажите какие предметы преподаете, в каком курсе обучаетесь, был ли опыт преподавания, расскажите о подходах и методиках преподавания, укажите свой график работы и цену.
					</div>
				</div>
			</div>
		</div>

		<div class="subjects">
			<div class="subjects_tittle" id="subjects">Предметы</div>
			<div class="subject_container">
				<div class="subject_container_upper_row">
					<div class="subjects_items">
						<a href="/tutors?sort=asc&sub=ict&ot=0&do=1000000&free=both" class="link_to_list">
							<img src="img/ICTLOGO.png" alt="">
						</a>
						<div class="subject_name">
							Information & Communication Technology
						</div>
					</div>

					<div class="subjects_items">
						<a href="/tutors?sort=asc&sub=java&ot=0&do=1000000&free=both" class="link_to_list">
							<img src="img/javalogo.png" alt="">
						</a>						
						<div class="subject_name">
							Object Oriented Programming Java
						</div>
					</div>

					<div class="subjects_items">
						<a href="/tutors?sort=asc&sub=c&ot=0&do=1000000&free=both" class="link_to_list">
							<img src="img/c++logo.png" alt="">
						</a>
						<div class="subject_name">
							Introduction to Programming C++
						</div>
					</div>

					<div class="subjects_items">
						<a href="/tutors?sort=asc&sub=web&ot=0&do=1000000&free=both" class="link_to_list">
							<img src="img/WEBLOGO.png" alt="">
						</a>
						<div class="subject_name">
							WEB Technologies
						</div>
					</div>


					<div class="subjects_items tems">
						<a href="/tutors?sort=asc&sub=calculus1&ot=0&do=1000000&free=both" class="link_to_list">
							<img src="img/calculus-1807147-1534185.png" alt="">
						</a>
						<div class="subject_name">
							Calculus I
						</div>
					</div>

					<div class="subjects_items tems">
						<a href="/tutors?sort=asc&sub=discrete_math&ot=0&do=1000000&free=both" class="link_to_list">
							<img src="img/depositphotos_320411290-stock-illustration-beautiful-discrete-math-glyph-vector.png" alt="">
						</a>
						<div class="subject_name">
							Discrete Mathematics
						</div>
					</div>

					<div class="subjects_items tems">
						<a href="/tutors?sort=asc&sub=linear_algebra&ot=0&do=1000000&free=both" class="link_to_list" class="link_to_list">
							<img src="img/unnamed.png" alt="">
						</a>
						<div class="subject_name">
							Linear Algebra
						</div>
					</div>

					<div class="subjects_items tems">
						<a href="/tutors?sort=asc&sub=calculus2&ot=0&do=1000000&free=both" class="link_to_list">
							<img src="img/Untitled-2.png" alt="">
						</a>
						<div class="subject_name">
							Calculus II
						</div>
					</div>
				</div>

				

				
			</div>
		</div>
		 
	<div class="last__page">
			<div class="best_tutors">
				<div class="subjects_tittle">Лучшие репетиторы</div>
				<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="single-box">
                                                <div class="img-area"><img src="Avatars/1623059488IMG_1117.JPG" alt=""></div>
                                                <div class="name">Бахытжан А.</div>
                                                <HR>
                                                <div class="spec">C++</div>
                                                <div class="line">
                                                    <img src="Golden-Star-Award.png">
                                                    5&nbsp;&nbsp;&nbsp;Отзывы учеников
                                                </div>
                                                <p>"  Благодаря Бахытжану я улучшил знания С++. Изначально у меня были проблемы с теорией и практикой, но сейчас я значительно улучшил свои навыки программирования.Рекомендую этого репетитора, кто хочет повысить свои знания в С++ и хочет самостоятельно сдать экзамен на хорошую оценку  "</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="single-box">
                                                <div class="img-area"><img src="png1.jpeg" alt=""></div>
                                                <div class="name">Айгерим О.</div>
                                                <HR>
                                                <div class="spec">Discrete Mathematics</div>
                                                <div class="line">
                                                    <img src="Golden-Star-Award.png">
                                                    5&nbsp;&nbsp;&nbsp;Отзывы учеников
                                                </div>
                                                <p>"  Участвовала в нескольких занятиях и сразу же заметила апгрейд. Благодаря Айгерим, я смогла получить 95 по финальному экзамену. Если хотите такой же балл по файналу, то только к ней!  "</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="single-box">
                                                <div class="img-area"><img src="png3.jpeg" alt=""></div>
                                                <div class="name">Даниал О.</div>
                                                <HR>
                                                <div class="spec">Calculus I, II</div>
                                                <div class="line">
                                                    <img src="Golden-Star-Award.png">
                                                    5&nbsp;&nbsp;&nbsp;Отзывы учеников
                                                </div>
                                                <p>"  УАУ, учитель просто супер, объясняет все понятным языком, интересуется каждые 2 минуты понятно ли всё. Вообщем, приятный и симпатичный учитель."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                           
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true">
                            </span>
                          </button>
                          <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" >
                            </span>
                          </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="earn_together_aitu">
				<div class="subjects_tittle">Зарабатывайте вместе с Aitutors</div>
				<div class="earn_subtext"><center><small>Перейдите на заполнение формы нажав на кнопку "Зарегистрироваться", установите свою собственную стоимость за одно занятие и получайте новых учеников </small><center></div>

				<div class="earn_together_counter">
					<div class="earn_together_counter_text">С нами более</div>


					<div class="earn_together_counter_text count">
						<?php 
						require "db.php";
						$query=$mysql->query("SELECT COUNT(`id`) FROM `users`");
						

						while($row = mysqli_fetch_assoc($query)){
    					foreach($row as $cname => $cvalue){
        				print " $cvalue\t";
    						}
   						 print "\r\n";
							}	

						 ?>
					</div>
					<div class="earn_together_counter_text">репетиторов</div>
				</div>
			<a href="signup" class="header_sign_up earn">Зарегистрироваться</a>
			</div>
			</div>
			
		<?php require "templates/footer_template.php"; ?>

		</div> 

		
	
		

		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="lightslider.js"></script> 
       
		   <script type="text/javascript" src="JQuery3.3.1.js"></script> 
		   <script type="text/javascript" src="script.js"></script>
		   <script src="scripts/script.js"></script>
        <!--lightslider.js--------------->
	</body>

</html>