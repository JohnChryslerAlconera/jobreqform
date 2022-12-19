<?php
	require_once('formclass.php');
	require('fpdf/fpdf.php');
	$printid = $class->fpdfPrint();


	$pdf = new FPDF();

	$pdf->SetFont('Arial', '', 12);
	$pdf->Cell(130, 5, );
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();
	$pdf->Cell();




	




?>