<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$uname = $_POST['uname'];
$name = $_POST['name'];
$aname = $_POST['aname'];
$email = $_POST['email'];
$ph = $_POST['ph'];
$addr = $_POST['addr'];

$ref  = $_SERVER['HTTP_REFERER'];


$modstr = "UPDATE `user_details` SET `fullname`= '$name',
										`aliasname`= '$aname',
										`email`= '$email', 
										`phone`= '$ph',
										`address`='$addr'
										 WHERE `username`='$uname'";
$modr  = mysql_query($modstr);
if($modr)
{
echo "<script>alert('user has been successfully modified...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
}
else{
echo "<script>alert('opps error occoured...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
}
}
?>