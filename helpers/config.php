<?php

// where can you find the field list data
$dataFolder = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data';

// create mail class
$mail = new PHPMailer();

$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Sender	= "Schneider Webdesign";
$mail->Username = "";
$mail->Password = "";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";

// default mail settings
$bookkeeperEmail		= 'severynr@gmail.com';
$bookkeeperName		= 'The Bookkeeper';
