<?php
require_once('formclass.php');
$register = $class->register();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<div class="container">	
		<h1>Register</h1>
	<form method="post">

		<input required type="text" name="firstname" placeholder="firstname"><br>
		<input required type="text" name="lastname" placeholder="lastname"><br>
		<input required type="text" name="account_id" placeholder="Account ID"><br>
		<input required type="text" name="contact" placeholder="contact"><br>
		<input required type="text" name="department" placeholder="department"><br>
		<input required type="text" name="dept_head_firstname" placeholder="Department/Office Head Firstname">
			<br>
		<input required type="text" name="dept_head_lastname" placeholder="Department/Office Head Lastname"><br>
		<input required type="text" name="position" placeholder="Your Position"><br>
		<input required type="password" name="password" placeholder="Set Your Password"><br>
		<input required type="password" name="cpassword" placeholder="Confirm Your Password"><br>
		<input required type="submit" name="register" value="REGISTER">
	</form>
</div>

</body>
</html>