<?php 
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{

$ref  = $_SERVER['HTTP_REFERER'];
$user = $_SESSION['user'];
$name  = $_POST['name'];
$compname  = $_POST['compname'];
$addr  = $_POST['addr'];
$hmph  = $_POST['hmph'];
$wrkph  = $_POST['wrkph'];
$email  = $_POST['email'];

$insr = mysql_query("INSERT INTO `contact_list` ( `contact_name`, `contact_company`, `contact_addr`, `contact_homeph`, `contact_workph`, `contact_email`, `contact_user`, `contact_regdate`) VALUES ( '$name', '$compname', '$addr', '$hmph', '$wrkph', '$email', '$user', NOW());");
		if($insr)
		{
				
				echo "<script>alert('contact has been successfully stored...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
		else{
				echo "<script>alert('oops an error occour...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
}
?>