<?php 
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{

$ref  = $_SERVER['HTTP_REFERER'];
$id = $_POST['id'];
$name  = $_POST['name'];
$email  = $_POST['email'];
/*$subject  = $_POST['subject'];*/
$message  = $_POST['message'];

$modr = mysql_query("UPDATE `contact_us` SET `name`='$name',
									`email`='$email',
									`message`='$message'
									WHERE `id`='$id'");
		if($modr)
		{
				
				echo "<script>alert('Enquiry has been successfully modified...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
		else{
				echo "<script>alert('oops an error occour...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
}
?>