<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$varify_id  =$_GET['varify_id'];;
$ordid = $_POST['ordid'];
/*$custmail = $_POST['custmail'];
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
$rate = $_POST['rateval'];*/
$feedback  =  $_POST['feedback'];

$ref  ='verify_details.php?orderid='.$ordid.'';


$insertstr = "update `order_varification` set `feedback`='$feedback' where `order_id`='$ordid' and `varify_id`='$varify_id'";
$insr  = mysql_query($insertstr);
if($insr)
{
echo "<script>alert('order has been successfully edited...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";	
}
else{
echo "<script>alert('opps there is a problem try again...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
}
}
?>