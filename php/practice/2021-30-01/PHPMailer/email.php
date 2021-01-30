<?php
require 'class.phpmailer.php';
require 'class.smtp.php';

$subject='This is email';
$body='This is test email';
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
$mail->addAddress('plantwonder0524@gmail.com');
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

?>