<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Details</title>
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


      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Customer Details
            <small>all customers are here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="box">
         <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr> 
                        <th>name</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>country</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>IP</th>
                       
                      </tr>
                    </thead>
                    
                    
                    <tbody> 
                    <?php
					
					
					
					 $fetchord  =  "SELECT * FROM `customer_details` ORDER BY `customer_details`.`cust_reg_date` DESC ";
					$fetchordres = mysql_query($fetchord);
					while($fetchordrow =  mysql_fetch_row($fetchordres))
					{
					?>
                    
                    	<tr> 
                       
                        <td><?php echo $fetchordrow[1] ?></td>
                         <td><a href="cust_details_more.php?cust_email=<?php echo $fetchordrow[0] ?>"> <?php echo $fetchordrow[0] ?></a></td>
                        <td><?php echo $fetchordrow[4] ?></td>
                        <td><?php echo $fetchordrow[7] ?> </td>
                        <td><?php echo $fetchordrow[8] ?></td>
                        <td><?php echo $fetchordrow[10] ?></td>
                        <td><?php echo $fetchordrow[2] ?></td>
                     
                       
                      </tr>
                      <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                      	<th>Order ID</th>
                        <th>Date</th>
                        
                        <th>Customer</th>
                        <th>Agent</th>
                        <th>Total</th>
                        <th>Mode</th>
                        <th>Order Status</th>
                        
                        
                      </tr>
                    </tfoot>
                  </table>
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
    
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  

     <script>
      $(function () {
        $("#example1").DataTable({
			
			
			});
        
      });
    </script>
  </body>
</html>
<?php } ?>