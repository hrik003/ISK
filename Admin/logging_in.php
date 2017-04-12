<?php
include "component/config.php";
session_start();
$uname = $_POST['uname'];
$pass = $_POST['pass'];
function chk_auth($uname,$pass)
{
$chkstr = "SELECT COUNT(*) FROM user_details WHERE username = '$uname' AND password= '$pass' AND role='admin'";
$chkr =  mysql_query($chkstr);
$frow = mysql_fetch_row($chkr);
$fval = $frow[0];
 if($fval > 0)
 {
	return true;
	
 }
 else
 {
	 return false;
	
 }

}
if(chk_auth($uname,$pass)){
	$_SESSION['user'] = $uname;
	$_SESSION['role'] = 'admin';
	echo "<META http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}else
{
	echo "<script>alert('invalid username and password');</script>" ;
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";
	
}


?>