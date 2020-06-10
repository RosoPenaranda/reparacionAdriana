<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

//Create a new PHPMailer instance
$mail = new PHPMailer(TRUE);

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_OFF;

//Set the hostname of the mail server
$mail->Host = 'relay-hosting.secureserver.net';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 25;

//Whether to use SMTP authentication
$mail->SMTPAuth = false;

//Set who the message is to be sent from
$mail->setFrom('mail@gglobalservice.com', 'Global Services C.A.');

//Set who the message is to be sent to
$mail->addAddress('face2462@gmail.com', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
$mail->msgHTML('Holaaaaa ....');

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'OK';
}