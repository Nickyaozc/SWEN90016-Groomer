<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
// $mail->Port = 465;
// $mail->SMTPSecure = 'ssl';

// or try these settings (worked on XAMPP and WAMP):
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
// $mail->SMTPDebug = 2;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
 
$mail->Username = "tomgroomer90016@gmail.com";
$mail->Password = "swen90016";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
 
$mail->From = "tomgroomer90016@gmail.com";
$mail->FromName = "Tom The Groomer";
 
$mail->addAddress("tomgroomer90016@gmail.com","Myself");
$mail->addAddress($owneremail,$ownername);
// $mail->addCC("user.3@ymail.com","User 3");
// $mail->addBCC("user.4@in.com","User 4");
 
$mail->Subject = "You have a new appointment.";
$mail->Body = "Made by ".$ownername." for ".$dogname." at ".$time." on ".$date.".";
 
if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent";