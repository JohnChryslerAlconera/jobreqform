<?php
	require_once('formclass.php');
	require('fpdf.php');
	if(isset($_POST['printpdf'])){
		$id = $_POST['id'];
		$conn = $class->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests WHERE id = ?");
		$stmt->execute([$id]);
		$data = $stmt->fetchAll();
		
}
	if(isset($data)){

foreach($data as $row){
//Cell(width,height, "text", border,newline,'text align')
	$pdf = new FPDF();


	$pdf->AddPage();
// 	class PDF extends FPDF
// {
//     function Header()
//     {
//         // Select Arial bold 15
//         $this->SetFont('Arial', 'B', 15);
//         // Move to the right
//         $this->Cell(80);
//         // Framed title
//         $this->Cell(30, 10, 'Title', 1, 0, 'C');
//         // Line break
//         $this->Ln(20);
//     }
// }
	$pdf->SetFont('Arial', "B", 10);
	$pdf->Cell(60, 0, "Requesting Dept/Office:", 0, 0);
	$pdf->Cell(60, 0, "Dept/Office Account ID", 0, 0,);
	$pdf->Cell(40, 0, "Contact/Local #:", 0, 0,);
	$pdf->Cell(20, 0, "Date:", 0, 2,);
	$pdf->Ln(4);
	$pdf->SetLeftMargin(15);
	$pdf->SetFont('Arial', "I", 8);
	$pdf->Cell(65, 0, $row['req_dept'], 0, 0);
	$pdf->Cell(55, 0, $row['employee_id'], 0, 0,);
	$pdf->Cell(37, 0, $row['contact'], 0, 0,);
	$pdf->Cell(20, 0, $row['date_added'], 0, 1,);
	$pdf->Ln(4);
	$pdf->SetLeftMargin(10);
	$pdf->SetFont('Arial', "I", 8);
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();




	


	$pdf->Output();
	}
}
?>