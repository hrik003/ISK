<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$voiceid  = "VCE".strtoupper(substr(md5(date('r')).rand(),-5));
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$is_resolve = $_POST['is_resolve'];
$is_exist = $_POST['is_exist'];
$ref  = $_SERVER['HTTP_REFERER'];


$insertstr = "INSERT INTO `voicereply`(`voice_id`, `phone`, `is_resolved`, `voice_desc`, `reg_date`,`is_existing`) VALUES ('$voiceid', '$phone', '$is_resolve', '$desc',NOW(),'$is_exist');";
$insr  = mysql_query($insertstr);
if($insr)
{
echo "<script>alert('voice resolvation has been successfully Submitted...')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";

}
else{
echo "<script>alert('OOPs!!! There is an error occoured')</script>";
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
} 
}
?>