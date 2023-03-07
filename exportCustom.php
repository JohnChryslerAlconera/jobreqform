<?php 
 
// Load the database configuration file  
 require_once "formclass.php";
 $session = $class->sessionAdmin();

   if(isset($_GET) && !empty($_GET)){
        if(empty($_GET['issues']) && empty($_GET['todate']) && empty($_GET['fromdate']) && empty($_GET['department']) && empty($_GET['form'])){
           $errors[]= "You need to fill up atleast one of the inputs";

        }
        if(!empty($_GET['issues']) && !empty($_GET['todate']) && empty($_GET['fromdate'])){
           $errors[] ="You also need to fill From: from export date if you want to filter by dat";


        }
        if(!empty($_GET['issues']) && empty($_GET['todate']) && !empty($_GET['fromdate'])){
           $errors[] = "You also need to fill To: from export date if you want to filter by date";

        }
        if(empty($_GET['issues']) && !empty($_GET['todate']) && empty($_GET['fromdate'])){
           $errors[] = "You also need to fill From: from export date if you want to filter by date";

        }
        if(empty($_GET['issues']) && empty($_GET['todate']) && !empty($_GET['fromdate'])){
           $errors[] = "You also need to fill To: from export date if you want to filter by date";
        }
      }
      if(empty($errors)){
        $query = $class->customExport();
if($query->rowCount() > 0){ 
    $delimiter = ",";
    $title = array();
    $filename =  " -data ". date('M d, Y'). ".csv";
    if(!empty($_GET['fromdate']) && !empty($_GET['todate'])){
        $title[] = date('M d, Y', strtotime($_GET['fromdate'])). "-". date('M d, Y', strtotime($_GET['todate'])); 
     }
     if(!empty($_GET['issues'])){
        $title[] = implode(",", $_GET['issues']);
     }
     if (!empty($_GET['department'])){
       $title[] = $_GET['department'];
     }
     if(!empty($_GET['form'])){
        $title[] = ucfirst($_GET['form']);
     }
     if(!empty($title)){
        $filename = implode(" ", $title). $filename;
     }else{
      $filename = "customExport". $filename;
     }
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Form ID', 'Requesting Department', 'Requesting Name','Contact Info', 'Department Head Name', 'End User Name', 'Position', 'Employee ID','Equipment Type', 'Equipment Issue', 'Required Service', 'Date Submitted', 'Form Status'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch()){ 
        $lineData = array($row['form_id'],  $row['req_dept'], $row['req_name'],  $row['contact'], $row['dept_head_fullname'], $row['euser_fullname'], $row['position'], $row['employee_id'],  $row['equip_type'], $row['equip_issues'], $row['required_services'], date("M d, Y",strtotime($row['date_added'])), $row['form_status']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0);
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}else{
  echo '<script>
            alert("No data found");
            window.location.href="custom.php";
        </script>';
} 
exit; 
 }else{
        foreach($errors as $error){
        echo '<script>
            alert("'.$error.'");
            window.location.href="custom.php";
        </script>';
    }
}
?>