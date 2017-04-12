<?php
include "component/config.php" ;
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	/*$subject=$_POST['subject'];*/
	$message=$_POST['msg'];
	$ref  = $_SERVER['HTTP_REFERER'];
	
	$sql="insert into `contact_us`(`name`,`email`,`message`) values ('$name','$email','$message')";
	$rs=mysql_query($sql);
	
	if($rs>0)
     {
		 echo "<script> alert('Data is successfully inserted into contact Form...') </script>"	;
		 echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
	 }
	 else
	 {
		 echo "<script> alert('Login is unsuccessful...') </script>";
		 echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
	 }
}
?>