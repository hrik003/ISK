<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$ordid = $_POST['ordid'];
$is_delivered = $_POST['is_delivered'];
	$delid  = "DELI".strtoupper(substr(md5(date('r')).rand(),-5));
$ref  ='goodsdelivered_list.php';
$desc = $_POST['desc'];


$insertstr = "INSERT INTO `goods_delivery`(`delivery_id`, `order_id`, `goods_desc`, `is_delivered`) VALUES ('$delid','$ordid','$desc','$is_delivered')";
$insr  = mysql_query($insertstr);
if($insr)
{
	
				
		echo "<script>alert('order has been successfully registered...')</script>";
		echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
	

}
else{
echo "<script>alert('opps there is a problem try again...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
}
}
?>