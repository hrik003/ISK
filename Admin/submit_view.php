<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$ordid = $_POST['orderid'];
$custmail = $_POST['custmail'];
$viewstr = $_POST['viewstr'];
$reason = $_POST['reason'];

$ref  ='view_list.php';


$insertstr = "INSERT INTO `cust_view`( `cust_email`, `viewstr`, `reason`, `order_id`, `regdate`) VALUES ('$custmail','$viewstr', '$reason' , '$ordid' ,CURRENT_DATE());";
$insr  = mysql_query($insertstr);
if($insr)
{
	
				
		echo "<script>alert('order view has been successfully submitted...')</script>";
		echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
	
	

}
else{
echo "<script>alert('opps there is a problem try again...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
}
}
?>