<?php 
include "component/config.php";

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$user = $_GET['user'];
$ref  = $_SERVER['HTTP_REFERER'];
$delr = mysql_query("DELETE FROM `user_details` WHERE username='$user'");
if($delr)
{
echo "<script>alert('user has been successfully deleted...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=user_master.php\">";
}
else{
echo "<script>alert('oops an error occour...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=user_master.php\">";
}
}
?>