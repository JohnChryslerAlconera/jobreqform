<?php
include('formclass.php');
$user = $class->getUser();
$direct = $class->redirect();
if(isset($_POST) & !empty($_POST)){
			if(isset($_POST['csrf_token'])){
				if($_POST['csrf_token'] == $_SESSION['csrf_token']){
				}
			}
					$max_time = 60*30;
					if(isset($_SESSION['csrf_token_time'])){
						$token_time = $_SESSION['csrf_token_time'];
						if(($token_time + $max_time) >= time()){
							$this->userInsertData();
							?>
					<script>
						alert("Added");
						window.location.href = "submitted.php";
					</script>
					<?php
							}else{
								unset($_SESSION['csrf_token']);
								unset($_SESSION['csrf_token_time']);
								echo "CSRF Expired";
							}
							}
				}else{
					echo "Token expired! ,Please fill up again!";
					 }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JobRequestAdmin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<style>
    body {
      background-image: url("https://lh5.googleusercontent.com/p/AF1QipPvdz3ADDkJWpH9x8pbSXNp17W0YSmXnVSlz-pR=w296-h202-n-k-no-v1");
      background-size: 85rem 45rem;
      background-image: no-repeat;
    }

  </style>
</head>
<body>
<div class="container py-4">
    <div class="row g-0 align-items-center">
    	<div class="col-lg-10 mb-10 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">

	<div class="card-header m-5 p-5" style="text-align:center" >
		<a href="register.php">Not yet Registered? Click this</a>
		<h1>-LOGIN-</h1>
	<form role="form" method="post">
	
	<label>AccountID:</label>
	<input type="text" name="employee_id">
	<p></p>
	<p></p>
	<label>Password:</label>
	<input type="password" name="password"><p></p>
	<input type="submit" name="submit" value="Enter">
	</form>
	</div>
	</div>
   </div>
  </div>
</div>
</body>
</html>
