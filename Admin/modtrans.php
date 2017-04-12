<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$paystat = $_POST['paystat'];
$trans_feed =$_POST['trans_feed'];
$order_id = $_POST['order_id'];

$ref  = $_SERVER['HTTP_REFERER'];


$modstr = "UPDATE `order_details` SET `transaction_status`='$paystat' , `trans_feedback`='$trans_feed' WHERE `order_id`='$order_id'";
$modr  = mysql_query($modstr);
		if($modr)
		{
				echo "<script>alert('status has been successfully modified...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
		else{
				echo "<script>alert('opps error occoured...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
}
?>