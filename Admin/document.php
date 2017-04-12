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
            Document
            <small> see all your document here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              <form class="form-horizontal" action="upload_doc.php" method="post" enctype="multipart/form-data">
                    
                     <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Subject</label>
                        <div class="col-sm-10">
                         
                          <input name="sub" placeholder="Subject" id="inputExperience" class="form-control" type="text" required>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Description</label>
                        <div class="col-sm-10">
                          <textarea name="desc" placeholder="Description" id="inputExperience" class="form-control" required></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Upload </label>
                        <div class="col-sm-10">
                          <!--<textarea placeholder="Address" id="inputExperience" class="form-control"></textarea>-->
                          <input type="file" name="upldoc" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" type="submit">Send</button>
                        </div>
                      </div>
                    </form>
                    <legend> List of Documents </legend>
                    <div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Uploader</th>
                        <th>Date</th>
                        <th>Download</th>
                        <th>Control</th>
                      </tr>
                    </thead>
                    <tbody> 
                    	 <?php 
					$fetchdocstr = "SELECT * FROM document_details  order by upload_date desc ";
					$fetchdocres = mysql_query($fetchdocstr);
					while($fetchrow = mysql_fetch_row($fetchdocres)){
							
					?>
                    <tr>
                        <td><?php echo $fetchrow[1] ?> </td>
                        <td><?php echo $fetchrow[2] ?></td>
                        <td><?php echo $fetchrow[5] ?></td>
                        <td><?php echo $fetchrow[4] ?></td>
                        <td><a href="<?php echo $fetchrow[3] ?>"> <i class="fa fa-download"></i> Download</a></td>
                      
                        <td>
                        	<a href="deldoc.php?id=<?php echo $fetchrow[0] ;?>&doc_url=<?php echo $fetchrow[3] ;?>"> <i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    	
                      <?php  } ?>
                        
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Uploader</th>
                        <th>Date</th>
                        <th>Download</th>
                        <th>Control</th>
                      </tr>
                    </tfoot>
                  </table>
                  
            </div><!-- /.box-body -->
            
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