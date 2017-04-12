<?php
include "component/config.php";
date_default_timezone_set("Asia/Kolkata");


$ref  = $_SERVER['HTTP_REFERER'];
session_start();
if(!isset($_SESSION['cust'])){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{

$custmail = $_POST['custmail'];
$custphone  =   $_POST['custphone'];
$desc =  $_POST['desc'];

		if(isset($_FILES['upldoc']))
		{
			$file_name =strtoupper(md5(date('r')).rand());
 		    $file_tmp =$_FILES['upldoc']['tmp_name'];
     		$file_ext=strtolower(end(explode('.',$_FILES['upldoc']['name'])));
			
			if($file_ext!= "jpg" && $file_ext!= "png" && $file_ext!= "jpeg" && $file_ext!= "pdf"){
				echo "<script>alert('Please Upload file only with .jpg, .png, .pdf extension!');</script>";
				echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
			}
			else{
         	$upldir  ="docs/".$file_name.".".$file_ext;
			move_uploaded_file($file_tmp,$upldir);
			$upldirdb  ="../docs/".$file_name.".".$file_ext;
			$docstr = "INSERT INTO `cust_doc`( `cust_email`, `doc_details`, `doc_src`, `docupload_date`, `cust_phone`) VALUES ('$custmail', '$desc', '$upldirdb', CURRENT_DATE(), '$custphone')";
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
			}
		}else{
		echo "<script>alert('Opps!! An error occoured!!!--')</script>";
			echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";	
		}
		
}
?>