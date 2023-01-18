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
	if(isset($data))
	$data = $class->pdf();

foreach($data as $row){
	$issues = explode(',', $row['equip_issues']);



//Cell(width,height, "text", border,newline,'text align (C L or R)')
// SetFont(Fontfamily, B/U/I, Fontsize)
// Insert a logo in the top-left corner at 300 dpi
// $pdf->Image('logo.png', 10, 10, -300);
// Insert a dynamic image from a URL
// $pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World', 60, 30, 90, 0, 'PNG');
	$pdf = new FPDF();

	$pdf->AddPage();
// 	class PDF extends FPDF
// {
//     function Header()
//     {
//         // Select Arial bold 15
//         $pdf->SetFont('Arial', 'B', 15);
//         // Move to the right
//         $pdf->Cell(80);
//         // Framed title
//         $pdf->Cell(30, 10, 'Title', 1, 0, 'C');
//         // Line break
//         $pdf->Ln(20);
//     }
// }
	// $pdf->Image('')
	$pdf->SetFont('Arial', "B", 15);
	$pdf->Cell(0, 10, "City Goverment of Iloilo", 0, 1, 'C');
	$pdf->SetFont('Arial', "I", 12);
	$pdf->Cell(0, 5, "Code: ILO-PPF-022-001 ", 0, 1, 'C');
	$pdf->Image('CH.JPG', 170, 5, -250);
	$pdf->Image('CH.JPG', 20, 5,-250);
	$pdf->Ln(5);	
	$pdf->SetFont('Arial', "I", 11);
	$pdf->Cell(50 ,10, "Section", 1, 0, 'C',);
	$pdf->Cell(80,10, "Service Request Form ", 1, 0, 'C',);
	$pdf->Cell(60,10, "Rec Code Issue No. 0/1", 1, 0, 'C',);
	$pdf->ln();
	$pdf->Cell(50,10, "Document Tittle", 1, 0, 'C',);
	$pdf->Cell(80,10, "IT Polocies, Procedure and Forms ", 1, 0, 'C',);
	$pdf->Cell(60,5, $row['date_added'], 1, 0, 'C',);
	$pdf->ln();
	$pdf->Cell(50,5, "", 0, 0, 'C',);
	$pdf->Cell(80,5, "", 0, 0, 'C',);
	$pdf->Cell(60,5,"Page No. Page 1 of 1", 1, 0, 'C',);
	$pdf->Line(10,110,200,110);
	$pdf->ln(10);
	$pdf->SetFont('Arial', "I", 13);
	$pdf->Cell(45,5, "Request for IT SERVICES", 0, 0,);
	$pdf->ln(5);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(48, 5, "Requesting Dept/Office:", 1, 0, 'L');
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(82, 5, $row['req_dept'], 1, 0,'L',);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(15, 5, "Date:", 1, 0,);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(45, 5, $row['date_added'], 1, 0,);
	$pdf->ln(5);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(48, 5, "Dept/Office Account ID:", 1, 0,);
	$pdf->SetFont('Arial', "I", 11);
	$pdf->Cell(49, 5, $row['employee_id'], 1, 0,);
	// $pdf->Line(10,115,200,115);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(48, 5, "Contact/Local number(#):", 1, 0,);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(45, 5, $row['contact'], 1, 0,);
	$pdf->Ln(10);
	$pdf->SetFont('Arial', "B", 13);
	$pdf->Cell(190, 80, "", 1, 0,);
	$pdf->Ln(0);
	$pdf->Cell(48, 5, "Equipment Issue/s:", 0, 0,);
	$pdf->Ln(8);
	$pdf->SetFont('Arial', "I", 12);
	$pdf->Cell(60, 0, $row['equip_issues'], 0, 0);
	$pdf->ln(30);
	$pdf->SetFont('Arial', "B", 13);
	$pdf->Cell(55, 0, "Required Service:", 0, 0);
	$pdf->ln(4);
	$pdf->SetFont('Arial', "I", 12);
	$pdf->Cell(62, 0, $row['required_services'], 0, 0,);
	$pdf->ln(40);
	// $pdf->Line(10,75,200,75);
	// $pdf->ln(20);
	// $pdf->Line(160 ,85,190,85);
	// $pdf->Cell(140,5,'',0,0);
	// $pdf->Cell(50, 1, "Signature", 0, 1, 'C');
	$pdf->SetFont('Arial', "B", 10);
	$pdf->Cell(190, 10, "Request Approved:", 1, 0,'L',);
	$pdf->ln(10);
	$pdf->Cell(80, 30, "", 1, 0, );
	$pdf->Cell(60, 30, "", 1, 0, );
	$pdf->Cell(50, 30, "", 1, 0, );
	$pdf->ln(0);
	$pdf->Cell(80, 5, "Head of Approving office: ", 0, 0, );		
	$pdf->Cell(60, 5, "Signature:", 0, 0,);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(10, 5, "Date:", 0, 0,);
	$pdf->Cell(5, 5, $row['date_added'], 0, 0,'L',);
	$pdf->ln(40);
	$pdf->Cell(80, 30, "", 1, 0, );
	$pdf->Cell(60, 30, "", 1, 0, );
	$pdf->Cell(50, 30, "", 1, 0, );
	$pdf->ln(0);
	$pdf->SetFont('Arial', "B", 10);
	$pdf->Cell(80, 5, "Processed/serviced by: ", 0, 0,);
	$pdf->Cell(60, 5, "Signature:", 0, 0);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(10, 5, "Date:", 0, 0,);
	$pdf->Cell(10, 5, $row['date_added'], 0, 0,);
	// $pdf->ln(5);


	// $pdf->Cell(40, 0, "Contact/Local #:", 0, 0,);
	// $pdf->Cell(20, 0, "Date:", 0, 5,);
	// $pdf->Ln(4);
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();
	// $pdf->Cell();




	$pdf->Output();

	}
?>