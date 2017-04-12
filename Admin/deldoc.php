<?php 
include "component/config.php";

session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
$doc_id = $_GET['id'];
$ref  = $_SERVER['HTTP_REFERER'];
$path = $_GET['doc_url'];
$delr = mysql_query("DELETE FROM `document_details` WHERE `doc_id`='$doc_id'");
		if($delr)
		{
				unlink($path);
				echo "<script>alert('document has been successfully deleted...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
		else{
				echo "<script>alert('oops an error occour...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		}
}
?>