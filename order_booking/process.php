<?php
	if($_POST['mobile'])
	{
		$ar=array("message"=>"18114095, Please Contact Mega Laundry");
		echo json_encode($ar);
	}
	else
	{
		$ar=array("userid"=>"null");
		echo json_encode($ar);
	}
?>