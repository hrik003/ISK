<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	$ref=  $_SERVER['HTTP_REFERER'] ;
	$agent = $_SESSION['user'];
	$cust_email = $_GET['cust_email'];
	$getshipdetails  = mysql_query("SELECT * FROM shipping_details where cust_email = '$cust_email'");
	$shiprow  = mysql_fetch_row($getshipdetails);

		$shipping_name =  $shiprow[2];
		$shipping_company =  $shiprow[3];
		$shipping_addr  =  $shiprow[4];
		$shipping_city  =  $shiprow[5];
		$shipping_state  =  $shiprow[6];
		$shipping_zip  =  $shiprow[7];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Shipping Address</title>
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

      
    
   <?php include "component/header.php" ?> <!-- header --->
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "component/sidebar.php" ?> <!-- sidebar --->



      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Shipping Address
            <small>it all starts here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
			<div>
         		<div class="box" style="padding:20px;"> 
                	<form class="form-horizontal" method="post" action="mod_shipping.php">
                    <input type="hidden" name="cust_email" value="<?php echo $cust_email; ?>" >
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="sh_name"  name="sh_name" placeholder="Name" value="<?php echo $shipping_name; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Company</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  id="sh_comp"  name="sh_comp" placeholder="Company"  value="<?php echo $shipping_company; ?>">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  id="sh_addr"  name="sh_addr" placeholder="Address" ><?php echo $shipping_addr; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label"  >City</label>
                        <div class="col-sm-10">
                          <!--<input type="text" placeholder="Skills" id="inputSkills" class="form-control">-->
                          <input type="text" class="form-control"  id="sh_city"  name="sh_city"  placeholder="City"  value="<?php echo $shipping_city; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                          <!--<input type="text" placeholder="Skills" id="inputSkills" class="form-control">-->
                          <input type="text" class="form-control" id="sh_state"  name="sh_state"  placeholder="State"  value="<?php echo $shipping_state; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Zip / Postal Code</label>
                        <div class="col-sm-10">
                          <!--<input type="text" placeholder="Skills" id="inputSkills" class="form-control">-->
                          <input type="text" class="form-control"  id="sh_zip"  name="sh_zip"  placeholder="Zip / Postal Code"  value="<?php echo $shipping_zip; ?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Save Changes</button>
                          <button type="button"  onClick="window.location='sales_report.php'" class="btn btn-danger">Back to sales report</button>
                          
                        </div>
                      </div>
                    </form>
                </div>
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
  </body>
</html>
<?php } ?>