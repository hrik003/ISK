<?php include "component/config.php" ?>
<?php
session_start();
if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}else
{
	$user =$_SESSION['user'];
$detailstr = "SELECT * FROM user_details WHERE username = '$user'";
$detailres = mysql_query($detailstr);
$detailrow  = mysql_fetch_row($detailres);


$fullname  =  $detailrow[1];
$aliasname   =  $detailrow[2];
$email   =  $detailrow[3];
$phone   =  $detailrow[4];
$pass  =  $detailrow[5];
$address   =  $detailrow[6];
$role   =  $detailrow[7];
$prof_pic   =  $detailrow[8];
$reg_date   =  $detailrow[9];

	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> User Profile</title>
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
    <script>
	function con_pass(source,dest)
	{
	if(source.vale!=dest.value)
	{
	
return false;
	alert("confirm the password");
	}
	else{
		return true;		
	}
	}
	
	</script>
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        
   <?php include "component/header.php"; ?> <!-- header --->
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include "component/sidebar.php"; ?> <!-- sidebar --->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Profile
          </h1>
       
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img alt="User profile picture" src="dist/img/avatar.png" class="profile-user-img img-responsive img-circle">
                  <h3 class="profile-username text-center"><?php echo  $fullname ;?></h3>
                  <p class="text-muted text-center"><?php echo  $role ;?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Alias Name</b> <a class="pull-right"><?php echo $aliasname ?> </a>
                    </li>
                    <li class="list-group-item">
                      <b>E-mail ID</b> <a class="pull-right"><?php echo  $email ;?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone No.</b> <a class="pull-right"><?php echo  $phone ;?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Address</b> <a class="pull-right"><?php echo  substr($address ,0,12) ;?></a>
                    </li>
                  </ul>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#sales" aria-expanded="true">Change Password</a></li>
                  <li><a data-toggle="tab" href="#settings" aria-expanded="false">Edit Profile</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div id="sales" class="tab-pane active">
                  	<div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<form class="form-horizontal"  action="mod_pass.php" method="post">
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputName">Current Password</label>
                        <div class="col-sm-9">
                        <input type="hidden" value="<?php echo $pass ?>" name="chkpass">
                        <input type="password" placeholder="Current password" id="curr_pass" name="curr_pass" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputName">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" placeholder="New password" id="pass" name="pass" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputName">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" placeholder="Confirm password" id="con_pass" name="con_pass" class="form-control">
                        </div>
                        
                      </div>
                      <button type="submit" class="btn btn-danger pull-right">Change </button>
                    </form>
                </div><!-- /.box-body -->
              </div>
              		
                  </div><!-- /.tab-pane 1 -->
                

                  <div id="settings" class="tab-pane ">
                    <form class="form-horizontal" method="post" action="mod_profile.php">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputName">Name</label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="Name"  value="<?php echo $fullname ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputName">Alias Name</label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="Alias Name"  value="<?php echo $aliasname ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputEmail">Email</label>
                        <div class="col-sm-10">
                          <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email ?>" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputName">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="Phone" id="phone" name="ph" value="<?php echo $phone; ?>" class="form-control">
                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label class="col-sm-2 control-label" for="inputName">Password</label>
                        <div class="col-sm-10">
                          <input type="password" placeholder="Password" id="inputName" class="form-control">
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputExperience">Address</label>
                        <div class="col-sm-10">
                          <textarea placeholder="Address" id="address" name="addr" class="form-control"><?php echo $address ?></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" type="submit">Save</button>
                        </div>
                      </div>
                    </form>
                    
                  </div><!-- /.tab-pane 2 -->
                  
                 
                  
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
       <?php include "component/footer.php" ?>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
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