<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>Contact</title>

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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script type="text/javascript" src="js/gmap3.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<?php include "component/header.php"?>
		<!-- End Header -->

		<!-- map 
			================================================== -->
		<div class="gap"></div>
		<!-- map -->

		<!-- contact section 
			================================================== -->
		<section class="contact-section">
			<div class="container">
				<div class="col-md-4">
					<div class="contact-info">
						<h2>Contact Info</h2>
						<p>You can contact us</p>
						<ul class="information-list">
                            <li><i class="fa fa-building"></i><span>ISK Business Technology LLC.</span></li>
							<li><i class="fa fa-map-marker"></i><span>2942 AVE R,Brooklyn Ny 11229</span></li>
							<li><i class="fa fa-phone"></i><span>(866)5467183 </span></li>
							<li><i class="fa fa-envelope-o"></i> <span>support@iskbusinesstechnology.com </span></li>
						</ul>						
					</div>
				</div>
				<div class="col-md-8">
					<form name="contact-form" id="contact-form" method="post" action="contact-form.php" role="form">
						<h2>Send us a message</h2>
						<div class="row">
							<div class="col-md-6">
								<input name="name" id="name" type="text" placeholder="Name">
							</div>
							<div class="col-md-6">
								<input name="email" id="email" type="text" placeholder="Email">
							</div>
						</div>
						<textarea name="msg" id="msg" placeholder="Message"></textarea>
                        <!--<input type="submit" name="submit_contact" id="submit_contact">--><button class="btn btn-primary solid blank" type="submit" name="submit">Send Message</button> 
						<!--<input type="submit" name="submit_contact" id="submit_contact" value="Send Message">-->
						<!--<div id="msg" class="message"></div>-->
					</form>
				</div>
			</div>
		</section>
		<!-- End contact section -->

		<!-- footer 
			================================================== -->
			<?php include "component/footer.php"?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
</body>

</html>