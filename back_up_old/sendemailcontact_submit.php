<?php
$error_report = '';

date_default_timezone_set("Asia/Dubai");
$today_date = date('Y-m-d');
$current_time = date('H:i:s');

//client ip address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
 $client_ip = $ip;

if (isset($_POST['name']) && $_POST['name'] != '' ){
	$name = htmlentities($_POST['name'], ENT_QUOTES); 
	} else { $error_report .= 'Name, ';}
	
if (isset($_POST['email']) && $_POST['email'] != '' ){
	$email = htmlentities($_POST['email'], ENT_QUOTES);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){$error_report .= 'Invalid Email, ';}
	} else { $error_report .= 'Email, ';}
	
if (isset($_POST['subject']) && $_POST['subject'] != '' ){
	$subject = htmlentities($_POST['subject'], ENT_QUOTES);
	} else { $error_report .= 'Subject, ';}
	
if (isset($_POST['message']) && $_POST['message'] != '' ){
	$message = htmlentities($_POST['message'], ENT_QUOTES); 
	} else { $error_report .= 'Message, ';}


if ($error_report == ''){
	$message_email = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<h1>Email From WebSite Contact Page</h1>
<p>&nbsp;Hi</p>
<p>Contact Name: '.$name.'</p>
<p>Subject: '.$subject.'</p>
<p>Message:'.$message.'</p>
<p>Date: '.$today_date.'</p>
<p>Time: '.$current_time.'</p>
<p>Ip Address: '.$client_ip.'</p>
<p>From <a href="http://megalaundryae.com#megalaundry_contact">www.megalaundryae.com</a></p>
</body>
</html>';
	
	$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
$headers .= "CC: admin@megalaundryae.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	if (mail('info@megalaundryae.com',$subject, $message_email, $headers)){
		echo '<p><strong>Email Sended Successfully</strong><br />Thank you for contacting US.</p><br />';
		} else { echo '<p >Email Not Sended, Please Contact : 02- 55 611 75</p><br />';}
		
						} else {
		echo '<p >Please Fill '.$error_report.'</p><br />';
								}

?>