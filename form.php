<?php
	$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

   //    echo "success";
    }


	if(isset($_POST['buy'])){
   
	//Fetching variables of the form which travels in URL
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Product_Method = $_POST['Payment_Method'];
    $Product_ID =  $article->id;
    
    if($name !=''||$email !=''){
	//Insert Query of SQL
   $sql="INSERT INTO  purchases(id,Client_Name,Email,Product_ID,Payment_Method,Date) 
    VALUES (NULL,'$name','$email','$Product_ID','$Product_Method',NOW())";
    $link->query("$sql");
	// die("$sql");
	// echo "<br/><br/><span>Data Inserted successfully...!!</span>";
  }
    else{
    // echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";   
    }
 
require('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B','U',16);
$pdf->Cell(5,20," Buy Confirmation Form ",0,1,c);


// $pdf->Image("../photos/$img");
// $pdf->cell(50,0,'@',1);

// $pdf->Cell(50,10,"Name :",1,0);
// $pdf->Image("../photos/$img",140,20,45,35);

$pdf->Cell(50,10,"Name :",1,0);
$pdf->Cell(60,10,"$name",1,1);

$pdf->Cell(50,10,"Email :",1,0);
$pdf->Cell(60,10,"$email ",1,1);


$pdf->Cell(50,10,"Receipt No. :",1,0);
$pdf->Cell(60,10,"$Product_Method  ",1,1);


$pdf->Cell(5,20," Please save this form ",10,1,c);
// $pdf->Cell(10,10,'Powered by FPDF.',0,1,'C');
$pdf->Output();	

}
	//Closing Connection with Server
	$link->close();
?>					