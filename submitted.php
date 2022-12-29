<?php


require_once('formclass.php');
$userdetails = $class->get_userdata();
$gettoken = $class->get_token();
$submitted = $class->getSubmitted();
if(!isset($gettoken)){
  $token = md5(uniqid(rand(), true));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	 
</head>
<body>
	<?php include 'userpanel.php';?>
	<h1>Submitted REQUESTS</h1>
<?php 
switch($submitted){
	case null:
	echo "no submitted requests yet";
	break;
	default:

foreach ($submitted as $row) {
?>


<div class="container">
<div class="card" style="width: 25rem; padding: 5px; background-color: gray;">
  <div class="card-header">

  	<?php echo $row['form_status']; ?>
    
  </div>
  <ul class="list-group list-group-flush">
  	
    <li class="list-group-item"><?php echo $row['req_dept']; ?></li>
    <li class="list-group-item"><?php echo $row['contact']; ?></li>
    <li class="list-group-item"><?php echo $row['dept_head_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['euser_fullname']; ?></li>
    <li class="list-group-item"><?php echo $row['position']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_type']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_num']; ?></li>
    <li class="list-group-item"><?php echo $row['equip_issues']; ?></li>
    <li class="list-group-item"><?php echo $row['required_services']; ?></li>
    <li class="list-group-item"><?php echo $row['date_added']; ?></li>
    <?php
    if($row['form_status'] != "pending"){
    	?>
    	 <li class="list-group-item"><?php echo $row['reason']; ?></li>
    <?php
}
?>
<form method="post" action="make_fpdf.php">
            <input type="hidden" name="csrf_token" value="<?php echo $token;?>">

	<input type="hidden" name="id" value="<?php echo $row['id']?>">
	<button type="submit" class="btn btn-success" name="printpdf">Make a Pdf</button>
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


