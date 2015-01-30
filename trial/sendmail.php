<?php

require_once("../public/phpMailer/class.phpmailer.php");
require_once("../public/phpMailer/class.smtp.php");


$to_name = "Junk Mail";
$to ="jebarlow@gmail.com"; 
$subject = "Mail Test at". strftime("%T", time());
$message = "This is a test";
$message = wordwrap($message, 70);
$from_name = "Joseph Barlow";
$from = "jearlow@ymail.com";

$mail = new PHPMail();


$mail->FromName   = $from_name;
$mail->From 		= $from;
$mail->AddAddress($to, $to_name);
$mail->Subject		= $subject;
$mail->Body			= $message;


$result = $mail->send();

echo $result ? 'Sent' : 'Error';
?>