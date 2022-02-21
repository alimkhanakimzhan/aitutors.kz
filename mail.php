<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$mail->SMTPDebug = 4;

$username= $_POST['name_surname'];
$email=$_POST['email'];

$name = $_POST['name'];
$surname = $_POST['surname'];
$subject = $_POST['course'];
$days = $_POST['days'];
$time = $_POST['time'];
$phone = $_POST['phone_number'];

                                   
$mail->Host = "ssl://smtp.mail.aitutors.kz";  																							
$mail->SMTPAuth = true;           
$mail->Username = 'helper@aitutors.kz'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Astana2020*'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';

                          
$mail->Port = 465 ; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('helper@aitutors.kz'); // от кого будет уходить письмо?
$mail->addAddress($email);     // Кому будет уходить письмо 

$mail->isHTML(true);                                  

$mail->Subject = $name.' '.$surname.' желает обучаться!';
$mail->Body    =  '<div class="filter" style="overflow: hidden;
	width: 100%;
	max-width: 600px;

	padding-bottom: 20px;
    background-color: rgba(210, 210, 210, 0.3);
        border-radius: 20px;">
		<div class="filter_upper" style="display: flex;
	flex-direction: column;
	margin: 0 auto;
	width: 100%;
	height: 64px;
	background-color: rgba(40, 144, 185, 0.3);
	align-items: center;
	justify-content: center;">
		<img src="img/logoPngAitututors.png" alt="" width="175px;">

		</div>
		<div class="mailer_body" style="font-family: Segoe UI;display: flex;padding: 40px 20px;  height: 100%;
">
			<div class="mailer_content">
				<div class="mailer_title" style="font-family: Segoe UI;color: #2890B9; font-size: 35px; font-weight: 700;">
					'.$username.'
				</div>
				<div class="mailer_text" style="font-size: 25px;" >
					<span>
						Здравствуйте, ваше объявление заинтересовало <b>'.$name.' '.$surname.'</b>. Он(-а) желает проводить занятия по <b>'.$subject.'</b>. Удобные дни проведения это - <b>'.$days.'</b>, а так же в <b>'.$time.'</b>. Вы можете перезвонить ему(-ей) по номеру <b>'.$phone.'<b>
					</span>
				</div>
			</div>
		</div>
		<hr width="100%" noshade style="height: 10px; background-color: rgba(40, 144, 185, 0.3); border:none; outline: none;">
		<div class="mailer_footer" style="font-family: Segoe UI;font-size: 15px; text-align: center; padding: 0 20px;">
			<span>Если вы заняты в эти дни, то рекомендуем перезвонить и договориться на другое время.</span>
		</div>
	</div>';
$mail->AltBody = '';
echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
if(!$mail->send()) {
    echo 'Error';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location: index');
}
?>