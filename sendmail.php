<?php

require_once("public/PHPMailer/class.phpmailer.php");
require_once("public/PHPMailer/class.smtp.php");


$to_name = "My Stories Are";
$to ="jebarlow@gmail.com"; 
$subject = "Mail Test at ". strftime("%T", time());
$message = "Testing Mail";
$message = wordwrap($message, 70);
$from_name = "Joseph Barlow";
$from = "jebarlow@gmail.com";

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host			="smtp.mandrillapp.com";
$mail->Port			=587;
$mail->SMTPAuth	=true;
//$mail->SMTPDebug	=2;
$mail->Username	="jebarlow@gmail.com";
$mail->Password	="re9TTWTytIh7Sp7Clt-5mg";

$mail->FromName   = $from_name;
$mail->From 		= $from;
$mail->AddAddress($to, $to_name);
$mail->Subject		= $subject;
$mail->Body			= $message;


$result = $mail->send();

echo $result ? 'Sent' : 'Error';
?>