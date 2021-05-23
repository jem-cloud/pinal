<?php
include('smtp/PHPMailerAutoload.php');
$html='Msg';
$alert = '';
echo smtp_mailer('jemina.cayme.sy@gmail.com','subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "jemina.cayme.sy@gmail.com";
	$mail->Password = "ics2608asdfghjkl";
	$mail->SetFrom("jemina.cayme.sy@gmail.com");
	$mail->Subject = 'New Form Submission (Contact Us)';
	$mail->Body = "<h3>First Name: $fname <br /> 
			Last Name: $lname <br />
			Phone Number: $phoneNum <br /> 
			Email: $email <br /> 
			Package: $package <br /> 
			Message: $message</h3>";
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		$alert = '<div class = "alert-error">
				<span>'.$e->getMessage().'</span>
				</div>';
	}else{
		$alert = '<div class = "alert-success">
				<span>Message sent! Thank you for contacting us.</span>
				</div>';
	}
}
?>
