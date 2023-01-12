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
	$pdf->Cell(200, 20, "Job Request form", 0, 1, 'C');
	$pdf->SetFont('Arial', "I", 12);
	$pdf->Cell(200, 20, "This form is use only for requesting IT support", 0, 1, 'C');
	$pdf->Image('CH.JPG', 170, 10, -250);
	$pdf->Image('CH.JPG', 20, 10,-250);
	$pdf->ln(5);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(44, 5, "Requesting Dept/Office:", 0, 0,);
	$pdf->SetFont('Arial', "I", 10);
	// $pdf->Image('https://www.bing.com/th?id=OIP.0mmz5q--yEWxbqJA3yr7XwAAAA&w=155&h=155&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2', 60, 50, 100, 0, 'JPEG');
	$pdf->Cell(120, 5, $row['req_dept'], 0, 0);
	$pdf->Cell(9, 5, "Date:", 0, 0,);
	$pdf->Cell(60, 5, $row['date_added'], 0, 0,);
	$pdf->ln(5);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(44, 5, "Dept/Office Account ID:", 0, 0,);
	$pdf->SetFont('Arial', "I", 11);
	$pdf->Cell(60, 5, $row['employee_id'], 0, 0,);
	$pdf->ln(5);
	$pdf->Line(10,115,200,115);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(47, 5, "Contact/Local number(#):", 0, 0,);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(60, 5, $row['contact'], 0, 0,);
	$pdf->Ln(15);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(60, 0, "Equipment Issue/s", 0, 0);
	$pdf->Ln(4);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(60, 0, $row['equip_issues'], 0, 0);
	$pdf->ln(10);
	$pdf->Line(10,50,200,50);	
	$pdf->ln(10);
	$pdf->SetFont('Arial', "B", 11);
	$pdf->Cell(55, 0, "Required Service:", 0, 0);
	$pdf->ln(4);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(62, 0, $row['required_services'], 0, 0,);
	$pdf->ln(15);
	// $pdf->Line(10,75,200,75);
	// $pdf->ln(20);
	// $pdf->Line(160 ,85,190,85);
	// $pdf->Cell(140,5,'',0,0);
	// $pdf->Cell(50, 1, "Signature", 0, 1, 'C');
	$pdf->SetFont('Arial', "B", 10);
	$pdf->Cell(100, 5, "Request Approval:", 0, 0,);
	$pdf->ln(10);
	$pdf->Cell(90, 5, "Head of Approving office:__________________  ", 0, 0,);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(50, 5, "Signature: ____________", 0, 0);
	$pdf->Cell(10, 5, "Date:", 0, 0,);
	$pdf->Cell(10, 5, $row['date_added'], 0, 0,);
	$pdf->ln(10);
	$pdf->SetFont('Arial', "B", 10);
	$pdf->ln(5);
	$pdf->Cell(90, 5, "Processed/serviced by:__________________  ", 0, 0,);
	$pdf->SetFont('Arial', "I", 10);
	$pdf->Cell(50, 5, "Signature: ____________", 0, 0);
	$pdf->Cell(10, 5, "Date:", 0, 0,);
	$pdf->Cell(10, 5, $row['date_added'], 0, 0,);
	$pdf->ln(5);


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