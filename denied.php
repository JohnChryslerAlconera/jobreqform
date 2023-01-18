<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$denied = $class->getDenied();
if(isset($userdetails)){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Denied | Forms</title>
</head>
<body>
  
<?php include "adminpanel.php";?>
  <h2 class="ms-3">DENIED REQUESTS</h2>
  <?php
   switch($denied){
        case null:
        echo "no denied records yet";
        break;
        default:
?>
   <div class="container-fluid">
   <table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">Form ID:</th>
      <th scope="col">Requesting Department:</th>
      <th scope="col">Contact Info:</th>
      <th scope="col">Department Head Name:</th>
      <th scope="col">End User Name:</th>
      <th scope="col">Position:</th>
      <th scope="col">Equipment Type:</th>
      <th scope="col">Equipment Number:</th>
      <th scope="col">Equipment Issue:</th>
      <th scope="col">Required Service:</th>
      <th scope="col">Date Submitted:</th>
      <th scope="col">Reason:</th>
    </tr>
  </thead>
      <?php
     
      foreach ($denied as $row) {
      ?>
  <tbody>
    <tr>
      <td><?php echo $row['form_id']; ?></td>      
      <td><?php echo $row['req_dept']; ?></td>
      <td><?php echo $row['contact']; ?></td>
      <td><?php echo $row['dept_head_fullname']; ?></td>
      <td><?php echo $row['euser_fullname']; ?></td>
      <td><?php echo $row['position']; ?></td>
      <td><?php echo $row['equip_type']; ?></td>
      <td><?php echo $row['equip_num']; ?></td>
      <td><?php echo $row['equip_issues']; ?></td>
      <td><?php echo $row['required_services']; ?></td>
      <td><?php echo $row['date_added']; ?></td>
      <td><?php echo $row['reason']; ?></td>
    </tr>



<?php
}

?>
 </tbody>
</table>
</div>
<?php
break;
} 
 }else{
 	echo "You do not belong here!";

 }
 ?>


</body>
</html>