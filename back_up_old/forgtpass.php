<?php
include('../Includes/config.php');
include('../Includes/db_conection.php');

if(isset($_POST['email']))
				{
			$email = $_POST['email'];		
	
		if(is_numeric($email))
					{
				$input_type = 'MOBILE_NO';	
					}			
					else
					{
				$input_type = 'EMAIL';	
					}
					

function generatePassword($length = 8) {
    $chars = 'abcdefghjkmstvwxyz0123456789';
    $count = mb_strlen($chars);
    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    return $result;
}

function send_mail_to($frm_addrs, $frm_name, $to_addrs, $to_name, $subject_POST, $msg_boady ){
$path_info = pathinfo(__FILE__);
$dir = $path_info['dirname'];
chdir($dir);

//
// subject , body
//
$emailSubject = $subject_POST;
$messageBody = $msg_boady; // replace with your own
//
// sender
//
$fromEmailAddress = $frm_addrs; // replace with your own
$fromEmailName = $frm_name; // replace with your own
$replyToEmailAddress = $frm_addrs; // replace with your own
$replyToEmailName = $frm_name; // replace with your own
//
// recipients (add more if you need)

$toEmailFull1 = $to_name . ' <'. $to_addrs .'>';

// headers input

$headers = "From: " . $fromEmailName . " <" . $fromEmailAddress . ">" . "\r\n" ;
$headers.= "Reply-To: " . $replyToEmailName . " <" . $replyToEmailAddress . ">" . "\r\n" ;

// Generate a mime boundary string
$rnd_str = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$rnd_str}x";
// Add headers for file attachment
$headers .= "MIME-Version: 1.0\n" .
 "Content-Type: multipart/mixed;\n" .
 " boundary=\"{$mime_boundary}\"";
// Add a multipart boundary above the plain message
$body = "This is a multi-part message in MIME format.\r\n\r\n" .
 "--{$mime_boundary}\r\n" .
 "Content-Type: text/html; charset=\"utf-8\"\r\n" .
 "Content-Transfer-Encoding: 7bit\r\n\r\n" .
 $messageBody . "\r\n\r\n";
 // "--{$mime_boundary}\r\n";
 "--{$mime_boundary}--\r\n";

if(mail( "$toEmailFull1" , $emailSubject, $body, $headers )){
	return true;
	} else { return false;}
	
	}				
		
		
		
		
		
		
		
		
	//-------------------customer
$stmt = sqlsrv_query( $conn, "SELECT ID, EMAIL, NAME FROM TB_CUSTOMER WHERE $input_type = '$email'");	
$rows = sqlsrv_has_rows( $stmt );
				   if ($rows === true) 	{
						
						while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
														{
										$email = $row['EMAIL'];
										$name = $row['NAME'];
														}
					if($email != '')
								{
									
		$new_pass = generatePassword(8);	
		
		 $sql =  "UPDATE TB_CUSTOMER SET  PASSWORD=(?)  WHERE $input_type = '$email';";   


            $params = array($new_pass);
         $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt ==true ){
                            
							
$message    = 'Mega Laundry, Your New Password Is: '.$new_pass; 

//	if(send_mail_to('info@megalaundryae.com', 'Laundry', $email, $name, 'Laundry :: Forget Password', $message))
	if($message != '') //for testing
									{
									$response['message'] = 'Password Changed ('.$new_pass.') And Emailed to your registered email address: '. $email;
									}
									else
									{
									$response['message'] = 'Password Changed, Please contact laundry with your mobile number !';
									}
							
							$response['status'] = 1;
							
							
                            }
                           else die( print_r( sqlsrv_errors(), true));						
								
		
								
								}
								else
								{
								//need to send sms to registered mobile number
								$response['status'] = 1;
								$response['message'] = 'Please contact laundry with your mobile number !'; 
								}
						
													
										}
									 else 	{	
									$response['status'] = 2;
									$response['message'] = 'Not a registered '.strtolower($input_type); 
											}

	
	 
	
	
				}
				else
				{
				$response['status'] = 2;
				$response['message'] = 'Post Not Found !'; 
				}



echo json_encode($response);
?>