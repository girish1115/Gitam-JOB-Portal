<?php
//send_mail.php

if(isset($_POST['email_data']))
{

	require 'mail/class.phpmailer.php';
	$output = '';
	$em = $_POST['email_data'][0]['email'];
	$nam = $_POST['email_data'][0]['name'];
	//foreach($_POST['email_data'] as $row)	{
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '587';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'batchfourteenb5@gmail.com';					//Sets SMTP username
		$mail->Password = 'AsDf@1234';					//Sets SMTP password
		$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'batchfourteenb5@gmail.com';			//Sets the From email address for the message
		$mail->FromName = 'Training and Placement';					//Sets the From name of the message
		$mail->AddAddress($em, $nam);	//Adds a "To" address
		$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = 'Interview Selection'; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '<h2>Hello '.$nam.'</h2><br/><p>You have been selected for interview process. We will contact you soon</p><br>';

		$mail->AltBody = '';

		$result = $mail->Send();						//Send an Email. Return true on success or false on error
//$result+' '+print_r($_POST['email_data']);
		

	//}
	if($result)
	{
		echo 'ok';
	}
	else
	{
		echo $output;
	}
}

?>