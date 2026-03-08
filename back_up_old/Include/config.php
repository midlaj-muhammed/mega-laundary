<?php
//$host = 'localhost';


$host = 'aipsoft.com';

 
// domain
$config['site_name'] = "ELBON HK Ltd";
$config['site_url'] = "http://accounts.megalaundryae.com/";
$config['site_login'] = "http://accounts.megalaundryae.com/";
$config['noreply_email_address'] = 'noreplay@megalaundryae.com'; 
 
 

  
$user = 'abcd';
//$user = 'root';
//$pass = 'root';
$pass = 'Goldencu@#90'; //Goldencu@#90
$db_main = 'megalaundry_accounts';
//$db_main = 'just_right_laundry';
//$db_main = 'sms_cust';  
//$db_main = 'magnus_rms'; 
//$db_main = 'magnusworld'; 
// domain
$config['site_name'] = "Magnus";
$config['site_url'] = "http://localhost/";
$config['site_login'] = "http://localhost/";
$config['noreply_email_address'] = 'noreplay@MagnusLaundro.in';  
  
$config['servicetype'] = 1; // tailor
//$config['servicetype'] = 2; // laptopmobile
//$config['servicetype'] = 3; // restaurant
  
     

//create main connection
$main_con=mysqli_connect($host,$user,$pass,$db_main);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$config['salt'] = 'jK7d?3';
$config['session_timeout'] = 86400; // seconds

$config['taxable'] = false;


$redirect = '';
$http_host = $_SERVER['HTTP_HOST'];

$from_android_upd = '';
$post_from = 'PC';
$start_db = '';
/*order statuss
3 = Pending Order
1 = Processing Order
4 = Completed orders
5 = Returned Orders
2 = Cancelled Orders       
*/
$printer_name = 'RECEIPT';
$system_name = gethostname();

define("GOOGLE_API_KEY", "AIzaSyD9Aili3hc9w2lzStgHXGi4kF2ikLCI5n8"); 





 function send_push_notification($registatoin_ids, $message, $order_no) {
         
		 $registatoin_ids = array($registatoin_ids);
		 
		 $msg = array
	('message' 	=> $message, 'so_order' => $order_no);

        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $msg,
        );
 
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        //print_r($headers);
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        return $result;
    }


function send_sms_message($user, $password, $mobilenumbers, $message, $senderid)
		{
 $messagetype="N"; //Type Of Your Message 
 $url="http://itsmagnus.w2wts.com/API_SendSMS.aspx";
 //domain name: Domain name Replace With Your Domain  
 $message = urlencode($message);
 $ch = curl_init(); 
 if (!$ch){die("Couldn't initialize a cURL handle");}
 $ret = curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt ($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);          
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
 curl_setopt ($ch, CURLOPT_POSTFIELDS, 
"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype");
 $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");



 $curlresponse = curl_exec($ch); // execute
if(curl_errno($ch))
	echo 'curl error : '. curl_error($ch);

 if (empty($ret)) {
    // some kind of an error happened
    die(curl_error($ch));
    curl_close($ch); // close cURL handler
 } else {
    $info = curl_getinfo($ch);
    curl_close($ch); // close cURL handler
    //echo "<br>";
	return $curlresponse;    //echo "Message Sent Succesfully" ;
   
 }	
		}




date_default_timezone_set("Asia/Dubai");
$today_date = date('Y-m-d');
$current_time = date('H:i:s');
$now_datetime = date("Y-m-d H:i:s");


$sms_username = 'mega'; 
$sms_password = 'mega9158';


function generateSessionid($length = 35) 				{
    $chars = 'abcdefghijklmnopqrstuvwx0123456789yzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $count = mb_strlen($chars);
    for ($i = 0, $result = ''; $i < $length; $i++) 	{
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
   													}
    return $result;
															}
															
															
if(isset($_COOKIE['sesionid']) && strlen($_COOKIE['sesionid']) == 35) 	{
	
    				$session_id = $_COOKIE['sesionid'];
	
if ($result = $main_con->query("SELECT `id`, `user_id` FROM `web_sessions` WHERE `session_id` = '$session_id' AND `status` = '3'"))
                        { // display records if there are records to display
                                if ($result->num_rows != 0)
                                {
		while ($row = $result->fetch_object()) 	{ 
				if($row->user_id != '' && $row->user_id != '0'){ 
					if(!isset($_GET['error'])){	$_SESSION['user_id'] = $row->user_id; }
						 										} 
												}					
								}
									else
									{
		$session_id = generateSessionid();
		setcookie('sesionid', $session_id, time() + (86400 * 7), "/"); // 86400 = 1 day
									}
						}
						
				
					
					
					
																		} else {
																			
	$session_id = generateSessionid();
 setcookie('sesionid', $session_id, time() + (86400 * 7), "/"); // 86400 = 1 day
   
   																			}		








//client ip address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
 $client_ip = $ip;
 
 $acstartyear = '2012-01-01';

$permissions = array ('admin','official','cash','account','waiter', 'other');
$position['admin'] = 8;
$position['official'] = 6;
$position['teacher'] = 7;
$position['staff'] = 5;
$position['parent'] = 4;
$position['student'] = 3;
$position['tech'] = 9;

$gtpg ='';

//head types
$account['customer'] = 3;
$account['vendor'] = 4;
$account['members'] = 2;
$account['deauflt_bank_id'] = 2;

$account['liyablilty'] = 6;
$account['Assets'] = 7;
$account['TradingAsset'] = 71;
$account['Income'] = 8;
$account['TradingIncome'] = 81;
$account['Expence'] = 9;
$account['TradingExpence'] = 91;

$account['Miscellaneous'] = 10;

$account['purchase_balance_id'] = 3;
$account['sales_balance_id'] = 6;

$account['sales_courior'] = 8;
$account['purchase_freight'] = 4;

$account['franchise_income'] = 12;
$account['stock'] = 12; 
$account['sales_discount'] = 13;

//trans types
	$trans_type['Franchise_package_add'] = 'Fa';
	$trans_type['franch_emi_recpt_pay'] = 'Fr';
	
	$trans_type['Receipt'] = 'R';
	$trans_type['voucher'] = 'W';
	$trans_type['payment_sup'] = 'V';
	$trans_type['receipt_cust'] = 'R';
	$trans_type['sale'] = 'S';
	$trans_type['service'] = 'Sv';
	$trans_type['transaction'] = 'T';
	$trans_type['rev_transaction'] = 'Tr';
	$trans_type['purchase'] = 'Pur';
	$trans_type['purchase_exp'] = 'Pe';
	$trans_type['stock_purchase'] = 'Sp';
	$trans_type['stock_sale'] = 'Ss';
	$trans_type['discount_sale'] = 'Ds';
	
//contact informations
$contact['sales'] = '+91 8593 959 444';
$contact['support'] = '+91 9645 601 444';
$contact['billing'] = '+91 9747 484 445';


$main_con = mysqli_connect($host,$user,$pass,$db_main);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



function checking_login_try($source, $input, $main_con, $ip_address) {
	// checking if enter input email
		if(filter_var($input, FILTER_VALIDATE_EMAIL)) {
					$to_db = 'email'; 
				} else {
					$to_db = 'username'; 
					}
	 //insert login try details to school diary
	 $today_date = date('Y-m-d');
$current_time = date('H:i:s');
$sql="INSERT INTO `login_logs` (`id`, `source`, `memb_input_user`, `ip_address`, `date`, `time`, `login_success`) VALUES (NULL, '$source', '$input', '$ip_address', '$today_date', '$current_time', '2');";
if (!mysqli_query($main_con,$sql)) {
die('Error: ' . mysqli_error($main_con)); }
	
	if ($result = $main_con->query("SELECT `id` FROM `members` WHERE  `$to_db` = '$input'"))
                        { // display records if there are records to display
                                if ($result->num_rows != 0)
                                {  
									//username or email found then cheking how many times to trying to login
			$data = mysqli_query($main_con,"SELECT `login_try` FROM `members` WHERE `$to_db` = '$input';");
			$data_db = mysqli_fetch_array($data);
			$login_try = $data_db['login_try'];
		
			  				
					$sql="UPDATE  `members` SET  `login_try` = `login_try`+1  WHERE  `$to_db` ='$input';";
					if (!mysqli_query($main_con,$sql)) {
  					die('Error: ' . mysqli_error($main_con)); 	}									
					
					
					 if ($login_try > 4) { 				
					
					$login_try = $login_try+1;
					
					if ($login_try > 10) {  
					$sql="UPDATE  `members` SET  `user_status` = '2'  WHERE  `$to_db` ='$input';";
					if (mysqli_query($main_con,$sql)) {
											return 'Disabled the user';
  					 } die('Error: ' . mysqli_error($main_con));
					
					 } else {
														
					return '<br />You attempt '.$login_try.' times to login with wrong passowrd !<br />More than 10 attempt will disable the user'; }
					 
					 
	
	
						}   }  }  }
						
function login_try_blocking_ips($input, $ip_address, $main_con){
	$today_date = date('Y-m-d');
	//checking above 50 times to login with same ip and wrong password
if ($result = $main_con->query("SELECT `id` FROM  `blocked_ips` WHERE `ip_address` = '$ip_address'"))
                        { // display records if there are records to display
                                if ($result->num_rows == 0)
                                {  
								
if ($result = $main_con->query("SELECT `id` FROM  `login_logs` WHERE `ip_address` = '$ip_address' AND `date` = '$today_date' AND `login_success` = '2'"))
                        { // display records if there are records to display
                                if ($result->num_rows > 100)
                                {  
			
$sql="INSERT INTO `blocked_ips` (`id`, `ip_address`, `user_iput`) VALUES (NULL, '$ip_address', '$input');";
if (!mysqli_query($main_con,$sql)) {
die('Error: ' . mysqli_error($main_con)); }
			return 'block_ip';
								 } return 'true_ip'; }
																
								} else {
								return 'block_ip';								
									}}

	} 
					//login details save function	
function success_login_save_to_db($source, $input, $main_con, $ip_address, $to_db)
									{
$today_date = date('Y-m-d');
$current_time = date('H:i:s');

$sql="UPDATE  `members` SET  `last_login_success_date` = '$today_date', `last_login_success_time` = '$current_time'  WHERE  `$to_db` ='$input';";
if (!mysqli_query($main_con,$sql)) {
die('Error: ' . mysqli_error($main_con)); }

$sql="INSERT INTO `login_logs` (`id`, `source`, `memb_input_user`, `ip_address`, `date`, `time`, `login_success`) VALUES (NULL, '$source', '$input', '$ip_address', '$today_date', '$current_time', '1');";
if (!mysqli_query($main_con,$sql)) {
die('Error: ' . mysqli_error($main_con)); }
				//clear login trys
					$sql="UPDATE  `members` SET  `login_try` = '0'  WHERE  `$to_db` ='$input';";
					if (!mysqli_query($main_con,$sql)) {
  					die('Error: ' . mysqli_error($main_con)); 	}	
							
									}




?>