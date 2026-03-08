 <?php
	if(isset($_POST))
	{
		$r=0;
		if($r==0)
		{
			$ar=array("status"=>"1","message"=>"Registered Succesfully","user_id"=>"5",
			"name"=>"Jk","lastname"=>"melethil","mobile"=>"0522435563","email"=>"jk@gmail.com","password" =>"123");
			echo json_encode($ar);
		}
		else
		{
			$ar=array("userid"=>"null");
			echo json_encode($ar);
		}
		
	}
?>