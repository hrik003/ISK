<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['cust'])){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
	$custmail = $_SESSION['cust'];
	$getcustdetails = mysql_query("SELECT cust_phone from customer_details WHERE cust_email='$custmail'");
	$getcustrow = mysql_fetch_row($getcustdetails);
	$custphone = $getcustrow[0];
	
	
	
	
?>
<!doctype html>


<html lang="en" class="no-js">

<head>
	<title>Upload</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/plugins-scroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
    <style> 
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: rgba(0,0,0,0.45);
    cursor: not-allowed;
	border:none;
	color:#FFFFFF;
	border-radius:0px;
	height:50px;
}
    </style>

</head>
<body class="login_bg">

	<div align="center" class="login_box"> 
    	<img class="apple_logo" src="images/logo.png">
        <div class="clearfix"> </div>
        
        <img class="profile_img" src="images/upload.png" width="80" height="100">
        <div class="gap-30">&nbsp;</div>
        <p class="login_title"> Upload your Documents </p>
        <form method="post" action="upload_doc.php" enctype="multipart/form-data">  
        	<input class="login_input" type="text" name="desc" placeholder="Description">
                 <input type="hidden" value="<?php echo $custmail ?>" name="custmail" >
                                <input type="hidden" value="<?php echo $custphone ?>" name="custphone" >
                                <input type="hidden" value="customer" name="uploader">
            
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn upload_btn btn-primary btn-file">
                        Browse&hellip; <input type="file" name="upldoc">
                    </span>
                </span>
                <input type="text" class="form-control" readonly>
            </div>
            
              <button class="btn login_btn btn-primary " type="submit"> Upload </button>
        </form>
    </div>
    <div class="clearfix"> </div>
    
    <div align="center" class="container return_panel"> 
    	<div class="row"> 
        	<div class="col-md-4"> 
            	<a href="logging_out.php"> <i class="fa fa-sign-out fa-2x"></i> <p> Logout </p> </a>
            </div>
            <div class="col-md-4"> 
            	<a href="index.php"> <i class="fa fa-home fa-2x"></i> <p> Home </p> </a>
            </div>
            <div class="col-md-4"> 
            	<a href="#"><i class="fa fa-file-text fa-2x"></i> <p> Services </p> </a>
            </div>
            
        </div>
    </div>
    
    <script> 
    	   $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
    </script>
</body>
</html>
<?php } ?>