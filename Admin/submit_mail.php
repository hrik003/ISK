<?php
$to=$_POST['to'];
$sub=$_POST['sub'];
$msg = $_POST['msg'];


$headers = "From: no-reply@flydigital.us \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message .= $msg;
$message .= '</body></html>';
$ref = $_SERVER['HTTP_REFERER'];

if(mail($to, $sub, $message, $headers))
{
		echo "<script>alert('mail has been sent')</script>";

	echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";	
}
else
{
	echo "<script>alert('OOPs! An error occour')</script>";
	echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";	
	
}




?>