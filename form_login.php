<?php
if(isset($_POST['submit']))
{
	$pass=$_POST['pass'];
	$password="1234";
	if($password==$pass)
	{
		/*echo "<script> alert('Login is successful') </script>"	;*/
		?>
		<script> 
     window.location.href='forms.php';
     </script>
     <?php
	}
	else
	{
		
		?>
	 <script> 
	 alert('Login is unsuccessful. Please back to Login Page.');
     window.location='form_login.php';
     </script>
	<?php
	//header("location:form_login.php");	
	}
}
?>
<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>Form Login</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

</head>
<body class="login_bg">

	<!-- Container -->
	<div id="container">
		<div align="center" class="login_box"> 
    	<img class="apple_logo" src="images/logo.png" >
        <div class="clearfix"> </div>
        
        <img class="profile_img" src="images/form.png" width="90" height="100">
        <div class="gap-30">&nbsp;</div>
        <p class="login_title"> Login to Download all the forms  </p>
        <form method="post" action=""> 
        	
<p style="color:#000000;"> Forms are password protected, to download forms login is necessary. After login click the button to download form. Form will be downloaded in PDF format. </p> 
            <input class="login_input" type="password" placeholder="Password" name="pass">
            <button class="btn login_btn btn-primary" type="submit" name="submit"> Login to Download </button>
        </form>
    </div>
	</div>
    <div class="clearfix"> </div>
    
    <div align="center" class="container return_panel"> 
    	<div class="row"> 
        	<div class="col-md-4"> 
            	<a href="<?php echo $ref?>"> <i class="fa fa-times-circle-o fa-2x"></i> <p> cancel </p> </a>
            </div>
            <div class="col-md-4"> 
            	<a href="index.php"> <i class="fa fa-home fa-2x"></i> <p> Home </p> </a>
            </div>
            <div class="col-md-4"> 
            	<a href=""><i class="fa fa-file-text fa-2x"></i> <p> Services </p> </a>
            </div>
            
        </div>
    </div>
    
	<!-- End Container -->
</body>
</html>