<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
	$ordid = $_GET['orderid'];
	function existord($ordid)
	{
	$str = mysql_query("SELECT * FROM `goods_delivery` WHERE order_id='$ordid' ");	
	$rcount = mysql_num_rows($str);
				if($rcount>0)
				{
				return true;	
				}
				else{
				return false;	
				}
	
	}
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
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Goods Delivery Verification</title>
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
            Goods Delivery Verification
            <small> verify your goods here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
<?php if(!existord($ordid)) { ?>
          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              <form class="form-horizontal" action="goods_verification.php" method="post" >
                    <input type="hidden" value="<?php echo $ordid ?>" name="ordid" >
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Is Delivered</label>
                        <div class="col-sm-10">
                          <select name="is_delivered" class="form-control" >
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                          </select>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Description</label>
                        <div class="col-sm-10">
                          <textarea name="desc" placeholder="Description" id="inputExperience" class="form-control"></textarea>
                        </div>
                      </div>
                    <div class="form-group col-md-12">
                        <div class="col-sm-12">
                          <button class="btn btn-success" type="submit">Save </button>
                          <button class="btn btn-danger" type="button" onClick="window.location='goodsdelivered_list.php'"> Cancel </button>
                        </div>
                      </div>
                    </form>
               </div>     
               </div>  
               
               <?php }else{?>
              <div class="box">
            
            <div class="box-body">
              <div class="form-horizontal"  >
                   <?php 
				   $strfetch = mysql_query("SELECT * FROM `goods_delivery` WHERE order_id='$ordid'");
				   $row = mysql_fetch_row($strfetch);
				   
				   
				   ?>
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Is Delivered</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  value="<?php echo yesnostr($row[3])?>" readonly>
                         
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Description</label>
                        <div class="col-sm-10">
                          <textarea name="desc" placeholder="Description" id="inputExperience" class="form-control" readonly><?php echo $row[2]?></textarea>
                        </div>
                      </div>
                    <div class="form-group col-md-12">
                        <div class="col-sm-12">
                       
                          <button class="btn btn-danger" type="button" onClick="window.location='goodsdelivered_list.php'"> Cancel </button>
                        </div>
                      </div>
                    </div>
               </div>     
               </div> 
               <?php } ?>
               
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
  </body>
</html>
<?php } ?>