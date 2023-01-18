<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$submitted = $class->getSubmitted();
$class->pdf();
if(isset($userdetails)){
  if($userdetails['access'] == 'user'){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<title>Submitted Forms</title>
</head>
<body>
	<?php include 'navbar.php';?>
  <div class="container-fluid">
	<h2 class="ms-3">Submitted REQUESTS</h2>
   <table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">Form ID:</th>
      <th scope="col">End User Name:</th>
      <th scope="col">Equipment Type:</th>
      <th scope="col">Equipment Number:</th>
      <th scope="col">Equipment Issue:</th>
      <th scope="col">Required Service:</th>
      <th scope="col">Date Submitted:</th>
      <th scope="col">Status</th>
      <th scope="col">Remarks:</th>
      <th scope="col">Print</th>
    </tr>
  </thead>
<?php 
switch($submitted){
  case null:
  echo "no submitted requests yet";
  break;
  default:
  
foreach ($submitted as $row) {
?>
  <tbody>
    <tr>
      <td><?php echo $row['form_id']; ?></td>
      <td><?php echo $row['euser_fullname']; ?></td>
      <td><?php echo $row['equip_type']; ?></td>
      <td><?php echo $row['equip_num']; ?></td>
      <td><?php echo $row['equip_issues']; ?></td>
      <td><?php echo $row['required_services']; ?></td>
      <td><?php echo $row['date_added']; ?></td>
      <td><?php echo $row['form_status']; ?></td>
      <td><?php echo $row['reason']; ?></td>
      <td><form method="post" action="make_fpdf.php">
  <input type="hidden" name="id" value="<?php echo $row['id']?>">
  <button type="submit" class="btn btn-success" name="printpdf">Convert to Pdf</button>
</form>
</td>
<?php
}
break;
} 
 ?>
    </tr>
  </tbody>
</table>  
		
<?php
  }
    }else{
      header("Location: login.php");
    }
?>
</div>


</body>
</html>


