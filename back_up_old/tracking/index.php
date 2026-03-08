<?php session_start();

if(isset($_GET['inv']))
			{
		$inv_no = $_GET['inv'];	
			}
			else if(isset($_SESSION['track_invoice_no']))
			{
				$inv_no = $_SESSION['track_invoice_no'];	
			}
			else
			{
				$inv_no = 0;
			}

?>




<!DOCTYPE HTML>
<html>
<head>
<title>Mega Laundry Servie Tracker :: Powered By www.itsmagnus.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mega Laundry Khalifa City Service Tracker" />
<meta name="keywords" content="Mega Laundry Abu Dhabi Service Tracker" />
<meta name="keywords" content="Mega Laundry Service Tracker" />
<meta name="keywords" content="MegaLaundry Service Tracker" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(
hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="jquery.tools.min.js"></script>

<script type="text/javascript" src="jquery-ui.min.js"></script>

<script>

function get_inv_details(inv_no)
				{
	
		 document.getElementById('container_qr_code').innerHTML = '<img src="loaderA64.gif">';
	
	$.post("https://megalaundry.aipsoft.com/qr_code_track.php", {track_invoice_no:inv_no },
			   function(data) {
				  
				  document.getElementById('container_qr_code').innerHTML = data;
			
					   });				
				}

</script>


</head>
<body>
<!----- start-header---->
 <!----start-header---->
  <div class="header_bg" id="home">
	<div class="container">
		<div class="head-para">
<br>
			<img src="images/track_mobweb_logo.png">
			<p style="color:#21A957; font-weight:bold">Welcome to Mega Laundry Service Tracker</p>
		</div>
	</div>
</div>
  	<!----//End-header---->
  	 <div class="header">
	     <div class="wrap"></div>
	  </div>
	 <!---//End-services----->
	   <div id="services" class="services">
       		<div class="container">
       		  
              
            <div id="container_qr_code">  
             
             <!-- contianter qr -->
             
             
              
                            <div class="gallery-head text-center">            
			<p>Please Enter Your Invoice No:<br>
<form><input type="text" name="inv" style="height:30px;" /><input type="submit" value="Get" style="height:34px;"  /></form></p>
                    
                    </div>
            



 
    
    
             <!-- contianter qr -->
    
					</div>
                    
                        <p>--------------------------------</p>
       					<h3>QR Code Service Tracker</h3>
       					<p>Powered By <a href="http://magnusworld.ae/" style="color:#0000E5">MAGNUS</a></p>
       				
       			</div>
       		</div>
       	</div>
	 <!---//End-services----->
	  <!--- portfolio ---->
			<div id="portfolio" class="portfolio"><!--- Portfolio ---></div>

<!---- start-portfolio-script----->
					
					<!---team---><!----//End-team-members----> 
				<!---Contact---><!---//Contact--->
				<div class="footer"></div>
         <?php 
		 
		 if(is_numeric($inv_no) && $inv_no > 0)
			{
			
	echo '<script>
	get_inv_details(\''.$inv_no.'\');
	</script>';			
				
			}
		 
		 
		 ?>       
                
                
				
</body>
</html>