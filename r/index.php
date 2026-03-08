<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Invoice Details :: Mega Laundry</title>
</head>

<body>


<?php
	
	
	
	
	//echo '<br>';
	
	//base_convert('3fr', 36, 10);echo base_convert('3fr', 36, 10); // 12345

	
	
if(isset($_GET['i']))
{
	
	$inv = $_GET['i'];
	
	$invoice_no = base_convert($inv, 36, 10);
	
	?>
	
	
	
<iframe name="InvoiceDetails" id="InvoiceDetails"   width="100%" src="http://megalaundry.aipsoft.com/t/?i=<?=$invoice_no;?>" frameborder="0" scrolling="auto" class="frame-area">





</iframe>

	
	
	
	<?php
	
	
}
	
	
	?>


</body>

<script>
	
	var devheight = document.documentElement.clientHeight;
	var cotainer_height = devheight;
	//$(".main_container").css( "height", cotainer_height );
	
	document.getElementById("InvoiceDetails").setAttribute("height", cotainer_height);
	//document.getElementsByTagName("H1")[0].setAttribute("class", "democlass");

	
	</script>


</html>
