<?php 
include "component/config.php";

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$id = $_GET['id'];
$ref  = $_SERVER['HTTP_REFERER'];

$delr = mysql_query("DELETE FROM `contact_list` WHERE `contact_id`='$id'");
		if($delr)
		{
				
				echo "<script>alert('contact has been successfully deleted...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
		else{
				echo "<script>alert('oops an error occour...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
}
?>