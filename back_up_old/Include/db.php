<?php
//create main connection
$main_con=mysqli_connect($host,$user,$pass,$db_main);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




?>