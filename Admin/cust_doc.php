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
    <title>Document</title>
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
    
    <SCRIPT LANGUAGE="JavaScript">
<!-- 	
<!-- Begin
function CheckAll(chk)
{
for (i = 0; i < chk.length; i++)
	chk[i].checked = true ;
}

function UnCheckAll(chk)
{
for (i = 0; i < chk.length; i++)
	chk[i].checked = false ;
}
//  End -->
</script>
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
             Customer Document
            <small> see all your document here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              
                    <legend> List of customers Documents </legend>
                    <div>
                <!-- /.box-header -->
                <!--<input type="button" name="Check_All" value="Check All"
onClick="CheckAll(document.myform.check_list)">
<input type="button" name="Un_CheckAll" value="Uncheck All"
onClick="UnCheckAll(document.myform.check_list)">-->
               <form name="myform">
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <!--<th>Select</th>-->
                        <th>sl no</th>
                        <th>Mail</th>
                        <th>Phone</th> 
                        <th>Decription</th>
                        <th>Date</th>
                        <th>Download</th>
                      
                      </tr>
                    </thead>
                    <tbody> 
                    	 <?php 
		
					$fetchdocstr = "SELECT * FROM `cust_doc` ";
					$fetchdocres = mysql_query($fetchdocstr);
					while($fetchrow = mysql_fetch_array($fetchdocres)){
					$name=$fetchrow['doc_src'];	
					//$name =strtoupper(md5(date('r')).rand());	
					
					?>
                    <tr>
                        <!--<td><input type="checkbox" name="check_list[]" value="<?php echo $fetchrow['doc_id'] ?> "></td>-->
                        <td><?php echo $fetchrow[0] ?> </td>
                        <td><?php echo $fetchrow[1] ?></td>
                        <td><?php echo $fetchrow[5] ?></td>
                        <td><?php echo $fetchrow[2] ?></td>
                        <td><?php echo $fetchrow[4] ?></td>
                        <td>
                        	<i class="fa fa-download"></i> 
                        		<a href="download.php?filename=<?php echo $name;?>" >Download</a>
                            
                            </td>
                      
                      
                      </tr>
                    	
                      <?php  } ?>
                        
                    </tbody>
                    <tfoot>
                      <tr>
                      <!--<th>Select</th>-->
                      <th>sl no</th>
                        <th>Mail</th>
                        <th>Phone</th> 
                        <th>Decription</th>
                        <th>Date</th>
                        <th>Download</th>
                      
                      </tr>
                    </tfoot>
                  </table>
                  
            </div><!-- /.box-body -->
           <!--- <a class="btn btn-primary" href="zip_download.php" >Download as Zip</a> --->
            </form>
            
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
  </body>
</html>
<?php } ?>