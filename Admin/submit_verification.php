<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$ordid = $_POST['ordid'];
$custmail = $_POST['custmail'];
$custname = $_POST['custname'];
$amnt = $_POST['amnt'];
$agntname = $_POST['agntname'];
$planyr = $_POST['planyr'];
$paymode = $_POST['paymode'];
$apmnt_datetime = $_POST['apmnt_datetime'];
$timezone = $_POST['timezone'];
$prnscnrqst = $_POST['prnscnrqst'];
$cold = $_POST['cold'] ;
$popup= $_POST['popup'] ;
$fcquit  = $_POST['fcquit'] ;
$checkverify= $_POST['checkverify'] ;
$phno =  $_POST['main_number'];
$altno =  $_POST['alt_number'];
$email =  $_POST['email'];
$charging =  $_POST['charging'];
$rate = $_POST['rateval'];
$feedback  =  $_POST['feedback'];

$ref  ='varification_list.php';


$insertstr = "INSERT INTO `order_varification`( `cust_name`, `cust_email`, `order_id`, `agentname`, `amount`, `plan_yr`, `payment_process`, `appmt_datetime`, `appmt_timezone`, `printer_rqst`, `coldcalling`, `popup`, `forcequit`,`feedback`,`regdate`,`checkverification`, `ph_no`, `alt_no`, `email`, `charging`, `rate`) VALUES ('$custname', '$custmail', '$ordid', '$agntname', '$amnt', '$planyr', '$paymode', '$apmnt_datetime', '$timezone', '$prnscnrqst', '$cold', '$popup', '$fcquit','$feedback',CURRENT_DATE(),'$checkverify','$phno','$altno','$email','$charging','$rate');";
$insr  = mysql_query($insertstr);
if($insr)
{
	$updvar = mysql_query("UPDATE `order_details` SET `is_varified`='1' WHERE `order_id`='$ordid'");
	if($updvar){
				
		echo "<script>alert('order has been successfully verified...')</script>";
		echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
	}
	else
	{
	echo "<script>alert('opps there is a problem try again later...')</script>";
	echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";	
	}

}
else{
echo "<script>alert('opps there is a problem try again...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
}
}
?>