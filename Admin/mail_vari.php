<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mail Verification</title>
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
      <link rel="stylesheet" type="text/css" href="plugins/inputtags/inputTags.css" media="screen">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>
        .table-striped tbody tr.selected td {
            background: #E6F6F7;
        }
    </style>
    <script>
	function checkval(con)
	{
	document.getElementById("emails").value = document.getElementById("emails").value + con.value + ",";
	}
	function listbox_selectall(listID, isSelect) {
        var listbox = document.getElementById(listID);
        for(var count=0; count < listbox.options.length; count++) {
            listbox.options[count].selected = isSelect;
    }
}
 function getval(sel) {
document.getElementById('emails').value = document.getElementById('emails').value + sel.value + ",";
	       }
	
	</script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      
 <?php include "component/header.php" ?> <!-- header --->
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "component/sidebar.php" ?> <!-- sidebar --->

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           E-Mail Sending
            <small>send all mails here</small>
          </h1>
          
        </section>

        <!--check box table content -->
        <!-- /.content -->
        <!----- CK editor--->
        <section class="content">
          <div class="row">
            <div class="col-md-8">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Mail Sender <small>Advanced mail sending system</small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <form method="post" action="submit_mail.php">
                  
                <textarea  id="emails" name="to"  class="col-md-12" required > </textarea><div class="clearfix" ></div><br>
                <input  name="sub"  class="col-md-12 form-control" placeholder="Subject" required ><div class="clearfix" ></div><br>
                    <textarea id="editor1" name="msg" rows="10" cols="80" required></textarea><div class="clearfix" ></div><br>
                    <button class="btn btn-success pull-right"  type="submit"> Send </button>
                  </form>
                </div>
              </div><!-- /.box -->
              

              
            </div><!-- /.col-->
            <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Choose pending customer </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div style="height:586px;"  class="box-body pad">
            	 
                	<select class="form-control" size="25" multiple id="listselect" onchange="getval(this);"> 
                    	<optgroup label="Pending" >
						<?php
						$listres = mysql_query("SELECT `cust_email` FROM `order_details` WHERE `transaction_status`=0");
						while($listrow = mysql_fetch_row($listres)){			 
						 ?> 
                         <option value="<?php echo $listrow[0] ?>" ><?php echo $listrow[0] ?></option>
                         
                         <?php } ?>
                         </optgroup>
                         <optgroup label="Success" >
						<?php
						$listres = mysql_query("SELECT `cust_email` FROM `order_details` WHERE `transaction_status`=1");
						while($listrow = mysql_fetch_row($listres)){			 
						 ?> 
                         <option value="<?php echo $listrow[0] ?>" ><?php echo $listrow[0] ?></option>
                         
                         <?php } ?>
                         </optgroup>
                         <optgroup label="Charge Back" >
						<?php
						$listres = mysql_query("SELECT `cust_email` FROM `order_details` WHERE `transaction_status`=2");
						while($listrow = mysql_fetch_row($listres)){			 
						 ?> 
                         <option value="<?php echo $listrow[0] ?>" ><?php echo $listrow[0] ?></option>
                         
                         <?php } ?>
                         </optgroup>
                            <optgroup label="Refund" >
						<?php
						$listres = mysql_query("SELECT `cust_email` FROM `order_details` WHERE `transaction_status`=3");
						while($listrow = mysql_fetch_row($listres)){			 
						 ?> 
                         <option value="<?php echo $listrow[0] ?>" ><?php echo $listrow[0] ?></option>
                         
                         <?php } ?>
                         </optgroup>
                    </select>
                    
                     <br>
                    
                   <!-- <button class="btn btn-success col-md-4" id="selectallbtn" onClick="listbox_selectall('listselect',true)"> Select All</button> <button class="btn btn-danger col-md-4 pull-right"  onClick="listbox_selectall('listselect',false)">Deselect All</button>
             -->
                </div>
            </div>
          </div>
          </div><!-- ./row -->
        </section>

        
        
        <!----- CK editor--->
        
      </div><!-- /.content-wrapper -->

         <?php include "component/footer.php"; ?>

      
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
    <script src="plugins/inputtags/inputTags.jquery.js"></script> 
	
     <script>
      $(function () {
		  
       $("#example1").DataTable();
	   
	 
     
		
      });
    </script>
     <!-- CK Editor -->
    <script src="http://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
    
    <script src="plugins/selectable-list/jquery.selectable-list.js"> </script>
    <script>
        $(function(){
            $("#example1").selectableList({
				
			});
        });
    </script>
   
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        
      });
    </script>
    

  </body>
</html>
<?php } ?>
