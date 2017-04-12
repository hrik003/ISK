<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customers View</title>
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

      <?php include "component/header.php" ?> <!-- header --->
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "component/sidebar.php" ?> <!-- sidebar --->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Customers view 
            <small> on specific order</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
<?php            $ordid=$_GET['orderid'];
 $custmail=$_GET['mail'];
 
 function checkviewexist($ordid){
	 
$strchk = mysql_query("SELECT count(*) FROM cust_view WHERE order_id ='$ordid'");
$r = mysql_fetch_row($strchk);
$val = $r[0];
			if($val>0)
			{
				return true;	
			}
			else
			{
				return false;	
			}		


 }
 if(checkviewexist($ordid)){
	 
	 $strfetch= mysql_query( "SELECT * FROM `cust_view` WHERE `order_id`='$ordid' ");
	 $viewrow =  mysql_fetch_row($strfetch);
	 
	 
	 ?>
     
     <div class="box-body">
              
                    <div class="form-horizontal" >
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">view  :</label>
                        <div class="col-sm-10">
                        
                          <input readonly  id="inputExperience" readonly class="form-control" type="text"  value="<?php echo $viewrow[2] ?>">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Reason</label>
                        <div class="col-sm-10">
                          <textarea name="reason" readonly placeholder="Description" id="inputExperience" class="form-control" required ><?php echo $viewrow[3] ?></textarea>
                        </div>
                      </div>
                      
                     
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" type="button" onClick="window.location='view_list.php'">Back to list </button>
                        </div>
                      </div>
                    
                    
                  </div>
        </section><!-- /.content -->
      </div>
     
     <?php
	 
 }
 else{
	 
?>
          
            <div class="box-body">
              <form class="form-horizontal" action="submit_view.php" method="post" >
                    
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">view  :</label>
                        <div class="col-sm-10">
                        <input type="hidden" name="orderid" value="<?php echo $ordid ?>"> 
                        <input type="hidden" name="custmail" value="<?php echo $custmail ?>">
                         <select class="form-control" name="viewstr" required> 
                         <option value="Happy">Happy</option>
                         <option value="Satisfied">Satisfied</option>
                         <option value="Denied">Denied</option>
                         <option value="Cancelled">Cancelled</option>
                         <option value="Interrupted by relatives">Interrupted by relatives</option>
                         <option value="Scam">Scam</option>
                         <option value="Didn't like Service ">Didn't like Service </option>
                                                                           
                         </select>
                          
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Reason</label>
                        <div class="col-sm-10">
                          <textarea name="reason" placeholder="Description" id="inputExperience" class="form-control" required ></textarea>
                        </div>
                      </div>
                      
                     
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" type="submit">Submit View </button>
                        </div>
                      </div>
                    </form>
                    
                  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php } ?>
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
    
  </body>
</html>
<?php } ?>