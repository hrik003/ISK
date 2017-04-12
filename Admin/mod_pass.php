<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$uname = $_SESSION['user'];
$chkpass = $_POST['chkpass'];
$curr_pass= $_POST['curr_pass'];
$pass= $_POST['pass'];
$conpass = $_POST['con_pass'];

$ref  = $_SERVER['HTTP_REFERER'];
	if($conpass == $pass )
	{
		
		if($chkpass == $curr_pass)
		{
			
			$modstr = "UPDATE `user_details` SET 	`password` = '$pass'
													 WHERE `username`='$uname'";
			$modr  = mysql_query($modstr);
			if($modr)
			{
			echo "<script>alert('password has been successfully modified...')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
			}
			else{
			echo "<script>alert('opps error occoured...')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
			}
		}
		else
		{
			echo "<script>alert('invalid password')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
	}
	else
	{
		echo "<script>alert('confirm the password')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
	}
}
?>