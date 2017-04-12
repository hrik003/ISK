<?php
include "component/config.php";
session_start();
$uname = $_POST['email'];
$pass = $_POST['pass'];
function chk_auth($uname,$pass)
{
$chkstr = "SELECT COUNT(*) FROM customer_details WHERE cust_email = '$uname' AND cust_password= '$pass'";
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
	$_SESSION['cust'] = $uname;
	echo "<META http-equiv=\"refresh\" content=\"0;URL=uploaddoc.php\">";
}else
{
	echo "<script>alert('invalid username and password');</script>" ;
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";
	
}


?>