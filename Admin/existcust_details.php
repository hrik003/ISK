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
    <title>Callback Details</title>
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
    
	<link href="build/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

   <?php include "component/header.php" ?> <!-- header --->
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "component/sidebar.php" ?> <!-- sidebar --->

    <?php 
		function setmodestr($n)
					{
						if($n==0)
						{
							return "Credit Card";
						}
						elseif($n==1){
							return "e-cheque";
						}
						elseif($n==2){
							return "Debit Card";
						}
						elseif($n==3){
							return "Fund Transfer";
						}
										
					}
	$extid=$_GET['extid'];
	
$getrecord= mysql_query("SELECT * FROM `exist_cust` WHERE exist_id='$extid'");
$row = mysql_fetch_row($getrecord);

$order_id = $row[1];
$cust_mail =$row[2];
$cust_name=$row[3];
$curr_reason=$row[4];
$issue_resolve=$row[5];
$upselling_amt=$row[6];
$remarks=$row[7];
$regdate=$row[8];


?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Callback details
            <small> existing customer</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              <div class="form-horizontal" >
                 
                 <input type="hidden" name="ordid" value="<?php echo $ordid ?>">
                 <input type="hidden" name="custmail" value="<?php echo $custmail ?>">
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Name of the customer</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Name" id="inputExperience" readonly class="form-control" type="text" name="custname" value="<?php echo $cust_name ?>">
                        </div> 
                      </div>
                       <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">customer Email</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Name" id="inputExperience" readonly class="form-control" type="text" name="custname" value="<?php echo $cust_mail ?>">
                        </div> 
                      </div>
                                       
                    
                      
                      
                      
                      
                          
                      <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">What is the current reason for calling</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="curr_reason" readonly > <?php echo $curr_reason ?></textarea>                
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">Was the issue resolved</label>
                        <div class="col-sm-12">
                         
                         <input  id="inputExperience" class="form-control" type="text" readonly   name="issue_resolve" value="<?php echo $issue_resolve ?>">               
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Upselling Amount</label>
                        <div class="col-sm-12">
                         
                                              <input  id="inputExperience" readonly class="form-control" type="text"  name="upsellingamt" value="<?php echo $upselling_amt ?>">                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Additional Remarks</label>
                        <div class="col-sm-12">
                         
                            <textarea class="form-control" name="rem" readonly><?php echo $remarks ?></textarea>                
                        </div>
                      </div>
                      
        
 
                 
                  
                  
                     
                     
                     
                      <div class="form-group col-md-12">
                        <div class="col-sm-12">
                         
                          <button class="btn btn-danger" type="button" onClick="window.location='exist_cust.php'"> back to list </button>
                        </div>
                      </div>
                    </div>
                    
                    <div>
                <!-- /.box-header -->
                <!-- /.box-body -->
            
          </div><!-- /.box -->

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
                $('#example2').DataTable();
                $("#example3").DataTable();
              });
            </script>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="build/js/bootstrap-datetimepicker.min.js"></script>

		<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker(
				{
                viewMode: 'years',
               format: 'YYYY-MM-DD HH:mm'
            });
				
            });
 		</script>

<script src="dist/js/timezones.full.js"></script>
		<script>
           $('#timezone').timezones();
        </script>

  </body>
</html>
<?php } ?>
