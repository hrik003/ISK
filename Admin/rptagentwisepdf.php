<?php 
include "component/config.php";
require('../pdf/fpdf.php');
session_start();
$q= $_GET['q'];
$dt = $_GET['dt'];


$header= mysql_query( "SELECT order_details.agent_username ,customer_details.cust_name ,order_details.pay_mode ,  order_details.transaction_status, order_details.price, order_details.order_date, customer_details.cust_phone ,customer_details.cust_email  FROM order_details INNER JOIN customer_details ON order_details.cust_email = customer_details.cust_email WHERE order_details.agent_username='$q' AND  order_details.order_date LIKE '%$dt%' order by order_details.order_date");

//echo  "SELECT order_details.agent_username ,customer_details.cust_name ,order_details.pay_mode ,  order_details.transaction_status, order_details.price, order_details.order_date, customer_details.cust_phone ,customer_details.cust_email  FROM order_details INNER JOIN customer_details ON order_details.cust_email = customer_details.cust_email WHERE order_details.agent_username='$q' or  order_details.order_date LIKE '%$dt%'";
function setmodestr($n)
					{
						if($n==0)
						{
							return "Credit Card";
						}
						elseif($n==1){
							return "e-cheque";
						}
						elseif($n==2){
							return "Debit Card";
						}
						elseif($n==3){
							return "Fund Transfer";
						}
										
					}
				//	function setstatus($n)
//					{
//						if($n==0)
//						{
//							return "Pending";
//						}
//						elseif($n==1){
//							return "Success";
//						}
//						elseif($n==2){
//							return "Failed";
//						}
//						
//										
//					}

class PDF extends FPDF      //header and footer declaration
{
// Page header
function Header()
{
	$q= $_GET['q'];
	$dt = $_GET['dt'];
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','BU',15);
    // Move to the right
    
    $this->Cell(0,0,'Agent wise sales report',0,0,'C');
	
    $this->SetFont('Arial','BU',12);
	 $this->Cell(-280);
    $this->Cell(0,20,"Agent Username : ".$q ,0,20,'C');
	// Line break
	$this->SetFont('Arial','BU',12);
	 $this->Cell(-5);
    $this->Cell(0,12,$dt." Sales Report" ,0,12,'C');
	
	$this->SetFont('Arial','',10);
	$this->Cell(0,0,'Date :'.date("d/m/Y"),0,0,'R');
    $this->Ln(20);
}
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	
}
}

if(!isset($_SESSION['user'], $_SESSION['role']) ||  $_SESSION['role'] != 'admin'){

	
	echo "<META http-equiv=\"refresh\" content=\"0;URL=login.php\">";	
	
}
else{
	
	$total= 0;
	$pdf = new PDF();   //pdf syntax//
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',8);		
/*foreach($header as $heading) {
	foreach($heading as $column_heading)}*/
	    $pdf->Cell(31,8,'Agent',1,0,'C');
		$pdf->Cell(31,8,'Customer name',1,0,'C');
		$pdf->Cell(31,8,'Mode',1,0,'C');
		$pdf->Cell(31,8,'Order Status',1,0,'C');
		$pdf->Cell(31,8,'Total',1,0,'C');
		$pdf->Cell(31,8,'Date',1,0,'C');
		$pdf->Cell(31,8,'Phone',1,0,'C');
			$pdf->Cell(0,8,'Email',1,0,'C');
	

while($row = mysql_fetch_row($header)){
	$pdf->SetFont('Arial','',8);	
	$pdf->Ln();
	$pdf->Cell(31,8,$row[0],1,0,'C');
	$pdf->Cell(31,8,$row[1],1,0,'C');
	$pdf->Cell(31,8,setmodestr($row[2]),1,0,'C');
	$pdf->Cell(31,8,setstatus($row[3]),1,0,'C');
	$pdf->Cell(31,8,"$".$row[4],1,0,'C');
	$pdf->Cell(31,8,$row[5],1,0,'C');
	$pdf->Cell(31,8,$row[6],1,0,'C');
	$pdf->Cell(0,8,$row[7],1,0,'C');
	$total = $total + $row[4];
} 
//end syntax
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,"Agent username : ".$q ,0,1); 
$pdf->Ln(1);
$pdf->Cell(0,8,"Total sale : $".$total ,0,1); 
$pdf->Output(); //generate output//

}
?>