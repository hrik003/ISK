<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	$ordid=$_GET['orderid'];
	//$cust_email  = $_GET['cust_email'];
	$getverdetails  = mysql_query("SELECT * FROM `order_varification` WHERE order_id = '$ordid'");
	$verrow  = mysql_fetch_row($getverdetails);
	
$varify_id  =$verrow[0];
$cust_name=$verrow[1];
$cust_email=$verrow[2];
$order_id=$verrow[3];
$agentname=$verrow[4];
$amount=$verrow[5];
$plan_yr=$verrow[6];
$payment_process=$verrow[7];
$appmt_datetime=$verrow[8];
$appmt_timezone=$verrow[9];
$printer_rqst=$verrow[10];
$coldcalling=$verrow[11];
$popup=$verrow[12];
$forcequit=$verrow[13];
$feedback=$verrow[14];
$regdate=$verrow[15];
$checkverify =$verrow[16];
$phno = $verrow[17];
$altno = $verrow[18];
$email = $verrow[19];
$charging = $verrow[20];
$rate = $verrow[21];


		
	
		

			
	
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Varified Information</title>
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
<?php 
function yesnostr($n)
{
if($n==0){
	
return "No"	;
}
else{
	return "Yes"	;
}

}

?>

      

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Varified Information
            <small>Information of varified order </small>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Varified order Information</h3> <button onClick="window.location='varification_list.php'" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Back </button>
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div class="col-md-12">
              	 
                	<!--<label class="col-md-4"> Customer Name : </label> <span class="col-md-8"> <?php echo $cust_name;  ?> </span> <div class="clearfix"> </div>
                   	<label class="col-md-4"> Sale Amount : </label> <span class="col-md-8"> <?php echo $amount;  ?> </span> <div class="clearfix"> </div>

					<label class="col-md-4"> Agent Name : </label> <span class="col-md-8"> <?php echo $agentname;  ?> </span> <div class="clearfix"> </div>
					<label class="col-md-4"> Plan Duration (Year) : </label> <span class="col-md-8"> <?php echo $plan_yr;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Name of payment marchant Card/Check : </label> <span class="col-md-8"> <?php echo $payment_process;  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4"> Payment proccessing Appointment Date : </label> <span class="col-md-8"> <?php echo $appmt_datetime;  ?> </span> <div class="clearfix"> </div>
                    
                    


                
                 <label class="col-md-4"> TimeZone : </label> <span class="col-md-8"> <?php echo $appmt_timezone;  ?> </span> <div class="clearfix"> </div>
                	
                     <label class="col-md-4"> Printer Scanner Request : </label> <span class="col-md-8"> <?php echo yesnostr($printer_rqst);  ?> </span> <div class="clearfix"> </div>
                     
                     <label class="col-md-4"> Western Union and cold calling explained : </label> <span class="col-md-8"> <?php echo yesnostr($coldcalling);  ?> </span> <div class="clearfix"> </div> 
                     
                     <label class="col-md-4"> Popup link Removal Proccedure : </label> <span class="col-md-8"> <?php echo yesnostr($popup);  ?> </span> <div class="clearfix"> </div>
                     
                     <label class="col-md-4"> Steps of force quit explained : </label> <span class="col-md-8"> <?php echo yesnostr($forcequit);  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4"> Check verification : </label> <span class="col-md-8"> <?php echo yesnostr($checkverify);  ?> </span> <div class="clearfix"> </div>
                     
                     <label class="col-md-4"> Phone Number : </label> <span class="col-md-8"> <?php echo $phno  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4"> Alt. Phone Number : </label> <span class="col-md-8"> <?php echo $altno  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4"> email Address : </label> <span class="col-md-8"> <?php echo $email;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Charging : </label> <span class="col-md-8"> <?php echo yesnostr($charging);  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4"> Rating : </label> <span class="col-md-8"> <?php echo $rate;  ?> </span> <div class="clearfix"> </div>
                     <label class="col-md-4">Feedback : </label> <span class="col-md-8"> <?php echo $feedback;  ?> </span> <div class="clearfix"> </div>
                -->
                
               <form class="form-horizontal" action="edit_verification.php?varify_id=<?php echo $varify_id?>" method="post" >
                 <div class="col-md-6">
                 <input type="hidden" name="ordid" value="<?php echo $ordid ?>">
                 <input type="hidden" name="custmail" value="<?php echo $custmail ?>">
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Name of the customer</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Name" id="inputExperience" readonly class="form-control" type="text" name="custname" value="<?php echo $cust_name ?>">
                        </div> 
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Sale Amount</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Amount" readonly id="inputExperience" class="form-control" type="text" value="<?php echo $amount ?>" name="amnt">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience"  >Agent Name</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Agent Name" readonly name="agntname" id="inputExperience" class="form-control" type="text" value="<?php echo $agentname ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Plan Duration</label>
                        <div class="col-sm-12">
                         
                          <input placeholder="Duration" readonly id="inputExperience" class="form-control" type="text" value="<?php echo $plan_yr ?>" name="planyr">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Name of the Payment Marchant Card/ Check</label>
                        <div class="col-sm-12">
                         <input readonly id="inputExperience" class="form-control" type="text" value="<?php echo $payment_process ?>" name="paymode">
                        
                        </div>
                      </div>
        
                    <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Main Number</label>
                        <div class="col-sm-12">
                         <input readonly id="inputExperience" class="form-control" type="text"  name="main_number" value="<?php echo $phno ?>">
                        
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Alternate Number</label>
                        <div class="col-sm-12">
                         <input readonly id="inputExperience" class="form-control" type="text"  name="alt_number" value="<?php echo $altno ?>">
                        
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Email Address</label>
                        <div class="col-sm-12">
                         <input readonly id="inputExperience" class="form-control" type="text"  name="email" value="<?php echo $email ?>">
                        
                        </div>
                      </div>
                  </div>
                  
                  <div class="col-md-6">
                  
                  	  <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">Payment processing Appointment Date</label>
                        <div class="col-sm-12">
                          <div class='input-group date' id='datetimepicker1'>
                    		<input type='text' readonly class="form-control" name="apmnt_datetime" value="<?php echo $appmt_datetime ?>" />
                    			<span class="input-group-addon">
                                	<span class="glyphicon glyphicon-calendar"></span>
                    			</span>
                                 <select id="timezone" class="form-control" name="timezone" value="<?php echo $appmt_timezone ?>" disabled="true"></select>
                		  </div>
                        </div>
                       
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">Printer Scanner Request</label>
                        <div class="col-sm-12">
                          <select class="form-control" name="prnscnrqst" disabled="true"> 
                          	<option value="1" <?php if($printer_rqst==1) echo "selected"; else echo "" ?>> Yes</option>
                            <option value="0" <?php if($printer_rqst==0) echo "selected"; else echo "" ?>> No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12" for="inputExperience">Western Union and cold calling explained</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="cold" disabled="true"> 
                          	<option value="1"<?php if($coldcalling==1) echo "selected"; else echo "" ?>> Yes</option>
                            <option value="0"<?php if($coldcalling==0) echo "selected"; else echo "" ?>> No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Pop up link removal Proccedure</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="popup" disabled="true"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Step of force quit explained</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="fcquit" disabled="true"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Check verification</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="checkverify" disabled="true"> 
                          	<option value="1"> Yes</option>
                            <option value="0"> No</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-12 " for="inputExperience">Charging</label>
                        <div class="col-sm-12">
                         
                          <select class="form-control" name="charging" disabled="true"> 
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
                                    <input type="text" readonly class="form-control" id="rateval" name="rateval" value="<?php echo $rate ?>" >        
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
                         <textarea class="form-control" name="feedback"><?php echo $feedback; ?></textarea>
                          
                        </div>
                      </div>
                     </div>
                     
                      <div class="form-group col-md-12">
                        <div class="col-sm-12">
                          <button class="btn btn-success" type="submit">Update </button>
                          <button class="btn btn-danger" type="button" onClick="window.location='varification_list.php'"> Cancel </button>
                        </div>
                      </div>
                    </form> 
                
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
    <script src="dist/js/timezones.full.js"></script>
		<script>
           $('#timezone').timezones();
        </script>
  </body>
</html>
<?php } ?>