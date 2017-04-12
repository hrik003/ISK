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
    <title>Quality Verification</title>
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
    <script type="text/javascript" src="plugins/jQuery/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="plugins/rating/jquery-rating.js"></script>
	<link rel="stylesheet" type="text/css" href="plugins/rating/jquery-rating.css">
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
	$ordid=$_GET['orderid'];
	
$getrecord= mysql_query("SELECT  order_details.agent_username ,order_details.price, order_details.pay_mode, customer_details.cust_name , order_details.planyears, customer_details.cust_email FROM order_details INNER JOIN customer_details ON order_details.cust_email = customer_details.cust_email  WHERE order_details.order_id='$ordid'");
$row = mysql_fetch_row($getrecord);
$custname = $row[3];
$amnt =  $row[1];
$agntname = $row[0];
$planyr = $row[4];
$paymode = setmodestr($row[2]);
$custmail = $row[5];


?>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Quality Verification
            <small> Verify your customer</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              <form class="form-horizontal" action="submit_verification.php" method="post" >
                 <div class="col-md-6">
                 <input type="hidden" name="ordid" value="<?php echo $ordid ?>">
                 <input type="hidden" name="custmail" value="<?php echo $custmail ?>">
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Name of the customer</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Name" id="inputExperience" readonly class="form-control" type="text" name="custname" value="<?php echo $custname ?>">
                        </div> 
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Sale Amount</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Amount" readonly id="inputExperience" class="form-control" type="text" value="<?php echo $amnt ?>" name="amnt">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience"  >Agent Name</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Agent Name" readonly name="agntname" id="inputExperience" class="form-control" type="text" value="<?php echo $agntname ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Plan Duration</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Duration" readonly id="inputExperience" class="form-control" type="text" value="<?php echo $planyr ?>" name="planyr">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Name of the Payment Marchant Card/ Check</label>
                        <div class="col-sm-12">
                         <input readonly id="inputExperience" class="form-control" type="text" value="<?php echo $paymode ?>" name="paymode">
                        
                        </div>
                      </div>
        
                    <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Main Number</label>
                        <div class="col-sm-12">
                         <input  id="inputExperience" class="form-control" type="text"  name="main_number">
                        
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Alternate Number</label>
                        <div class="col-sm-12">
                         <input  id="inputExperience" class="form-control" type="text"  name="alt_number">
                        
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Email Address</label>
                        <div class="col-sm-12">
                         <input  id="inputExperience" class="form-control" type="text"  name="email">
                        
                        </div>
                      </div>
                  </div>
                  
                  <div class="col-md-6">
                  
                  	  <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">Payment processing Appointment Date</label>
                        <div class="col-sm-12">
                          <div class='input-group date' id='datetimepicker1'>
                    		<input type='text' class="form-control" name="apmnt_datetime" />
                    			<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-calendar"></span>
                    			</span>
                                 <select id="timezone" class="form-control" name="timezone"></select>
                		  </div>
                        </div>
                       
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">Printer Scanner Request</label>
                        <div class="col-sm-12">
                          <select class="form-control" name="prnscnrqst"> 
                          	<option value="1"> Yes</option>
                            <option value="0" > No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">Western Union and cold calling explained</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="cold"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Pop up link removal Proccedure</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="popup"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Step of force quit explained</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="fcquit"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Check verification</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="checkverify"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Charging</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="charging"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                                            <label class="col-sm-12 " for="inputExperience">Customer Rating</label>
                                            <div class="col-sm-12">
                                             <div class="group1">
                    
                            <div   class="jr-ratenode jr-nomal"></div>
                            <div   class="jr-ratenode jr-nomal "></div>
                            <div   class="jr-ratenode jr-nomal "></div>
                            <div   class="jr-ratenode jr-nomal "></div>
                            <div   class="jr-ratenode jr-nomal "></div>
                        </div>
                                    <input type="hidden" id="rateval" name="rateval" >        
                                            </div>
                                          </div>
                                          <script type="text/javascript">
	$('.group1').start(function(cur){
		console.log(cur);
		 $('#rateval').val(cur);
		 //alert(cur);
	});
	</script>
                      
                    </div>
                     
                     <div class="col-md-12"> 
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Customer Feedback on the service, any complain against the Agent or Tech.</label>
                        <div class="col-sm-12">
                         <textarea class="form-control" name="feedback"></textarea>
                          
                        </div>
                      </div>
                     </div>
                     
                      <div class="form-group col-md-12">
                        <div class="col-sm-12">
                          <button class="btn btn-success" type="submit">Save </button>
                          <button class="btn btn-danger" type="button" onClick="window.location='varification_list.php'"> Cancel </button>
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
