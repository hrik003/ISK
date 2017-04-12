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
	<title>Quick</title>

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
						<h2>Quick</h2>
					</div>
					<div class="col-md-6">
						<ul class="page-depth">
							<li><a >ISK BUSINESS TECHNOLOGY LLC</a></li>
							<li><a>Quick </a></li>
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
							
							<h3>Quick </h3>
                            <h2> $10</h2>
							
							<p> Remote Tech Support </p>
                            <p>$5 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 10); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=3c14abcbaa924ba8bc40fdce2b5173a9&bn=1
'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $15</h2>
							
							<p> Remote Tech Support </p>
                            <p>$10 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 15); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=935e4d6d742046fd9f0fcb1a309992e8&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $20</h2>
							
							<p> Remote Tech Support </p>
                            <p>$15 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 20); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=f1e5ca025b544294bc730825c608a110&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $25</h2>
							
							<p> Remote Tech Support </p>
                            <p>$20 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 25); ?>'"> Buy Now </button>
                           <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=999237fe3fcd435cbe63fdfee01ba703&bn=1'">> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $30</h2>
							
							<p> Remote Tech Support </p>
                            <p>$25 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=Basic+plan&price=30<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 30); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=c504efd13e0e49d282a5445f0bec3a84&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $35</h2>
							
							<p> Remote Tech Support </p>
                            <p>$30 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 35); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=19cd87d704c24ac2ada12e935a19e4a6&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $40</h2>
							
							<p> Remote Tech Support </p>
                            <p>$35 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 40); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=3b5902d3b9aa447fa8882436b4d510bc&bn=1'">
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $45</h2>
							
							<p> Remote Tech Support </p>
                            <p>$40 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 45); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=aa33fe5e7c0345729f6e4bd9b430a9c3&bn=1'">
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $50</h2>
							
							<p> Remote Tech Support </p>
                            <p>$45 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=Basic+plan&price=50<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 50); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=cb5e3d3240fa41deaddc9658e5ac5beb&bn=1'">
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $55</h2>
							
							<p> Remote Tech Support </p>
                            <p>$50 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 55); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=c544809ca909478fbe150744febb3c9d&bn=1'">
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $60</h2>
							
							<p> Remote Tech Support </p>
                            <p>$55 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 60); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=76949fd8713b41fea8fff9446342e202&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $65</h2>
							
							<p> Remote Tech Support </p>
                            <p>$60 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 65); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=367448b2c84e48c3bd088e8d2babc940&bn=1'">
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $70</h2>
							
							<p> Remote Tech Support </p>
                            <p>$65 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 70); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=209c572634074bb399794ae221f1bebf&bn=1'">
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $75</h2>
							
							<p> Remote Tech Support </p>
                            <p>$70for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 75); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=d810b2126fe64f0185b6ce8dedfed455&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $80</h2>
							
							<p> Remote Tech Support </p>
                            <p>$75 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 80); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=1044f72f00c147dfb33ebe77d4047f45&bn=1'"> 
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
                    <div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $85</h2>
							
							<p> Remote Tech Support </p>
                            <p>$80 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 85); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=97211b4b906a4e81a0673774dcb50900&bn=1'">
                            --- CHECK OUT --- 
                            </button>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-md-3">
						<div align="center" class="price-post">
							
							<h3>Quick </h3>
                            <h2> $90</h2>
							
							<p> Remote Tech Support </p>
                            <p>$85 for support <br> & <br> $4.99 for Cyber Insurance  </p>
                            <button class="btn btn-default" onClick="window.location='cart_reg.php?plan_name=<?php echo encryptor('encrypt', 'Quick plan'); ?>&price=<?php echo encryptor('encrypt', 90); ?>'"> Buy Now </button>
                            <br>
                            <button class="btn btn-default" onclick="window.location='http://www.mcssl.com/SecureCart/SecureCart.aspx?mid=8A52C1B4-1F69-40B2-BB92-66DBEE9AF91C&pid=2a3974defd834f23b26ee16fd1e341c1&bn=1'"> 
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