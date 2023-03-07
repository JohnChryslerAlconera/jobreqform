<?php
require_once("formclass.php");
$session = $class->sessionAdmin();

$conn = $class->openConnection();
$query = $conn->prepare("SELECT * FROM requests GROUP BY date_added ASC"); 
 $query->execute();
if($query->rowCount() > 0){
    $delimiter = ","; 
    $filename = "requests-data_" . date('Y-m-d') . ".csv"; 
 // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
    // Set column headers Equipment Number



    $fields = array('Form ID', 'Requesting Department', 'Requesting Name','Contact Info', 'Department Head Name', 'End User Name', 'Position', 'Employee ID','Equipment Type', 'Equipment Issue', 'Required Service', 'Date Submitted', 'Form Status'); 
            fputcsv($f, $fields, $delimiter);

            while($row = $query->fetch()){ 

        $lineData = array($row['form_id'],  $row['req_dept'], $row['req_name'],  $row['contact'], $row['dept_head_fullname'], $row['euser_fullname'], $row['position'], $row['employee_id'],  $row['equip_type'], $row['equip_issues'], $row['required_services'], date("M d, Y",strtotime($row['date_added'])), $row['form_status'],);
        fputcsv($f, $lineData, $delimiter);
    }
         fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}else{
  echo '<script>
            alert("No forms yet");
            window.location.href="custom.php";
        </script>';
} 
exit;


 
?>