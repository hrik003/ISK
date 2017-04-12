<?php
$server = "107.180.57.7";
$username ="wiz_master";
$password = "wiz@master";

$db_name =  "master_crm_db2";
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
		echo "<META http-equiv=\"refresh\" content=\"0;URL=index1.php\">";	
	}
	else
	{
		echo "Ooops!! There is an error...";
		echo "<META http-equiv=\"refresh\" content=\"0;URL=index1.php\">";		
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
<form name="f" method="post" action="index1.php">
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