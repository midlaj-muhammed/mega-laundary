<?php
			$username = $_SESSION['username'];
			$result = mysqli_query($main_con,"SELECT `permalink` FROM members WHERE `username` = '$username'");
			$sub_db = mysqli_fetch_array($result);
			$school_db = $sub_db['permalink'];
	

	$con=mysqli_connect($host,$user,$pass,$school_db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  header("Location: ../logout.php?unauthorized");
}



?>