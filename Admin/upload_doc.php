<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
$ref  = $_SERVER['HTTP_REFERER'];
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{

$sub  = $_POST['sub'];
$desc =  $_POST['desc'];
$uploader =$_SESSION['user'];
		if(isset($_FILES['upldoc']))
		{
			$file_name =strtoupper(md5(date('r')).rand());
 		    $file_tmp =$_FILES['upldoc']['tmp_name'];
     		$file_ext=strtolower(end(explode('.',$_FILES['upldoc']['name'])));
         	$upldir  ="../docs/".$file_name.".".$file_ext;
			move_uploaded_file($file_tmp,$upldir);
			
			$docstr = "INSERT INTO `document_details` ( `doc_name`, `doc_desc`, `doc_path`, `upload_date`,`uploader`) VALUES ( '$sub', '$desc', '$upldir', NOW() ,'$uploader');";
			$docr  = mysql_query($docstr);
			if($docr)
			{
			echo "<script>alert('document successfull uploaded')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
			}
			else{
			echo "<script>alert('Opps!! An error occoured!!!')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
			}
		}else{
		echo "<script>alert('Opps!! An error occoured!!!')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";	
		}
		
}
?>