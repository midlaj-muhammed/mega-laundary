<?php session_start(); 

if (isset($_SERVER['QUERY_STRING']) && is_numeric($_SERVER['QUERY_STRING'])){
	$invno = $_SERVER['QUERY_STRING'];
} else {
	$invno = 0;
	}
				
$_SESSION['track_invoice_no'] = $invno;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tracking Service</title>
</head>
<body>

<?php 
if(is_numeric($invno) && $invno > 0)
	{
	echo '<script type="text/javascript">
location.replace(\'http://goo.gl/2sRdNL\');
</script>';
	}
?>

</body>
</html>