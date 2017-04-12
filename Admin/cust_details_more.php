<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	$cust_email  = $_GET['cust_email'];
	$getcustdetails  = mysql_query("SELECT * FROM `customer_details` WHERE cust_email = '$cust_email'");
	$custrow  = mysql_fetch_row($getcustdetails);
	
$cust_name = $custrow[1];
$cust_IP = $custrow[2];
$cust_company = $custrow[3];
$cust_phone = $custrow[4];
$cust_fax = $custrow[5];
$cust_address = $custrow[6];
$cust_country = $custrow[7];
$cust_state = $custrow[8];
$cust_city = $custrow[9];
$cust_zip = $custrow[10];
$cust_wherefrom = $custrow[11];
$cust_password = $custrow[12];
$cust_seq_ques = $custrow[13];
$cust_seq_ans = $custrow[14];
$cust_altphone = $custrow[15]; 
$cust_reg_date = $custrow[16];


		
	
		

			
	
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Information</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      
     
   <?php include "component/header.php"; ?> <!-- header --->
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "component/sidebar.php"; ?> <!-- sidebar --->


      

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Customer Information
            <small>all info are here</small>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Information</h3> <button onClick="window.location='cust_details.php'" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Back </button>
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div class="col-md-12">
              	<div class="col-md-6"> 
                	<label class="col-md-4"> Name : </label> <span class="col-md-8"> <?php echo $cust_name;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Email ID : </label> <span class="col-md-8"> <?php echo $cust_email;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> IP Address : </label> <span class="col-md-8"> <?php echo $cust_IP;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Company : </label> <span class="col-md-8"> <?php echo $cust_company;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Phone No. : </label> <span class="col-md-8"> <?php   echo $cust_phone;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Alt. Phone No. : </label> <span class="col-md-8"> <?php   echo $cust_altphone;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> FAX : </label> <span class="col-md-8"> <?php echo $cust_fax;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Password : </label> <span class="col-md-8"> <?php echo $cust_password;  ?> </span> <div class="clearfix"> </div>
                </div>
                
                <div class="col-md-6"> 
                	<label class="col-md-4"> Address : </label> <span class="col-md-8"> <?php echo $cust_address;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> City / Town : </label> <span class="col-md-8"> <?php echo $cust_city;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> State / Province : </label> <span class="col-md-8"> <?php echo $cust_state;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Zip / Postal code : </label> <span class="col-md-8"> <?php echo $cust_zip;  ?></span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Country : </label> <span class="col-md-8"> <?php echo $cust_country;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Where from : </label> <span class="col-md-8"> <?php echo $cust_wherefrom;  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4"> Security Question : </label> <span class="col-md-8"> <?php echo $cust_seq_ques;  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4"> Security Ans : </label> <span class="col-md-8"> <?php echo $cust_seq_ans;  ?> </span> <div class="clearfix"> </div>
                </div>
             </div>
            </div><!-- /.box-body -->
            
          </div>
        
          

        
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php include "component/footer.php" ?>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    
     <script>
      $(function () {
        $("#example1").DataTable();
       
      });
    </script>
  </body>
</html>
<?php } ?>