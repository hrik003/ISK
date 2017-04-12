<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else
{
	$user  = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact List</title>
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
            Enlist Contacts
            <small> see all your contacts here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              <form class="form-horizontal" method="post" action="insert_contact.php">
                    
                       <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Name</label>
                        <div class="col-sm-10">
                         
                          <input placeholder="Name" id="name" name="name" class="form-control" type="text">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Company Name</label>
                        <div class="col-sm-10">
                         
                          <input placeholder="Company" id="compname" name="compname" class="form-control" type="text">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Address</label>
                        <div class="col-sm-10">
                          <textarea placeholder="Address" id="addr" name="addr" class="form-control"></textarea>
                        </div>
                      </div>
                      
                     
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Home Phone No.</label>
                        <div class="col-sm-10">
                         
                          <input placeholder="Home Phone" id="hmph" name="hmph" class="form-control" type="text">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Work Phone No.</label>
                        <div class="col-sm-10">
                         
                          <input placeholder="Work Phone" id="wrkph" name="wrkph" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">E-mail ID</label>
                        <div class="col-sm-10">
                         
                          <input placeholder="E-mail" id="email" name="email" class="form-control" type="email">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" type="submit">Save</button>
                        </div>
                      </div>
                    </form>
                    <legend> List of Contacts </legend>
                    <div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Home Phone</th>
                        <th>Work Phone</th>
                        <th>E-mail</th>
                        <th>Control</th>
                      </tr>
                    </thead>
                    <tbody> 
                    <?php $showqry  = mysql_query("SELECT * FROM contact_list WHERE  `contact_user` = '$user' ") ;
					while($row = mysql_fetch_row($showqry))
					{
					?>
                    	<tr>
                        <td><a href="edit_contact.php?id=<?php echo $row[0] ?>"><?php echo $row[1] ?></a></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td>
                        	<a href="del_contact.php?id=<?php echo $row[0] ?>" onClick="return confirm('are you sure?')"> <i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                      <?php
					}
					?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Home Phone</th>
                        <th>Work Phone</th>
                        <th>E-mail</th>
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
</html><?php } ?>
