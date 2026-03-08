<?php
$user_inpt = '';
if(isset($_POST['email']) && $_POST['email'] != '')
			{
		$user_inpt = 	$_POST['email'];
			}

?>
<!DOCTYPE HTML>
<html>
<head>
     <title>Mega Laundry ios App Coming soon</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300' rel='stylesheet' type='text/css'>
	</head>
    <style>
    #msg{color:#FFF; }
    </style>
	<body>
	<div class="content">
			<div class="wrap">
				<div class="content-grid">
			<p><img src="images/top.png" title=""></p>
				</div>
				<div class="grid">
		<p><img src="images/coming.png" title=""></p>
		<h3>We are Still Working on it.</h3>
		<p id="msg"><?php if (isset($_GET['msg'])) { echo $_GET['msg']; } ?></p>
		<form action="" method="post">
									<input type="text" size="30" placeholder="Your Email/Mobile and Get Notified..." value="<?php echo $user_inpt; ?>" name="email" id="email">
									<a href="#"><button class="btn span btn-4 btn-4a icon-arrow-right"><span></span></button></a>
					           
									<div id="response"></div>
									
								</form>
								<div class="clear"></div>
								</div>
		<div class="clear"></div>
		<div class="footer">
			<p class="a"><a href="#"><img src="images/facebook.png" title=""></a><a href="#"><img src="images\twitter.png" title=""></a></p>
		</div>
		<div class="clear"></div>
		</div>
		</div>
		<div class="clear"></div>

<?php




if(isset($_POST['email']) && $_POST['email'] != '')
			{
		$error = '';		
		$user_inpt = $_POST['email'];
		
		if(is_numeric($user_inpt))
				{
			if(strlen($user_inpt) < 9)
						{
					$error = 'Mobile Number Is Not Valid !';	
						}
				}
				else
				{
					
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
								{
						$error = 'Not a valid Email  !';			
								}
				}



if($error == '')
	{
$host = 'localhost';
$user = 'magnuhia_hakoo';
$pass = 'ofni@magnus1';
$db_main = 'magnuhia_megalaundry_webuseriphone';

$main_con=mysqli_connect($host,$user,$pass,$db_main);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
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
 


$sql = "INSERT INTO `notifie_web_users` (`id`, `user`, `create_date`, `ip`, `status`) VALUES (NULL, '$user_inpt', CURRENT_TIMESTAMP, '$client_ip', NULL);";	


if ($main_con->multi_query($sql) == true)
		 				{
			echo '<script> location.replace("?msg='.$user_inpt.' Successfully Registered With Us !, Thank You"); </script>';	
			
						}
	
	
	}
	
	else
	{
echo '<script> document.getElementById("msg").innerHTML="'.$error.'"; </script>';	
	}
			
			}





?>

</body>
</html>
