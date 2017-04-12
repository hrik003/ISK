<?php include "component/config.php" ;
require('pdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','BU',15);
    // Move to the right
    $this->Cell(80);
    
	// Line break
	 $this->SetFont('Arial','',10);
	$this->Cell(0,0,'Date :'.date("m/d/Y"),0,0,'R');
    $this->Ln(20);
}
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
}

}?>

<?php
date_default_timezone_set("US/Pacific");
$name  = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$ip    = htmlspecialchars($_POST['ip']);
$company = htmlspecialchars($_POST['company']);
$phone   = htmlspecialchars($_POST['phone']);
$fax     = htmlspecialchars($_POST['fax']);
$addr = htmlspecialchars($_POST['addr']);
$country    = htmlspecialchars($_POST['country']);
$state    = htmlspecialchars($_POST['state']);
$city    = htmlspecialchars($_POST['city']);
$zip    = htmlspecialchars($_POST['zip']);
$place    = htmlspecialchars($_POST['place']);
$pass = htmlspecialchars($_POST['pass']);
$sequ_question = htmlspecialchars($_POST['sequ_question']);
$sequ_answer = htmlspecialchars($_POST['sequ_answer']);
$alt_phn = htmlspecialchars($_POST['alt_phn']);
$agent = $_POST['agent'];
$plan = htmlspecialchars($_POST['plan']);
$noofcom =  htmlspecialchars($_POST['com_no']);
$sh_name =  htmlspecialchars($_POST['sh_name']);
$sh_company =  htmlspecialchars($_POST['sh_company']);
$sh_address =  htmlspecialchars($_POST['sh_address']);
$sh_city =  htmlspecialchars($_POST['sh_city']);
$sh_state =  htmlspecialchars($_POST['sh_state']);
$sh_zip =  htmlspecialchars($_POST['sh_zip']);
$paymode =  htmlspecialchars($_POST['paymode']);
$price  = htmlspecialchars($_POST['price']);
$comment  = htmlspecialchars($_POST['comment']);
$planyr = htmlspecialchars($_POST['plan_yr']);
$ref  = $_SERVER['HTTP_REFERER'];


////  ----saignature ----/////


$imgsig = $_POST['sigdata'];
$imgsig = str_replace('data:image/png;base64,', '', $imgsig);
$imgsig = str_replace(' ', '+', $imgsig);
$datasig =$imgsig;
$curr_date=date("Y-m-d");
//if($paymode == 0)
//{
//	$cr_cardname  =  $_GET['cr_cardname'];
//	$cr_cardtype  =  $_GET['cr_cardtype'];
//	$cr_cardno  =  $_GET['cr_cardno'];
//	$cr_cvv  =  $_GET['cr_cvv'];
//	$cr_expmonth  =  $_GET['cr_expmonth'];
//	$cr_expyear  =  $_GET['cr_expyear'];
//
//}elseif($paymode == 1)
//{
//	$ec_bankname  =  $_GET['ec_bankname'];
//	$ec_name  =  $_GET['ec_name'];
//	$ec_acno  =  $_GET['ec_acno'];
//	$ec_transitno  =  $_GET['ec_transitno'];
//	$ec_chno  =  $_GET['ec_chno'];
//	
//	
//	
//}elseif($paymode == 2)
//{
//	$dc_cardname  =  $_GET['dc_cardname'];
//	$dc_cardtype  =  $_GET['dc_cardtype'];
//	$dc_cardno  =  $_GET['dc_cardno'];
//	$dc_cvv  =  $_GET['dc_cvv'];
//	$dc_startmonth  =  $_GET['dc_startmonth'];
//	$dc_startyear  =  $_GET['dc_startyear'];
//	$dc_expmonth  =  $_GET['dc_expmonth'];
//	$dc_expyear  =  $_GET['dc_expyear'];
//	
//}elseif($paymode == 3)
//{
//	
//}

///////---------------------------------------------------------//////
$inscustqry = mysql_query("INSERT INTO `customer_details`(`cust_email`, `cust_name`, `cust_IP`, `cust_company`, `cust_phone`, `cust_fax`, `cust_address`, `cust_country`, `cust_state`, `cust_city`, `cust_zip`, `cust_wherefrom`, `cust_password`, `cust_seq_ques`, `cust_seq_ans`, `cust_altphone`, `cust_reg_date`) VALUES ('$email', '$name', '$ip', '$company', '$phone', '$fax', '$addr', '$country', '$state', '$city', '$zip', '$place', '$pass', '$sequ_question', '$sequ_answer', '$alt_phn', NOW())");
if($inscustqry)
{
	$orderid  = "ORD".strtoupper(substr(md5(date('r')).rand(),-5));
	$insorderqry = mysql_query("INSERT INTO `order_details`(`order_id`, `cust_email`, `cust_addr`, `cust_phone`, `agent_username`, `pay_mode`, `price`, `transaction_status`, `trans_date`, `plan`, `noofcom`, `comment`, `order_date`,`planyears`) VALUES ('$orderid', '$email', '$addr', '$phone', '$agent', '$paymode','$price', '0', NOW(), '$plan', '$noofcom', '$comment', NOW(),'$planyr')");
	
	$shippingqry  =mysql_query("INSERT INTO `shipping_details`(`cust_email`, `shipping_name`, `shipping_company`, `shipping_addr`, `shipping_city`, `shipping_state`, `shipping_zip`) VALUES ('$email', '$name', '$sh_company', '$sh_address', '$sh_city', '$sh_state', '$sh_zip')");
	
	if($paymode == 0)
{
	$cr_cardname  =  $_POST['cr_cardname'];
	$cr_cardtype  =  $_POST['cr_cardtype'];
	$cr_cardno  =  $_POST['cr_cardno'];
	$cr_cvv  =  $_POST['cr_cvv'];
	$cr_expmonth  =  $_POST['cr_expmonth'];
	$cr_expyear  =  $_POST['cr_expyear'];
	
	$ccqry  = mysql_query("INSERT INTO `credit_card`( `card_name`, `card_type`, `card_no`, `exp_month`, `exp_year`, `order_id`,`cvv`) VALUES ( '$cr_cardname', '$cr_cardtype', '$cr_cardno', '$cr_expmonth', '$cr_expyear', '$orderid','$cr_cvv')");
	

}elseif($paymode == 1)
{
	$ec_bankname  =  $_POST['ec_bankname'];
	$ec_name  =  $_POST['ec_name'];
	$ec_acno  =  $_POST['ec_acno'];
	$ec_transitno  =  $_POST['ec_transitno'];
	$ec_chno  =  $_POST['ec_chno'];
	
	$ecqry  = mysql_query("INSERT INTO `echeque`( `bank_name`, `ac_name`, `ac_no`, `transit_no`, `echeque_no`, `order_id`) VALUES ('$ec_bankname', '$ec_name', '$ec_acno', '$ec_transitno', '$ec_chno', '$orderid')");
	
	
	
}elseif($paymode == 2)
{
	$dc_cardname  =  $_POST['dc_cardname'];
	$dc_cardtype  =  $_POST['dc_cardtype'];
	$dc_cardno  =  $_POST['dc_cardno'];
	$dc_cvv  =  $_POST['dc_cvv'];
	$dc_startmonth  =  $_POST['dc_startmonth'];
	$dc_startyear  =  $_POST['dc_startyear'];
	$dc_expmonth  =  $_POST['dc_expmonth'];
	$dc_expyear  =  $_POST['dc_expyear'];
	
	$dcqry  = mysql_query("INSERT INTO `debit_card`( `card_name`, `card_type`, `card_no`, `start_month`, `start_year`, `exp_month`, `exp_year`, `order_id`,`cvv`) VALUES ( '$dc_cardname', '$dc_cardtype', '$dc_cardno', '$dc_startmonth', '$dc_startyear', '$dc_expmonth', '$dc_expyear', '$orderid','$dc_cvv')");	
	
	
}elseif($paymode == 3)
{
	
	
	
}



	echo "<script> alert('Order has been successfully submitted...') </script>"	;
		//echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";

				$pdfcompanyname = "ISK BUSINESS TECHNOLOGY LLCs";
				$pdfcompanyaddress = "2942 AVE R,Brooklyn Ny 11229";
				$pdfcompanyphone = "(866)5467183";
				$pdfcompanyzip = "Brooklyn Ny 11229";
				$pdfcompanymail = "support@iskbusinesstechnology.com";
				$pdforderid = $orderid;
				$pdforderdate = date('m/d/Y') ;
				$pdforderstatus = "Pending";
				
				$pdfbillname  = $name;
				$pdfbillAddr  = $addr;
				$pdfbillcity  = $city;
				$pdfbillzip  = $zip;
				$pdfbillstate  = $state;
				
				$pdfshipname  = $sh_name;
				$pdfshipAddr  = $sh_address;
				$pdfshipcity  = $sh_city;
				$pdfshipzip  = $sh_zip;
				$pdfshipstate  = $sh_state;
				
				$pdf = new PDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				// Title
  				$pdf->SetFont('Arial','BU',17);
    		    $pdf->Cell(80);
				$pdf->Cell(30,10,'Invoice',0,0,'C');	
				$pdf->SetFont('Times','',12);
				/*for($i=1;$i<=40;$i++)*/
					$pdf->ln(5);
				
				$pdf->Cell(0,10,$pdfcompanyname, 0,1);
				$pdf->Line(11,43,200,43);
				$pdf->Cell(50,5,$pdfcompanyaddress ,0,8);
				$pdf->Cell(0,0,'Order ID :'.$orderid ,0,8,'R');
				$pdf->Ln(0);
				$pdf->Cell(50,5,$pdfcompanyzip ,0,8);
				$pdf->Cell(0,0,'Order Date :'.$pdforderdate ,0,8,'R');
				$pdf->Ln(0);
				$pdf->Cell(0,5,"Call us ".$pdfcompanyphone ,0,8);
				$pdf->Cell(0,0,'Order Status :'.$pdforderstatus ,0,8,'R');
				
				$pdf->Cell(0,5,"email us ".$pdfcompanymail ,0,8,'',0,'mailto:'.$pdfcompanymail);
				$pdf->Ln(5);
				///////-----------//////////
				
				$pdf->Cell(100,10,"Bill To", 0,0);
				$pdf->Cell(100,10,"Ship To", 0,1);
				$pdf->Line(11,79,200,79);
				$pdf->Cell(100,5,$pdfbillname,0,0);
				$pdf->Cell(100,5,$pdfshipname,0,1);
				$pdf->Ln(0);
				$pdf->Cell(100,5,$pdfbillAddr,0,0);
				$pdf->Cell(100,5,$pdfshipAddr,0,1);
				$pdf->Ln(0);
				$pdf->Cell(100,5,$pdfbillcity,0,0);
				$pdf->Cell(100,5,$pdfshipcity,0,1);
				$pdf->Ln(0);
				$pdf->Cell(100,5,$pdfbillstate,0,0);
				$pdf->Cell(100,5,$pdfshipstate,0,1);
				$pdf->Ln(0);
				$pdf->Cell(100,5,$pdfbillzip,0,0);
				$pdf->Cell(100,5,$pdfshipzip,0,1);
				$pdf->Ln(5);
				///////=============///////////
				$pdf->Cell(100,10,"Product Details", 0,1);
				$pdf->Line(11,119,200,119);
				$pdf->Ln(5);
				$pdf->Cell(15,5,'SKU',1,0,'C');
				$pdf->Cell(75,5,'Description',1,0,'C');
				$pdf->Cell(20,5,'Price',1,0,'C');
				$pdf->Cell(15,5,'Year',1,0,'C');
				$pdf->Cell(35,5,'No. of Computer',1,0,'C');
				$pdf->Cell(30,5,'Total',1,1,'C');
				
				$pdf->Ln(0);
				$pdf->Cell(15,10,'1',1,0,'C');
				$pdf->Cell(75,10,$plan,1,0,'C');
				$pdf->Cell(20,10,$price,1,0,'C');
				$pdf->Cell(15,10,$planyr,1,0,'C');
				$pdf->Cell(35,10,$noofcom,1,0,'C');
				$pdf->Cell(30,10,$price,1,1,'C');
				$pdf->Ln(0);
				$pdf->Cell(30,10,'',0,0,'C');
				$pdf->Cell(75,10,'',0,0,'C');
				$pdf->Cell(20,10,'',0,0,'C');
				$pdf->Cell(35,10,'Subtotal',1,0,'C');
				$pdf->Cell(30,10,$price,1,1,'C');
				$pdf->Ln(0);
				
				$pdf->Image('data:image/png;base64,'.$datasig,100,180,80,30,'png');
				$pdf->Line(100,210,200,210);
				$pdf->Ln(70);
				$pdf->Cell(100,0,'Date :'.date("m/d/Y"),0,0);
				
				$pdf->SetFont('Times','',18);
				$pdf->Cell(80,0,"Signature",0,1,'C');
				$pdf->Ln(5);
				$pdf->SetFont('Times','B',10);
				$pdf->Cell(100,0,'Signed From : '.$ip,0,0);
				
$txtdoc = "I, ".$pdfbillname." (Printed Name) am entering into a Computer Maintenance
Agreement with (http://iskbusinesstechnology.com/privacy-policy.php) a one-time payment of $".$price."

I understand that(http://iskbusinesstechnology.com/privacy-policy.php) is an Individual Tech Support 
Company, provides expert's tech-support for third party products.

I also understand that (http://iskbusinesstechnology.com/privacy-policy.php) will not bill my account
for services rendered until I am satisfied with the service and approve the transaction 
with a member of ISK BUSINESS TECHNOLOGY LLC Department.

Furthermore, I agree, that if at any time I have any issue regarding the payment, I will 
contact ISK BUSINESS TECHNOLOGY LLC Billing Department support@iskbusinesstechnology.com to resolve
the problem prior to contacting my bank to file a dispute, freeze my account, stop the payment, etc.

I understand that (http://iskbusinesstechnology.com/privacy-policy.php) takes customer satisfaction 
very seriously, and that they offer a simple dispute process to recover my funds if for any 
reason I am unsatisfied with the services provider.
";




				
				
				$pdf->AddPage();
				$pdf->SetFont('Arial','BU',17);
    		    $pdf->Cell(80);
				$pdf->Cell(30,10,'Customer Payment Agreement',0,0,'C');		
				$pdf->ln(15);
				$pdf->SetFont('Times','',14);
				$pdf->MultiCell(200,6,$txtdoc,0);
				$pdf->ln(15);
				$pdf->Cell(100,0,"Printed Name : ".$pdfbillname,0,1);
				$pdf->Image('data:image/png;base64,'.$datasig,100,180,80,30,'png');
				$pdf->Line(100,210,200,210);
				$pdf->Ln(50);
				$pdf->Cell(100,0,'Date :'.date("m/d/Y"),0,0);
				$pdf->SetFont('Times','',18);
				$pdf->Cell(80,0,"Signature",0,1,'C');
				
				
				
	
	
	$txtdoc1 = 
"1. Always watch the screen as your computer is being repaired. If your screen become 
non-visible, demand to be able to see what is occurring, or terminate the session.

2. Beware of any company claiming to be Apple. Apple is not in the business of 


monitoring people computers, and will never contact you. Especially to alert you to 
a virus infection that may be present. If a company tells you they are Apple or calling 
in behalf of Apple, please notify support@iskbusinesstechnology.com and on emergency
requirement call on the toll free number (866)5467183 (USA) within business hours PST 

immediately before continuing.

3. Ask for details of the services performed with an itemized report upon completion.

Ask for detailed lists of any virii - (virus) or malware found and removed.

Beware of technical support companies contacting you starting you have any issues on 
your computer. Customer should always initiate a call for service.";	
	
		
			$pdf->AddPage();
			

			
			
			$pdf->SetFont('Arial','BU',17);
    		    $pdf->Cell(80);
				$pdf->Cell(30,10,'Tech Support Safety Tips from iskbusinesstechnology.com',0,0,'C');		
				$pdf->ln(15);
				$pdf->SetFont('Times','',14);
				$pdf->MultiCell(200,6,$txtdoc1,0);
				$pdf->ln(15);
				$pdf->Image('data:image/png;base64,'.$datasig,100,180,80,30,'png');
				$pdf->Line(100,210,200,210);
				$pdf->Ln(58);
				$pdf->Cell(100,0,'Date :'.date("m/d/Y"),0,0);
				$pdf->SetFont('Times','',18);
				$pdf->Cell(80,0,"Signature",0,1,'C');
$txtdoc2 = "1. Send us an email to support@iskbusinesstechnology.com or call us (866)5467183(USA)

2.Customer will need to provide their Full Name, Transaction Amount and Reason for the Dispute.


3. Dispute will be reviewed by ISK BUSINESS TECHNOLOGY LLC Risk Department.

4. When the Dispute is approved and resolved in favour of the customer by ISK BUSINESS TECHNOLOGY LLC Department, 
a Refund will be issued in the full amount that is owned to the customer.

5. Refund will be issued to the customer.

6. The Refund takes up to 7-14 business days to be delivered to the customer.

7. iskbusinesstechnology.com Customer (S) will be restricted to maximum sixty days dispute windows for 
payments.

8. Dispute Closed.";

				$pdf->AddPage();
			    $pdf->SetFont('Arial','BU',17);
    		    $pdf->Cell(80);
				$pdf->Cell(30,10,'iskbusinesstechnology.com Customer Dispute Resolution Process',0,0,'C');
				$pdf->Ln(7);
				$pdf->SetFont('Arial','U',15);
				$pdf->Cell(0,10,'ALL STATEMENTS OF DISPUTE MUST BE',0,0,'C');
				$pdf->Ln(7);
				$pdf->Cell(0,10,'RECEIVED IN WRITING BY iskbusinesstechnology.com',0,0,'C');
				$pdf->ln(15);
				$pdf->SetFont('Times','',12);
				$pdf->MultiCell(200,5,$txtdoc2,0);
				$pdf->ln(15);
				$pdf->Image('data:image/png;base64,'.$datasig,100,180,80,30,'png');
				$pdf->Line(100,210,200,210);
				$pdf->Ln(55);
				$pdf->Cell(100,0,'Date :'.date("m/d/Y"),0,0);
				$pdf->SetFont('Times','',18);
				$pdf->Cell(80,0,"Signature",0,1,'C');
				$filename="docbills/".$pdforderid.".pdf";
				$pdf->Output($filename,'F');
				//echo "<a href=\"".$filename."\">Download Bill  </a>";
				?>

            <center>
   
     
     <a href="<?php echo $filename ?>" target="_blank"   > <img style="margin-top:20px" src="images/downloadbill.png" height="109px" width="282px" />
     
     </a>
     </center>
             
                       
                       
					
			
			
	
      
        
            
      
        
   

                <?php 
				
					
	
}
else
{
echo "<script> alert('customer has been already registered...\\n please try with another email address...') </script>"	;
echo "<META http-equiv=\"refresh\" content=\"0;URL=$ref\">";
	
}
?>







