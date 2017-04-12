<!doctype html>
<?php
function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'arijit';
    $secret_iv = 'arijit003';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
    	//decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}
?>

<html lang="en" class="no-js">
<head>
	<title>Basic</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/plugins-scroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
    
</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<?php include "component/header.php" ?>
		<!-- End Header -->
	
		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Basic</h2>
					</div>
					<div class="col-md-6">
						<ul class="page-depth">
							<li><a >ISK BUSINESS TECHNOLOGY LLC</a></li>
							<li><a>Basic </a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- End page-banner section -->
		<p> &nbsp </p>
		<!-- price section 
			================================================== -->
		<section class="price-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Basic </h3>
                            <h2> $299</h2>
							
							<p> Remote Tech Support </p>
                            <p>25 Times Free Services </p>
                            <p>Valid For 6 Months</p>
                            <p> Optimization </p>
                            <p> Diagnosis & Repair </p>
                            <p> Email Support  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Basic plan'); ?>&price=<?php echo encryptor('encrypt', 299); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=6e75492358a84816a6f7ef7a2cd372b3&bn=1'"> --- CHECK OUT --- </button>
						</div>
					</div>
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Basic </h3>
                            <h2> $350</h2>
							
							<p> Remote Tech Support </p>
                            <p>30 Times Free Services </p>
                            <p>Valid For 6 Months</p>
                            <p> Optimization </p>
                            <p> Diagnosis & Repair </p>
                            <p> Email Support  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Basic plan'); ?>&price=<?php echo encryptor('encrypt', 350); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=3b0577d5b4cb4e93812bba0627c57640&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Basic </h3>
                            <h2> $400</h2>
							
							<p> Remote Tech Support </p>
                            <p>35 Times Free Services </p>
                            <p>Valid For 6 Months</p>
                            <p> Optimization </p>
                            <p> Diagnosis & Repair </p>
                            <p> Email Support  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Basic plan'); ?>&price=<?php echo encryptor('encrypt', 400); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=57e5a90b48564acf8e74af880101cafc&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Basic </h3>
                            <h2> $450</h2>
							
							<p> Remote Tech Support </p>
                            <p>35 Times Free Services </p>
                            <p>Valid For 6 Months</p>
                            <p> Optimization </p>
                            <p> Diagnosis & Repair </p>
                            <p> Email Support  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Basic plan'); ?>&price=<?php echo encryptor('encrypt', 450); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=fbe221863363454da8135a73910efddc&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
				</div>
				
			</div>
		</section>
		<!-- End team section -->

		<!-- footer 
			================================================== -->
		<?php include "component/footer.php" ?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
</body>
</html>