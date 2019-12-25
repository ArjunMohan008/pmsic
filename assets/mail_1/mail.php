<?php

//SMTP needs accurate times
date_default_timezone_set('Etc/UTC');
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.smtp.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
$mail->SMTPDebug = 1;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "upulkumara123.uk@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "abrakadabra619";
//Set who the message is to be sent from
$mail->setFrom('upulkumara123.uk@gmail.com', 'Commercial Finance');
//Set an alternative reply-to address
// $mail->addReplyTo('newpdsms@gmail.com', 'Admin');
//Set who the message is to be sent to
$mail->addAddress('upulanura31@gmail.com', 'Upul');
//Set the subject line
$mail->Subject = 'Subject of the email';
//Set the body
$mail->Body = 'Body of email';

//send the message, check for errors
echo !extension_loaded('openssl')?"Not available":"Available";
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent Successfully!";
}

?>
