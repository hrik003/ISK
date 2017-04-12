<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	$curr_user  = $_SESSION['user']; 
	$subj = $_POST['subj'];
	$desc = $_POST['desc'];
	$ref  = $_SERVER['HTTP_REFERER'];
	
$r  =mysql_query("INSERT INTO `noty_details` ( `subject`, `noty_desc`, `sender`, `regdate`) VALUES ( '$subj', '$desc', '$curr_user', NOW())");
	if($r)
	{
		
	echo "<script>alert('your notification has been successfully uploaded...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";	
	}else
	{
	echo "<script>alert('oops an error occour...')</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
		
	}
	
	
	
	
}
	?>