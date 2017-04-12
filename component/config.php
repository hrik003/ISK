<?php 
/*$server = "103.21.58.6";
$username ="eitadmin";
$password = "Locked321@";
$db_name =  "crm_db_eit";
$server = "localhost";
$username ="wizkraft";
$password = "wizkraft";
$db_name =  "isk_business";*/
$server = "localhost";
$username ="root";
$password = "";
$db_name =  "isk_business";
$con  = mysql_connect($server,$username,$password);
mysql_select_db($db_name,$con);
?>