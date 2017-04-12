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
$pass = $_POST['pass'];
$addr = $_POST['addr'];
$role  = $_POST['role'];
$ref  = $_SERVER['HTTP_REFERER'];


$insertstr = "INSERT INTO `user_details` (`username`, `fullname`, `aliasname`, `email`, `phone`, `password`, `address`, `role`, `prof_pic`, `reg_date`) VALUES ('$uname', '$name', '$aname', '$email', '$ph', '$pass', '$addr', '$role', '---', NOW());";
$insr  = mysql_query($insertstr);
if($insr)
{
echo "<script>alert('user has been successfully registered...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";

}
else{
echo "<script>alert('username already exist...\\n try with another...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
}
}
?>