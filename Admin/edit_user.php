<?php include "component/config.php"; 
$user = $_GET['user'];
$detailstr = "SELECT * FROM user_details WHERE username = '$user'";
$detailres = mysql_query($detailstr);
$detailrow  = mysql_fetch_row($detailres);

?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Page</title>
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
            Edit
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active">Edit</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div>
         		<div class="box" style="padding:20px;"> 
                	<form class="form-horizontal" method="post" action="mod_user.php">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="uname">Username</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?php echo $detailrow[0]?>" placeholder="Username" id="uname" name="uname" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">Name</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?php echo $detailrow[1]?>" placeholder="Name" id="name" name="name" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="aname">Alias Name</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?php echo $detailrow[2]?>" placeholder="Alias Name" id="aname" name="aname" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">Email</label>
                        <div class="col-sm-10">
                          <input type="email" value="<?php echo $detailrow[3]?>" placeholder="Email" id="email" name="email" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="ph">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?php echo $detailrow[4]?>" placeholder="Phone" id="ph" name="ph"class="form-control">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="addr">Address</label>
                        <div class="col-sm-10">
                          <textarea placeholder="Address"  id="addr" name="addr" class="form-control"><?php echo $detailrow[6]?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="role" class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-10">
                          <!--<input type="text" placeholder="Skills" id="inputSkills" class="form-control">-->
                          <input type="text" class="form-control" value="<?php echo $detailrow[7]?>" id="role" name="role" placeholder="Role" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="role" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <!--<input type="text" placeholder="Skills" id="inputSkills" class="form-control">-->
                          <input type="text" class="form-control" value="<?php echo $detailrow[5]?>" id="role" name="role" placeholder="Role" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Save Changes</button>
                          <button type="button" class="btn btn-danger" onClick="window.location='user_master.php'">Cancel</button>
                          <button type="button" class="btn btn-danger pull-right" onClick="window.location='deluser.php?user=<?php echo $detailrow[0]?>'">Delete</button>
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
  </body>
</html>
<?php } ?>