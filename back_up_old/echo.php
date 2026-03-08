<?php



$host = 'localhost';
/*
$user = 'hakoo';
$pass = 'goldencups';
$db_main = 'xcube-pos';
*/
$user = 'magnuhia_hakoo';
$pass = 'ofni@magnus1';
$db_main = 'magnuhia_megalaundry_accounts';



$main_con=mysqli_connect($host,$user,$pass,$db_main);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//functions
function getSalesTotal($invoice_id, $main_con){
	$result = mysqli_query($main_con,"SELECT sum(price * qty) FROM `product_has_invoice` WHERE invoice_id='$invoice_id' AND `status` != '2'");
	$data = mysqli_fetch_array($result);
	$total = $data['0'];
	
	$re = mysqli_query($main_con,"SELECT `discount` FROM `invoice` WHERE id='$invoice_id'");
	$da = mysqli_fetch_array($re);
	$discount = $da['discount'];
	$grandttl = $total - $discount;
	return $grandttl;
			}
			
function Chage_date_format($date){
$date = explode ("-",$date);
$yyyy = $date[0];
$mm = $date[1];
$dd = $date[2];

return $dd.'-'.$mm.'-'.$yyyy;
	
	}
	
	

$service_status =''; $tamount = '0'; $paida = '0'; $balancea = '0'; $update= '0000-00-00'; $updtimefrmt = ''; $found = ''; $delivery_status = '';

$value = '';
$target = '';
if (isset($_GET['invoice']) && $_GET['invoice'] != ''){
	$value = $_GET['invoice']; $target = 'invoice';
	}

if (isset($_GET['mobile']) && $_GET['mobile'] != ''){
	$value = $_GET['mobile']; $target = 'mobile';
	}	


if ($value != ''){

if ($target == 'mobile') {
	if ($result = $main_con->query("SELECT * FROM  `invoice` WHERE `customer_mobile` = '$value' ORDER by id DESC LIMIT 5"))
                        { // display records if there are records to display
                                if ($result->num_rows > 0)
                                { //found 
								echo '<p align="center"><strong>Showing Recent 5 Jobs</strong></p><br />';
								while ($row = $result->fetch_object())
                                        {
$tamount = getSalesTotal($row->id, $main_con);
$paida = $row->paid_amount;

if ($row->status_remark == '') {
	if ($row->delivery_status == 5 || $row->delivery_status == 4){ $service_status = 'Process Completed !'; }
	
	 else {
		$service_status = 'Under Processing..... !';
		}
	} else {
		$service_status = $row->status_remark;
		}
if ($row->delivery_status == 3) { $service_status = 'Completed And Delivered ';}
if ($row->delivery_status == 2) {$service_status = 'Completed And Delivered ?.... !';}
			echo '
<p>
                    <span class="glyphicon glyphicon-tag"></span> Inv No: #'.$row->id.' &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-user"></span> '.ucwords($row->customer_name).' &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-calendar"></span> Date: '.Chage_date_format($row->invoice_date).' &nbsp;&nbsp;
					<span class="glyphicon glyphicon-calendar"></span> Delivery: '.Chage_date_format($row->delivery_date).' <br />
<span class="glyphicon glyphicon-tag"></span> Amount: '.number_format($tamount, 2).',&nbsp;&nbsp;&nbsp; Paid: '.number_format($paida, 2).',&nbsp;&nbsp;&nbsp; Balance: '.number_format($tamount - $paida, 2).' 
                                                       </p>
                <p><strong style="color:#900">Status : '.$service_status.'</strong><br />
                <hr />';
										}
										
								} else 	{
									//not found
									echo '<br /><p><strong style="color:#900">Mobile Number: '.$value.' is not found, Updation will take 12 hrs. Please feel to track later !</strong></p><br />';
										}
						}
						
	
	
						
						
						
						
						
						
						} else {
	
	if ($result = $main_con->query("SELECT `id` FROM  `invoice` WHERE `id` = '$value'"))
                        { // display records if there are records to display
                                if ($result->num_rows > 0)
                                { //found 
								$found = 'found';
$result = mysqli_query($main_con,"SELECT `invoice_date`, `status_remark`,`delivery_status`,`paid_amount`, `status_update_date`, `status_update_time`, `delivery_date`, `modified`, `customer_name` FROM invoice WHERE `id` = '$value'");
$data = mysqli_fetch_array($result);
$invoice_date = $data['invoice_date'];
$delivery_status =  $data['delivery_status'];
$status_remark = $data['status_remark'];
$tamount = getSalesTotal($value, $main_con);
$paida = $data['paid_amount'];
$cust_name = $data['customer_name'];
$update = $data['status_update_date'];
$updtime = $data['status_update_time'];
$del_date = $data['delivery_date'];
$delivered_date = $data['modified'];
$updtimefrmt = date("g:i a", strtotime("$updtime"));
$balancea = $tamount - $paida;
if ($status_remark == '') {
	if ($delivery_status == 5 || $delivery_status == 4){ $service_status = 'Process Completed !'; }
							 else {
		$service_status = 'Under Processing..... !';
								}
							} else 
											{
		$service_status = $status_remark;
											}
if ($delivery_status == 2){ $service_status = 'Process Completed ! & Delivered ?... !'; }
if ($delivery_status == 3) { $service_status = 'Completed And Delivered ';}								
								
									   } else
									  
	     { 
								//not found
								echo '<br /><p><strong style="color:#900">This invoice Not yet Updated.
Updation will take 12 hrs. Please feel to track later !</strong></p><br />';
								} 
								
						}
											} // if mobile traget
	
	} else {
		echo '<br /><p><strong style="color:#900">Please fill Atleast One, (Invoice Number Or Mobile Number)</strong></p><br />';
		}

if($found != ''){

echo '
<p>
                    <span class="glyphicon glyphicon-tag"></span> Inv No: #'.$value.' &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-user"></span> '.ucwords($cust_name).' &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-calendar"></span> Date: '.Chage_date_format($invoice_date).' &nbsp;&nbsp;
					<span class="glyphicon glyphicon-calendar"></span> Delivery: '.Chage_date_format($del_date).' <br />
<span class="glyphicon glyphicon-tag"></span> Amount: '.number_format($tamount, 2).',&nbsp;&nbsp;&nbsp; Paid: '.number_format($paida, 2).',&nbsp;&nbsp;&nbsp; Balance: '.number_format($tamount - $paida, 2).' 
                                                       </p>
                <p><strong style="color:#900">Status : '.$service_status.'</strong><br />
                <hr />';


}
mysqli_close($main_con);
?>