<?php
require 'class.phpmailer.php';
require 'class.smtp.php';
if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text'])){
	$contact_name=$_POST['contact_name'];
	$contact_email=$_POST['contact_email'];
	$contact_text=$_POST['contact_text'];
	if(!empty($contact_name) && !empty($contact_text) && !empty($contact_email)){
		if(strlen($contact_name)>25 || strlen($contact_email)>50 || strlen($contact_text)){
				// $to='saloni@gmail.com';
				// $subject='Contact form';
				// $body="contact form details : ".$contact_name."\n".$contact_text;
				// $header='From : '.$contact_email;
				// if(@mail($to, $subject, $body,$header)){
				// 	echo "thank u!!!";
				// }else{
				// 	echo "error in sending email";
			 //  	}
				$subject=$contact_name;
				$body=$contact_text;
				$mail = new PHPMailer;

					$mail->isSMTP();                                   // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                            // Enable SMTP authentication
					$mail->Username = 'plantwonder0524@gmail.com';          // SMTP username
					$mail->Password = 'homeste@d'; // SMTP password
					$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                 // TCP port to connect to

					$mail->setFrom('plantwonder0524@gmail.com','PlantWonder');
				$mail->addReplyTo('plantwonder0524@gmail.com','PlantWonder');
				$mail->addAddress($contact_email);
				// add a recipient
				$mail->addCC('salonimaheshwari05@gmail.com');
				$mail->addCC('salonimaheshwari0524@gmail.com');
					$mail->isHTML(true);  // Set email format to HTML

					
					$mail->Subject = $subject;
					$mail->Body    = $body;

				$mail->SMTPOptions = array(
				    'ssl' => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
				);
					if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
					    echo 'Message has been sent';
					}

			  }
			  else{
			  	echo "excceds maxlength";
			  }
	}else{
		echo "enter all field*****" ;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="contact-us.php" method="post">
	Name:<br><input type="text" name="contact_name" maxlength="25"><br>
	Email:<br><input type="text" name="contact_email" maxlength="50"><br>
	Message<br><input type="text" name="contact_text" maxlength="1000"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>