<?php 
echo '
<div class="bloak" id="bloak">
<header id="header__">
		<div class="header_content">
			
			<div class="header_logo obwii">
				<a href="index" class="header_logo hidden" >
					<img src="img/logoPngAitututors.png" alt="" width="198px" height="38px">
				</a>
				<a href="index" class="header_logo px700" id="index_logo" >
					<img src="img/Logo_astana_it_university.png" alt="">
				</a>
			</div>

			<div class="header_nav">
				<div class="header_left">
					<a href="aboutus" class="header_navs">О нас</a>
					<a href="howtobecomeatutor" class="header_navs">Стать репетитором</a>
					<a href="index#subjects" class="header_navs">Предметы</a>
					
				</div>
				<a href="tutors" class="header_navs">Репетиторы</a>
				<div class="vertical_blue_line">
					
				</div>';
				
				if(!$_SESSION['user'] && !$_SESSION['feedbacker']){
				 echo '<div class="header_sign_in_up">
					<a href="signin" class="header_sign_in">Вход</a>
					<a href="signup" class="header_sign_up">Регистрация</a>
				</div>';
				}
		
			if($_SESSION['user']){
			echo '	<div class="avatarka" id="avatarka" style="display: flex;" onclick="collapse() ">
								<img src="'.$_SESSION['user']['avatar'].'" alt="">
							</div>
			
							<div class="avac_clon">
								<div  id="avac">
									<a href="user">
										<div class="burger_nav_element">
											Профиль
										</div>
									</a>
									<a href="edit">
										<div class="burger_nav_element">
											Изменить данные
										</div>
									</a>
									<a href="exit.php">
										<div class="burger_nav_element bb0">
											Выход
										</div>
									</a>
								</div>
							</div>';
				}
				
				if($_SESSION['feedbacker']){
					echo '<b>'.$_SESSION['feedbacker']['name'].'</b>
										<a href="exit" style="margin-left: 10px; color: #2890B9;">Выход</a>';
				}
				echo '</div>

				<div class="header_burger">
					<div class="burger" id="burger" onclick="burgerButton();">
						<div class="burger_lines" id="left_x"></div>
						<div class="burger_lines" id="no_x"></div>
						<div class="burger_lines" id="right_x"></div>
					</div>

					<div class="burger_container" style="opacity: 0;" id="burger_container" >';
						if(!$_SESSION['user'] && !$_SESSION['feedbacker']){
						echo '<div class="header_sign_in_up">
							<a href="signin" class="header_sign_in">Вход</a>
							<a href="signup" class="header_sign_up">Регистрация</a>
						</div>'; }
						
						if($_SESSION['user']){echo '
				<div class="avatarka" id="avatarka" style="overflow: hidden;" onclick="collapse() ">
					<div class="avatarka1 "><img src="'.$_SESSION['user']['avatar'].'" alt=""></div>
					<div class="collapse_ava">
						<a href="user">
							<div class="burger_nav_element bt">
								Профиль
							</div>
						</a>
						<a href="edit">
							<div class="burger_nav_element ">
								Изменить данные
							</div>
						</a>
						<a href="exit.php">
							<div class="burger_nav_element bb0 ">
								Выход
							</div>
						</a>
					</div>
				</div>';
				}
				
				if($_SESSION['feedbacker']){
					echo '<b id="feedbacker_name">'.$_SESSION['feedbacker']['name'].'</b>
					<a href="exit" class="burger_nav_element btbb0" >Выход</a>';
				}
						echo '<div class="burger_navs">
							<a href="index" class="burger_nav_element bt">Главная</a>
							<a href="tutors" class="burger_nav_element">Репетиторы</a>
							<a href="index#subjects" class="burger_nav_element">Предметы</a>	
							<a href="howtobecomeatutor" class="burger_nav_element">Стать репетитором</a>
							<a href="aboutus" class="burger_nav_element">О нас</a>
						</div>
						
				
					

					</div>
					
					
				</div>
		</div>
	</header>
	</div>
	<div class="height80px"> 
	</div>
'; ?>
