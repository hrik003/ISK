<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	$ref=  $_SERVER['HTTP_REFERER'] ;
	$cust_email = $_POST['cust_email'];
	$sh_name = $_POST['sh_name'];
	$sh_comp = $_POST['sh_comp'];
	$sh_addr = $_POST['sh_addr'];
	$sh_city = $_POST['sh_city'];
	$sh_state = $_POST['sh_state'];
	$sh_zip  = $_POST['sh_zip'];
	$qryres = mysql_query( "UPDATE `shipping_details` SET 
	`shipping_name`='$sh_name',
	`shipping_company`='$sh_comp',
	`shipping_addr`='$sh_addr',
	`shipping_city`='$sh_city',
	`shipping_state`='$sh_state',
	`shipping_zip`='$sh_zip'
	 WHERE `cust_email`='$cust_email'");
	 if($qryres)
	 {
			echo "<script>alert('Shipping details has been successfully modified...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">"; 
		
	 }else{
			echo "<script>alert('oops an error occour...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">"; 
	 }
	 
	
 } 