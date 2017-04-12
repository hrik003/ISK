<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	$order_id  =$_GET['orderid'];
	$getorderdetails  = mysql_query("SELECT * FROM order_details where order_id = '$order_id'");
	$orderrow = mysql_fetch_row($getorderdetails);
	

		$cust_email = $orderrow[1];
		$cust_addr= $orderrow[2];
		$cust_phone= $orderrow[3];
		$agent_username= $orderrow[4];
		$pay_mode= $orderrow[5];
		$price= $orderrow[6];
		$transaction_status= $orderrow[7];
		$trans_date= $orderrow[8];
		$plan= $orderrow[9];
		$noofcom= $orderrow[10];
		$comment= $orderrow[11];
		$order_date= $orderrow[12];
$transaction_feedback =  $orderrow[15];
$plan_yr = $orderrow[13];
				
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
    <title>Order Details</title>
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
            Order Details
            <small>all sales are here</small>
          </h1>
          
         
       
        </section>
<div class="clearfix"> </div>
        <!-- Main content -->
        <section class="content">
        
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Payment Status</h3>
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div class="col-md-12">
              	<?php if($transaction_status=='0'){?>
                 <form method="post" action="modtrans.php" >
              	<select id="paystat" class="" name="paystat" style="border:none; border:#BBBBBB 1px solid; width:50%; height:30px; vertical-align:middle;" > 
                	
                    <option value="1"> Success </option>
                   <option value="2"> charge back </option>
                    <option value="3"> refund </option>
                </select> <div class="clearfix"></div><br>
                <textarea name="trans_feed" required class="form-control" ><?php echo $transaction_feedback ?></textarea>
             <div class="clearfix"></div><br>
                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                <button type="submit" class="btn btn-primary" style="height:30px;"> Save</button>
              </form>
              
              <?php } elseif($transaction_status=='1') {?>
                <div class="callout callout-success">
                    <h4>Payment status is success</h4>
                    <p>The Payment of this order is success</p>
                  </div>
                  <form method="post" action="modtrans.php" >
              	<select id="paystat" class="" name="paystat" style="border:none; border:#BBBBBB 1px solid; width:50%; height:30px; vertical-align:middle;" >  <option value="2"> charge back </option>
                    <option value="3"> refund </option>
                	
                   
                </select>
                <div class="clearfix"></div><br>
                <textarea name="trans_feed" required class="form-control" ><?php echo $transaction_feedback ?></textarea>
             <div class="clearfix"></div><br>
                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                <button type="submit" class="btn btn-primary" style="height:30px;"> Save</button>
              </form>
                  <?php }elseif($transaction_status=='2') { ?>
                  <div class="callout callout-danger">
                    <h4>Payment status is charge back</h4>
                    <p><?php echo $transaction_feedback ?></p>
                  </div>
                  <?php }elseif($transaction_status=='3') { ?>
                  <div class="callout callout-danger">
                    <h4>Payment status is Refund</h4>
                    <p><?php echo $transaction_feedback ?></p>
                  </div>
                  <?php }?>
             </div>
            </div><!-- /.box-body -->
            
          </div>
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Customer billing Information</h3>
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <div class="col-md-12">
              	<div class="col-md-6"> 
                <label class="col-md-4"> Order ID : </label> <span class="col-md-8"> <?php echo $order_id;  ?> </span> <div class="clearfix"> </div>
                	<label class="col-md-4"> Name : </label> <span class="col-md-8"> <?php echo $cust_name;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Email ID : </label> <span class="col-md-8"> <?php echo $cust_email;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> IP Address : </label> <span class="col-md-8"> <?php echo $cust_IP;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Company : </label> <span class="col-md-8"> <?php echo $cust_company;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Phone No. : </label> <span class="col-md-8"> <?php   echo $cust_phone;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> FAX : </label> <span class="col-md-8"> <?php echo $cust_fax;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Password : </label> <span class="col-md-8"> <?php echo $cust_password;  ?> </span> <div class="clearfix"> </div>
                </div>
                
                <div class="col-md-6"> 
                
                <label class="col-md-4"> Amount : </label> <span class="col-md-8"> <?php echo $price;  ?> </span> <div class="clearfix"> </div>
                 <label class="col-md-4"> Plan : </label> <span class="col-md-8"> <?php echo $plan;  ?> </span> <div class="clearfix"> </div>
                  <label class="col-md-4"> year : </label> <span class="col-md-8"> <?php echo $plan_yr;  ?> </span> <div class="clearfix"> </div>
                	<label class="col-md-4"> Address : </label> <span class="col-md-8"> <?php echo $cust_addr;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> City / Town : </label> <span class="col-md-8"> <?php echo $cust_city;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> State / Province : </label> <span class="col-md-8"> <?php echo $cust_state;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Zip / Postal code : </label> <span class="col-md-8"> <?php echo $cust_zip;  ?></span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Country : </label> <span class="col-md-8"> <?php echo $cust_country;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Where from : </label> <span class="col-md-8"> <?php echo $cust_wherefrom;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Security Question : </label> <span class="col-md-8"> <?php echo $cust_seq_ques;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Security ans : </label> <span class="col-md-8"> <?php echo $cust_seq_ans;  ?> </span> <div class="clearfix"> </div>
                </div>
             </div>
            </div><!-- /.box-body -->
            
          </div>
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Shipping Status</h3> <button onClick="window.location='edit_shipping.php?cust_email=<?php echo $cust_email;  ?>'" class="btn btn-danger btn-xs"><i class="fa fa-pencil-square-o"></i> Edit </button>
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            	<div class="col-md-12">
              	<div class="col-md-6"> 
                	<label class="col-md-4"> Name : </label> <span class="col-md-8"> <?php echo $shipping_name;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Company : </label> <span class="col-md-8"> <?php echo $shipping_company;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Address : </label> <span class="col-md-8"> <?php echo $shipping_addr;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> City : </label> <span class="col-md-8"> <?php echo $shipping_city;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> State : </label> <span class="col-md-8"> <?php echo $shipping_state;  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Zip / Post code : </label> <span class="col-md-8"> <?php echo $shipping_zip;  ?> </span> <div class="clearfix"> </div>
                </div>
                
                
             </div>
            </div><!-- /.box-body -->
            
          </div>
          
<?php     

     if($pay_mode  == '0')
{
	$getccdetails  = mysql_query("SELECT * FROM `credit_card` WHERE `order_id` = '$order_id' ");
	$ccrow  =  mysql_fetch_row($getccdetails);
	
			

	
       ?>   <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Credit Card Information</h3> 
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            	<div class="col-md-12">
              	<div class="col-md-6"> 
                	<label class="col-md-4"> card name: </label> <span class="col-md-8">  <?php echo $ccrow[1];  ?> </span> <div class="clearfix"> </div>
                   <label class="col-md-4"> card type: </label> <span class="col-md-8">  <?php echo $ccrow[2];  ?> </span> <div class="clearfix"> </div>
                   <label class="col-md-4"> Card Number : </label> <span class="col-md-8">  <?php echo $ccrow[3];  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Expiration Date. : </label> <span class="col-md-8"> <?php echo $ccrow[4];  ?>/<?php echo $ccrow[5];  ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> CVV : </label> <span class="col-md-8">  <?php echo $ccrow[7];  ?> </span> <div class="clearfix"> </div>
                </div>
                
                
             </div>
            </div><!-- /.box-body -->
            
          </div>
          
          <?php }elseif($pay_mode  == '1')
{
	$getecdetails  = mysql_query("SELECT * FROM `echeque`  WHERE `order_id` = '$order_id' ");
	$ecrow  =  mysql_fetch_row($getecdetails);



		
	?>
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Online Check Payment</h3> 
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            	<div class="col-md-12">
              	<div class="col-md-6"> 
                	<label class="col-md-4"> Bank Name : </label> <span class="col-md-8"> <?php echo $ecrow[1]; ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Name on Account : </label> <span class="col-md-8"> <?php echo $ecrow[2]; ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> A/c No. : </label> <span class="col-md-8"> <?php echo $ecrow[3]; ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Routing No. : </label> <span class="col-md-8"> <?php echo $ecrow[4]; ?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Check No. : </label> <span class="col-md-8"> <?php echo $ecrow[5]; ?></span> <div class="clearfix"> </div>
                   <!-- <label class="col-md-4"> Transaction Status : </label> <span class="col-md-8"> </span> <div class="clearfix"> </div>-->
                </div>
                
                
             </div>
            </div><!-- /.box-body -->
            
          </div>
          
           <?php }elseif($pay_mode  == '2')
{
	$getdcdetails  = mysql_query("SELECT * FROM `debit_card`   WHERE `order_id` = '$order_id' ");
	$dcrow  =  mysql_fetch_row($getdcdetails);
	 

	?>
        
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Debit Card Details</h3> 
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            	<div class="col-md-12">
              	<div class="col-md-6"> 
                	<label class="col-md-4"> Card Name : </label> <span class="col-md-8"> <?php echo $dcrow[1];?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Card Type : </label> <span class="col-md-8"> <?php echo $dcrow[2];?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Card Number : </label> <span class="col-md-8"><?php echo $dcrow[3];?>  </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Start date : </label> <span class="col-md-8"> <?php echo $dcrow[4];?>/<?php echo $dcrow[5];?> </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Exp. Date : </label> <span class="col-md-8"> <?php echo $dcrow[6];?>/<?php echo $dcrow[7];?></span> <div class="clearfix"> </div>
                     <label class="col-md-4"> CVV : </label> <span class="col-md-8">  <?php echo $dcrow[9];  ?> </span> <div class="clearfix"> </div>
                   
                </div>
                
                
             </div>
            </div><!-- /.box-body -->
            
          </div>
         <?php }elseif($pay_mode  == '3')
{?>
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Fund Transfer</h3> 
              <div class="box-tools pull-right">
                <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-box-tool" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button title="" data-toggle="tooltip" data-widget="remove" class="btn btn-box-tool" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            	<div class="col-md-12">
              	<div class="col-md-6"> 
                	<label class="col-md-4"> Bank Name : </label> <span class="col-md-8"> John Doe </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Name on Account : </label> <span class="col-md-8"> John Doe </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> A/c No. : </label> <span class="col-md-8"> John Doe </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Routing No. : </label> <span class="col-md-8"> John Doe </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Cheak No. : </label> <span class="col-md-8"> John Doe </span> <div class="clearfix"> </div>
                    <label class="col-md-4"> Transaction Status : </label> <span class="col-md-8"> John Doe </span> <div class="clearfix"> </div>
                </div>
                
                
             </div>
            </div><!-- /.box-body -->
            
          </div>
          
         <?php }?>
        
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