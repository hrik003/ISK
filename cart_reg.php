<?php include "component/config.php" ?>
<?php
//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
<?php 

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR']; 
    }
    return $ip;
}

?>
<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>Register</title>
  <!----------SIG FONT --->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Niconne">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calligraffitti">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Homemade+Apple">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cedarville+Cursive">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rock+Salt">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pinyon+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Marck+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bad+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calligraffitti">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Reenie+Beanie">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Parisienne">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Satisfy">
    
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

	<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/plugins-scroll.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script type="text/javascript" src="js/gmap3.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
     <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.js" ></script>
     <script src="assets/js/writeinit.js"></script>
<script>
$(document).ready(function(e) {
	/// auto fill
	$("#name").change(function(){$("#sh_name").val($(this).val());} );
	$("#company").change(function(){$("#sh_company").val($(this).val());} );
	$("#addr").change(function(){$("#sh_address").val($(this).val());} );
	$("#city").change(function(){$("#sh_city").val($(this).val());} );
	$("#state").change(function(){$("#sh_state").val($(this).val());} );
	$("#zip").change(function(){$("#sh_zip").val($(this).val());} );
	
	
	/// tab 
		
		 $("#cc_tab").click(function(){
		$("#paymode").val('0');
		});
	    $("#ec_tab").click(function(){
					$("#paymode").val('1');
			});
		    $("#dc_tab").click(function(){
						$("#paymode").val('2');
				});
			    $("#ft_tab").click(function(){
							$("#paymode").val('3');
					});
	
	//signature write  in it
    changesig('write name');
	$("#btnchangefont").click(function(){
		
		changesig($("#writesig").val());
		
		});
});

	function getImg()
	{
		var sdata =  document.getElementById("sigdata");
		sdata.value =document.getElementById("Canvas").toDataURL("images/png");
		alert("Signature successfully saved");
	}
	</script>
    
    <script>
function show() {
      var name = document.getElementById('name').value;
      var result = name;
      if (result) {
         document.getElementById('sh_name').value = result;
      }
}

function show1() {
      var company = document.getElementById('company').value;
      var result = company;
      document.getElementById('sh_company').value = result;
    
}

function show2() {
      var addr = document.getElementById('addr').value;
      var result = addr;
      if (result) {
         document.getElementById('sh_address').value = result;
      }
}

function show3() {
      var city = document.getElementById('city').value;
      var result = city;
      document.getElementById('sh_city').value = result;

}

function show4() {
      var state1 = document.getElementById('state').options[state.selectedIndex].value;
	  //alert (state1);
      document.getElementById('sh_state').value = state1;

}

function show5() {
      var zip = document.getElementById('zip').value;
      var result = zip;
      document.getElementById('sh_zip').value = result;

}
</script>
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
				<h2 align="center" style="color:#0C68C9; font-size:25px; text-decoration:underline;"> Registration Form </h2>
				<div class="col-md-12">
					<form  action="" method="post" name="contact-form" id="contact-form" >
						<h2> Personal Details </h2>
						<div class="row">
							<div class="col-md-4">
                            	<label> Name </label>
								<input name="name" id="name" type="text" placeholder="Name" onkeyup="show();" required>
							</div>
							<div class="col-md-4">
                            	<label> Email </label>
								<input name="email" id="email" type="email" placeholder="Email" required>
							</div>
                            <div class="col-md-4">
                            	<label> IP Address </label>
								<input name="ip" id="ip" type="text" placeholder="IP Address" readonly  value="<?php echo getRealIpAddr(); ?>">
							</div>
                            <div class="col-md-4">
                            	<label> Company </label>
								<input name="company" id="company" type="text" placeholder="Company" onkeyup="show1();" required>
							</div>
                            <div class="col-md-4">
                            	<label> Phone No. </label>
								<input name="phone"  type="password" placeholder="Phone No." required>
							</div>
                            <div class="col-md-4">
                            	<label> Alternate No. </label>
								<input name="alt_phn"  type="password" placeholder="Alternate No." required>
							</div>
                            <div class="col-md-4">
                            	<label> FAX </label>
								<input name="fax"  type="text" placeholder="FAX" required>
							</div>
                            <div class="col-md-4">
                            	<label> Address </label>
								<input name="addr"  id="addr" type="text" placeholder="Address" onkeyup="show2();" required>
							</div>
                            <div class="col-md-4">
                            	<label> City </label>
								<input name="city" id="city" type="text" placeholder="City" onkeyup="show3();" required>
							</div>
                            <div class="col-md-4">
                            	<label> Zip </label>
								<input name="zip"  id="zip" type="password" placeholder="Zip" onkeyup="show5();" required>
							</div>
                            <div class="col-md-4">
                            	<label> Country </label>
								<select id="country" name ="country" required></select>
							</div>
                            <div class="col-md-4">
                            	<label> State </label>
								<select name ="state" id ="state" onchange="show4();" required></select>
                        		<input type="hidden" name="place" value="na">
							</div>
						</div>
                        
                        <h2> Password Details</h2>
                        <div class="row"> 
                        	 <div class="col-md-4">
                            	<label> Password </label>
								<input name="pass" type="password" placeholder="Password" required>
							</div>
                             <div class="col-md-4">
                            	<label> Re-enter Password </label>
								<input name="repass" type="password" placeholder="Re-enter Password" required>
							</div>
                            <div class="clearfix"> </div>
                             <div class="col-md-4">
                            	<label> Security Question </label>
								<select name ="sequ_question" required>
                                    <option value=" MOTHERS MAIDEN NAME"> Mother's maiden name</option>
                                    <option value="FIRST PET NAME/NAME OF THE FIRST SCHOOL ">First pet's name/Name of the first school</option>
                                    <option value="BEST FRIEND NAME ">Best friend's name </option>
                                </select>
							</div>
                             <div class="col-md-4">
                            	<label> Your Answer </label>
								<input name="sequ_answer" type="text" placeholder="Answer" required>
							</div>
                        </div>
                        
                        <h2> Other Details </h2>
                        <div class="row"> 
                        	 <div class="col-md-4">
                            	<label> Agent </label>
								<select name ="agent" placeholder="Agent" required>
                                  <option value="">Select Agent</option>
		<?php
		$fetchagent = mysql_query("SELECT * from `user_details` where role='agent'");
		while($agent = mysql_fetch_row($fetchagent))
		{		
		?>
		<option value="<?php echo $agent[0] ?>"><?php echo $agent[0] ?></option>
		<?php } ?>
                                
                                </select>
							</div>
                             <div class="col-md-4">
                            	<label> How many computers are covered </label>
								<input type="number" placeholder="Computers" name="com_no" required min="1" max="10" value="1">
							</div>
                            <div class="clearfix"> </div>
                             <div class="col-md-4">
                            	<label> How many years are covered  </label>
								<input type="number" placeholder="Years" name="plan_yr" required min="1" max="10" value="1">
							</div>
                             <div class="col-md-4">
                            	<label> Plan Price </label>
								<input type="text" readonly value="<?php echo encryptor('decrypt', $_GET['price']); ?>">
							</div>
                        </div>
                        
                        <h2> Shipping Details </h2>
                        <div class="row"> 
                        	<div class="col-md-4">
                            	<label> Name </label>
								<input name="sh_name" id="sh_name" type="text" placeholder="Name" >
							</div>
                            <div class="col-md-4">
                            	<label> Company </label>
								<input name="sh_company" id="sh_company" type="text" placeholder="Company">
							</div>
                            <div class="col-md-4">
                            	<label> Address </label>
								<input name="sh_address" id="sh_address" type="text" placeholder="Address">
							</div>
                            <div class="col-md-4">
                            	<label> City </label>
								<input name="sh_city" id="sh_city" type="text" placeholder="City">
							</div>
                            <div class="col-md-4">
                            	<label> State </label>
								<input name="sh_state" id="sh_state" type="text" placeholder="State">
							</div>
                            <div class="col-md-4">
                            	<label> Zip Code </label>
								<input name="sh_zip" id="sh_zip" type="password" placeholder="Zip Code">
							</div>
                        </div>
                        
                        <h2> Payment </h2><input type="hidden" id="paymode" name="paymode" value="0" > 
                        <div class="row"> 
                        	<div class="col-md-12">

								<!-- Nav tabs -->
								<div class="tab-posts-box">
							<ul id="tabs" class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#option1"  id="cc_tab">Credit Card</a>
								</li>
								<li>
									<a data-toggle="tab" href="#option2"  id="ec_tab">E-check</a>
								</li>
								<li>
									<a data-toggle="tab" href="#option3"  id="dc_tab">Debit Card</a>
								</li>
							</ul>

							<div class="tab-content">
								<div id="option1" class="tab-pane active">
									 <div class="col-lg-3">
 				 						<label>Name on Card:</label>
                 				 		<input type="text" required name="cr_cardname" placeholder="Name" id="cr_cardname"  >
                                     </div>
                                     
            						 <div class="col-lg-3">
                                         <label>Card type:</label>
                                         <select required name="cr_cardtype" id="cr_cardtype" aria-required="true"> 
                                            <option selected="selected" value="Visa"> Visa</option>
                                            <option value="Mastercard">Mastercard</option>
                                            <option value="Amex">Amex</option>
                                            <option value="Discover">Discover</option>
                                            <option value="Bank">Bank</option>
                                            <option value="JCB">JCB</option>
                                            <option value="Diners Club">Diners Club</option>
                                            <option value="Visa Debit/Delta">Visa Debit/Delta</option>
                                         </select>
                                    </div>
                                    
                                     <div class="col-lg-3">
                                         <label for="cr_cardno">Card No.:</label>
                                         <input type="text" required name="cr_cardno" placeholder="card no." id="cr_cardno"  >
                                     </div>
                                     
                                     <div class="col-lg-3">
                                         <label for="cr_cvv">CVV No.:</label>
                                         <input type="password" required name="cr_cvv" placeholder="cvv no." id="cr_cvv" >
                                     </div>
                                     
                                     <h2 class="col-md-12">Expiration Date:</h2> 
                                         
                                     <div class="col-md-4">
										<input type="number" placeholder="month" min="1" max="12" name="cr_expmonth"  required> 
                                     </div>
                                     <div class="col-md-4">
                                         <input type="number" placeholder="year" required name="cr_expyear" id="year"  >
                                     </div>     
                                            
                                        
								</div> <!--- tab 1 --->
                                
                                
								<div id="option2" class="tab-pane">
                                	<div class="row">
									 <div class="col-md-8">
                        	<div class="col-lg-6">
 				 				<label for="usr">Name of the Bank:</label>
 				 				<input type="text" required name="ec_bankname" placeholder="Bank Name" id="ec_bankname" >
							</div>
                            <div class="col-lg-6">
 				 				<label for="usr">Your Name:</label>
 				 				<input type="text" required name="ec_name" placeholder="Name" id="ec_name" >
							</div>
                            <div class="col-lg-6">
 				 				<label for="usr">Account No.:</label>
 				 				<input type="text" required name="ec_acno" placeholder="A/c No." id="ec_acno" >
							</div>
                            <div class="col-lg-6">
 				 				<label for="usr">Transit No.:</label>
 				 				<input type="text" required name="ec_transitno" placeholder="Transit No." id="ec_transitno">
							</div>
                            <div class="col-lg-6">
 				 				<label for="usr">Check No.:</label>
 				 				<input type="text" required name="ec_chno" placeholder="Check No." id="ec_chno" >
							</div>
                            </div>
                            
                            <div class="col-md-4">
                            <label> Specimen of Check  </label>
                            <img alt="check" src="images/boa_chk.png">
							
                       		</div>
                           	</div>
							</div>	<!--- tab 2 --->
                                
                                
								<div id="option3" class="tab-pane">
									 <div class="col-lg-3">
 				 						<label>Name on Card:</label>
                 				 		<input type="text" required name="dc_cardname" placeholder="Name" id="dc_cardname"  >
                                     </div>
                                     
            						 <div class="col-lg-3">
                                         <label>Card type:</label>
                                         <select required name="dc_cardtype" id="dc_cardtype"> 
                                            <option selected="selected" value="Visa"> Visa</option>
                                            <option value="Mastercard">Mastercard</option>
                                            <option value="Amex">Amex</option>
                                            <option value="Discover">Discover</option>
                                            <option value="Bank">Bank</option>
                                            <option value="JCB">JCB</option>
                                            <option value="Diners Club">Diners Club</option>
                                            <option value="Visa Debit/Delta">Visa Debit/Delta</option>
                                         </select>
                                    </div>
                                    
                                     <div class="col-lg-3">
                                         <label for="cr_cardno">Card No.:</label>
                                         <input type="text" required name="dc_cardno" placeholder="card no." id="dc_cardno" >
                                     </div>
                                     
                                     <div class="col-lg-3">
                                         <label for="cr_cvv">CVV No.:</label>
                                         <input type="password" required name="dc_cvv" placeholder="cvv no." id="dc_cvv" >
                                     </div>
                                     
                                     <h2 class="col-md-12">Start Date:</h2> 
                                         
                                     <div class="col-md-4">
										<input type="number" placeholder="month" min="1" max="12" required name="dc_startmonth" id="dc_startmonth"> 
                                     </div>
                                     <div class="col-md-4">
                                         <input type="number" placeholder="year" required name="dc_startyear" id="dc_startyear" >
                                     </div>
                                     
                                     <h2 class="col-md-12">Expiration Date:</h2> 
                                         
                                     <div class="col-md-4">
										<input type="number" placeholder="month" min="1" max="12" required name="dc_expmonth" id="dc_expmonth"> 
                                     </div>
                                     <div class="col-md-4">
                                         <input type="number" placeholder="year" required name="dc_expyear" id="dc_expyear" >
                                     </div>    

								</div>	<!--- tab 3 --->
							</div>
						</div>

							</div>
                        </div>
                        
                        
                         <h2> Make your Signature  </h2>
                        <div class="row"> 
                        	<div class="col-md-12">

								<!-- Nav tabs -->
								<div class="tab-posts-box">
							<ul id="myTab" class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#option4">Draw in it</a>
								</li>
								<li>
									<a data-toggle="tab" href="#option5">Type in it</a>
								</li>
								
							</ul>

							<div class="tab-content">
								<div id="option4" class="tab-pane active">
									<div id="signature-pad" class="m-signature-pad" align="center" >
                                        <div class="m-signature-pad--body"  >
                                            <canvas id="drawcan" style="border:solid 1px #C7C7C7;"></canvas>
                                        </div>
                                        <div class="m-signature-pad--footer">
                                        	<p> Please do your Signature above </p>
                                            <a  data-action="clear" class="btn btn-danger" ></i>Clear</a>
                                            <button type="button" class="btn btn-success" data-action="save">Save</button>
                                        </div>
                                	</div>
                                    <p> &nbsp</p>
								</div> <!--- tab 1 --->
                                
                                
							<div id="option5" class="tab-pane">
                                	<input type="text" placeholder="Your Name" style="margin-bottom:10px; width:50%;" id="writesig">           
                            				
                            <div class="clearfix"> </div>
                            <div class="col-md-6" style="border:#DDDDDD 1px solid; padding:10px;"> 
                            	<canvas id="Canvas" width="304" height="154" style="margin:10px 0 10px 4%;"  ></canvas>
    								<div class="clearfix"> </div>
                                     <input type="hidden" id="font_position" value="-1" >
                                    	<button class="btn btn-info pull-left" id="btnchangefont"  type="button">Change Font </button>
                                    	<button class="btn btn-success pull-right" id="btnImage" type="button" onClick="getImg()">Save </button>
                                   
    								<!--<script>
										var canvas=document.getElementById('Canvas');
										var context=canvas.getContext('2d');
										
										
										context.font='20px niconneregular';
										context.textAlign='center';
										context.textBaseline='middle';
										context.fillStyle='black';
										context.lineWidth=2;
										
										context.translate(150,80);
										context.fillText('Gopal Chandra Karmakar', 0, 0);
										//context.strokeText("Earth",0,0);
										context.setTransform(1,0,0,1,0,0);
										
										
										function genimg()
										{
											document.getElementById("textAsImage").src= canvas.toDataURL("images/png");
										}
										
								</script>-->
                                        
                        	</div>
                            <div class="col-md-6"> 
                            	<legend> Read the instructions carefully before doing your signature:</legend>
                               
                                	
                                    <p> 1. Type your name in the above textbox.</p>
                                    <p> 2. Press <img src="images/change_font.png" alt="Change Font"> Button to change the font style.</p>
                                    <p> 3. Press <img src="images/save.png" alt="Save"> Button to do your signature on the documents. </p>
                                
                            </div>
                            <p> &nbsp</p>
							</div>	<!--- tab 2 --->
                                 
							</div>
						</div>

							</div>
                        </div>
                        <input type="hidden" name="sigdata" id="sigdata"> 
                        <h2> Comments/Special Delivery Instructions  </h2>
						<textarea name="comment" id="comment" placeholder="Comment"></textarea>
                        <p align="justify" style="color:#686868; font-size:12px;"> I authorize the Company (866)5467183  to charge me for the order total. I further affirm that the name and personal information provided on this form are true and correct. I further declare that I have read, understand and accept ISK BUSINESS TECHNOLOGY LLC (866)5467183 's business terms as published on their website. By pressing the Submit Order button below, I agree to pay ISK BUSINESS TECHNOLOGY LLC (866)5467183.
                            </p>
						  <input type="hidden" name="price" value="<?php echo encryptor('decrypt', $_GET['price']); ?>" />
        <input type="hidden"  name="plan" value="<?php echo encryptor('decrypt', $_GET['plan_name']);  ?>">
						<div id="msg" class="message"></div>
                        
                         <div class="sec-title">
						<h2><span>Product Description</span></h2>
					</div>
                    <div class="row">
                    	<div class="col-md-8"> 
                        	<table class="table table-responsive table-bordered">
                            	<tr> 
                                	<th> Product Name</th>
                                    <th> Price </th>
                                    
                                </tr>
                                <tr> 
                                 	<td><?php echo encryptor('decrypt', $_GET['plan_name']);  ?></td>
                                    <td><?php echo encryptor('decrypt', $_GET['price']); ?> </td>
                                    
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    
                     <input type="hidden" name="ip_country" id="coun" >
                    <!-- End Comment -->
                    
                  	<p style="color:red"> <i class="fa fa-asterisk"></i> I have read and agree with <a href="privacy-policy.php"> Privacy Policy </a>.</p>
					<br><input type="submit"  value="Submit">
                    
					</form>
                    
                 </div>
				</div>
			
		</section>
		<!-- End contact section -->

		<!-- footer 
			================================================== -->
		<?php include "component/footer.php" ?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
    <script src="js/countries.js"> </script>
	<script language="javascript">
        populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
        populateCountries("country2");
        populateCountries("country2");
    </script>
      
     <script src="assets/js/signature_pad.js"></script>
  <script src="assets/js/app.js"></script>
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
 <script type="text/javascript" src="js/jquery.validate.min.js"></script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.11/jquery-ui.min.js"></script>
 <script type="text/javascript">
       /* var tabs = $("#tabs").tabs();
        var validator = $("#contact-form").validate();

        $(".nexttab").click(function () {
            //var selected = $("#tabs").tabs("option", "selected");
            //$("#tabs").tabs("option", "selected", selected + 1);
            var valid = true;
            var i = 0;
            var $inputs = $(this).closest("div").find("input");

            $inputs.each(function () {
                if (!validator.element(this) && valid) {
                    valid = false;
                }
            });

            if (valid) {
                $("#tabs").tabs("select", this.hash);
            }
        });*/
$("form").submit(function() {
  $(this).attr("action", "give_order.php");
});
    </script>
    
    
<script>

//<![CDATA[ 
$(window).load(function(){
var validator = $("#contact-form").validate();
var tabs = $("#tabs").tabs({
    select: function(event, ui) {
        var valid = true;
        var current = $(this).tabs("option", "selected");
        var panelId = $("#tabs ul a").eq(current).attr("href");
        
        $(panelId).find("input").each(function() {
            console.log(valid);
            if (!validator.element(this) && valid) {
                valid = false;
            }
        });
       
        return valid;
    }
});


$(".nexttab").click(function() {
        $("#tabs").tabs("select", this.hash);
});

//use link to submit form instead of button
$("a[id=submit]").click(function() {
    $(this).parents("form").submit();
});

//form validation


});//]]>  



</script>

</body>

</html>
