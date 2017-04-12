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
$id = $_POST['id'];
$name  = $_POST['name'];
$compname  = $_POST['compname'];
$addr  = $_POST['addr'];
$hmph  = $_POST['hmph'];
$wrkph  = $_POST['wrkph'];
$email  = $_POST['email'];

$modr = mysql_query("UPDATE `contact_list` SET `contact_name`='$name',
									`contact_company`='$compname',
									`contact_addr`='$addr',
									`contact_homeph`='$hmph',
									`contact_workph`='$wrkph',
									`contact_email`='$email'
									WHERE `contact_id`='$id'");
		if($modr)
		{
				
				echo "<script>alert('contact has been successfully modified...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
		else{
				echo "<script>alert('oops an error occour...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
}
?>