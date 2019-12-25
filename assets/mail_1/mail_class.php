<?php
	class mail{
		public $cus_id;
		public $email;
		public $subject;
		public $message;


		function send_mail($cus_id, $email, $subject, $message){
			//SMTP needs accurate times
			date_default_timezone_set('Etc/UTC');
			require 'PHPMailer/PHPMailerAutoload.php';
			require 'PHPMailer/class.smtp.php';

			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//Enable SMTP debugging
			$mail->SMTPDebug = 0;
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			//Set the hostname of the mail server
			// $mail->Host = 'smtp.gmail.com';
			$mail->Host = 'smtp.gmail.com';
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;

			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			//or more succinctly:
			$mail->Host = 'ssl://smtp.gmail.com:465';
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "kandypickrentacar@gmail.com";
			//Password to use for SMTP authentication
			$mail->Password = "kandypickrent";
			//Set who the message is to be sent from
			$mail->setFrom("ccsbioextracts@gmail.com", "PMSIC");
			//Set an alternative reply-to address
			

//$mail->addReplyTo("$c_email", "$c_name");
			
			//Set who the message is to be sent to
			$mail->addAddress("$email", "$cus_id");
			//Set the subject line
			$mail->Subject ="$subject";
			//Set the body
			$mail->Body ="$message";

			//send the message, check for errors
			// echo !extension_loaded('openssl')?"Not available":"Available";
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} 
			else {
				echo ("Done");
		
			}
		}
	}
?>