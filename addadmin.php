
<?php

require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
$gettoken = $class->get_token();
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
	<h1>Add Admin</h1>
		<form action="" method="post">
		<input type="hidden" name="csrf_token" value="<?php echo $token;?>">

	<label>Admin Name:</label>
	<input type="text" name="adminname">
	<p></p>
	<label>Account ID:</label>
	<input type="text" name="employee_id"><p></p>
	<label>Password:</label>
	<input type="password" name="password">
	<p></p>	
	<input type="submit" name="addadmin" value="Add">
	</form>
	
</body>
</html>