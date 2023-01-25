<?php
require_once("formclass.php");

$conn = $class->openConnection();
$query = $conn->prepare("SELECT *, MONTHNAME(date_added) as months FROM requests GROUP BY months ASC"); 
 $query->execute();
if($query->rowCount() > 0){
    $delimiter = ","; 
    $filename = "requests-data_" . date('Y-m-d') . ".csv"; 
 // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
    // Set column headers Equipment Number



    $fields = array('Form ID', 'Requesting Department', 'Requesting Name','Contact Info', 'Department Head Name', 'End User Name', 'Position', 'Employee ID','Equipment Type', 'Equipment Issue', 'Required Service', 'Date Submitted', 'Form Status'); 
            while($row = $query->fetch()){ 

        $lineData = array($row['form_id'],  $row['req_dept'], $row['req_name'],  $row['contact'], $row['dept_head_fullname'], $row['euser_fullname'], $row['position'], $row['employee_id'],  $row['equip_type'], $row['equip_issues'], $row['required_services'], date("M d, Y",strtotime($row['date_added'])), $row['form_status'],);
        fputcsv($f, $lineData, $delimiter);
         fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit;

}

// $query->bindParam('form_status', $forms[0], PDO::PARAM_STR);
// $query->execute();
// $formstat[] = $query->fetch(PDO::FETCH_OBJ);
// $query->bindParam('form_status', $forms[1], PDO::PARAM_STR);
// $query->execute();
// $formstat[] = $query->fetch(PDO::FETCH_OBJ);
// $query->bindParam('form_status', $forms[2], PDO::PARAM_STR);
// $query->execute();
// $formstat[] = $query->fetch(PDO::FETCH_OBJ);
// $query->bindParam('form_status', $forms[3], PDO::PARAM_STR);
// $query->execute();
// $formstat[] = $query->fetch(PDO::FETCH_OBJ);


 
// <!-- if($query->num_rows > 0){ 

     

//    
     
//     // Set column headers 
//     $fields = array('ID', 'FIRST NAME', 'LAST NAME', 'EMAIL', 'GENDER', 'COUNTRY', 'CREATED', 'STATUS'); 
     
//     // Output each row of the data, format line as csv and write to file pointer 
//     while($row = $query->fetch_assoc()){ 
//         $status = ($row['status'] == 'form_status')?'Active':'Inactive'; 
//         $lineData = array($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['gender'], $row['country'], $row['created'], $status); 
//         fputcsv($f, $lineData, $delimiter); 
//     } 
     
//     // Move back to beginning of file 
//     fseek($f, 0); 
     
//     // Set headers to download file rather than displayed 
//     header('Content-Type: text/csv'); 
//     header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
//     //output all remaining data on a file pointer 
//     fpassthru($f); 
// } 
// exit;  -->
 
?>