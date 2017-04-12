
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php 
function sendotp($code){
$to = 'akibkhan2@gmail.com,gksingh01@gmail.com';
			
			$subject = 'Logging as admin OTP varification of Flydigital LLC';
			
			$headers = "From: no-reaply@flydigital.us \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = "your OTP is ".$code;
            if (mail($to, $subject, $message, $headers)) {
              //echo 'Your message has been sent.';
            } else {
             // echo 'There was a problem sending the email.';
            }
}
function gencode()
{
	return substr(str_shuffle("0123456789"),1,7);
}

?>
<script>
function matchotp(s,d)
{
	if(s==d)
	{
		return true;	
	}
	else
	{
		alert("invalid otp");
		return false;
	}
	
}
</script>

  </head>
  <?php //$code=gencode();
//sendotp($code);?>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.html"><b>Login</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body"  style="border-top:#3C8DBC 3px solid; border-radius:4px 4px 0 0; box-shadow:#888888 5px 5px 8px;">
      	<div align="center" style="border:#3C8DBC 4px double; border-radius:50%; padding:5px; width:71px; height:85px; margin:0 auto; color:#3C8DBC;"> 
        	<i class="fa fa-user fa-4x"></i> 
        </div>
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="logging_in.php" method="post" >
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="uname">
            <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
          </div>
          
          <div class="row">
            <div class="col-xs-8">
               <a href="#">I forgot my password</a>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
