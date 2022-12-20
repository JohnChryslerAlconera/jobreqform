<?php
	require('fpdf/fpdf.php');
	$userdetails = $class->get_userdata();
	if(isset($userdetails)){
	if(isset($_POST['printpdf'])){


	$pdf = new FPDF();


	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(50, 10, "Requester name:", 1, 0);
	$pdf->Cell(50, 10, $userdetails['fullname'], 1, 0);


	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();




	


	$pdf->Output();
	}
}
?>