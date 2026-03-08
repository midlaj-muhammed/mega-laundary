<?php

require('../includes/PHPMailer/PHPMailerAutoload.php');
$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.printonuae.com"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "xelentsales@gmail.com";  // GMAIL username
$mail->Password   = "025599081";            // GMAIL password

$mail->SetFrom('accounts@printonuae.com', 'Accounts-Xelent Office Solutions');

$mail->AddReplyTo("accounts@printonuae.com","Accounts-Xelent Office Solutions");

$mail->Subject    = "Xelent Office Solution - invoice Ref:$saved_inv_id";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);
$address = getCustomerEmail($customer_id);
$mail->AddAddress($address, $customer_name);
//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  $mail_result = "Mailer Error: " . $mail->ErrorInfo;
  
} else {
	$mail_result = 'Send Success';
}