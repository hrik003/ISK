<?php
$server = "103.211.216.141";
$username ="suppo1pg_user";
$password = "wizkraft";
$db_name =  "suppo1pg_crm_db";
$con  = mysql_connect($server,$username,$password);
mysql_select_db($db_name,$con);
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$sql="insert into `testing`(`name`) values('$name')";
	$rs=mysql_query($sql);
	if($rs>0)
	{
		echo "Data is inserted";
		echo "<META http-equiv=\"refresh\" content=\"0;URL=index2.php\">";	
	}
	else
	{
		echo "Ooops!! There is an error...";
		echo "<META http-equiv=\"refresh\" content=\"0;URL=index2.php\">";		
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body>
INDEX 2

<form name="f" method="post" action="index2.php">
<table align="center" border="1">
<tr>
<td>Name</td>
<td><input type="text" name="name" id="name" size="30"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</body>
</html>