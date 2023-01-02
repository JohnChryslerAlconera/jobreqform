<?php


require_once('formclass.php');
$userdetails = $class->get_userdata();
$submitted = $class->getSubmitted();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
	<title></title>
	 
</head>
<body>
	<?php include 'navbar.php';?>
	<h1>Submitted REQUESTS</h1>
<?php 
switch($submitted){
	case null:
	echo "no submitted requests yet";
	break;
	default:

foreach ($submitted as $row) {
?>
<div class="card p-2" style="width: 25rem; float: left;">
  <div class="card-header">
  	<?php echo $row['form_status']; ?>
  </div>

  <ul class="list-group list-group-flush">
    <p ><b> Request Department:  </b><?php echo $row['req_dept']; ?></p>
    <p  ><b> contact Number:  </b> <?php echo $row['contact']; ?></p>
    <p > <b> Department Head Name:  </b><?php echo $row['dept_head_fullname']; ?></p>
    <p ><b> User Name:  </b><?php echo $row['euser_fullname']; ?></p>
    <p ><b> Position:  </b><?php echo $row['position']; ?></p>
    <p ><b> Equipment Type:  </b><?php echo $row['equip_type']; ?></p>
    <p ><b> Equipment Number:  </b><?php echo $row['equip_num']; ?></p>
    <p ><b> Equipment Issue:  </b><?php echo $row['equip_issues']; ?></p>
    <p ><b> Required Service:  </b> <?php echo $row['required_services']; ?></p>
    <p ><b> Date Submitted:  </b><?php echo $row['date_added']; ?></p>
    <p ><b> Remarks: </b></p>
    <?php
    if($row['form_status'] != "pending"){
    	?>
    	 <p ><?php echo $row['reason']; ?></p>
    <?php
}
?>
<form method="post" action="make_fpdf.php">
	<input type="hidden" name="id" value="<?php echo $row['id']?>">
	<button type="submit" class="btn btn-success" name="printpdf">Convert to Pdf</button>
</form>
<?php
}
break;
} 
 ?>
    	 
  </ul>
</div>



 

</body>
</html>


