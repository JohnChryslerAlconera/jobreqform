
<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();

if(isset($_POST) & !empty($_POST)){
      if(isset($_POST['csrf_token'])){
        if($_POST['csrf_token'] == $_SESSION['csrf_token']){
        }else{
          echo "Session Token Expired";
        }
      }
          $max_time = 5;
          if(isset($_SESSION['csrf_token_time'])){
            $token_time = $_SESSION['csrf_token_time'];
            if(($token_time + $max_time) >= time()){
              }else{
                unset($_SESSION['csrf_token']);
                unset($_SESSION['csrf_token_time']);
                echo "CSRF Expired";
              }
        }else{
          echo "Token expired! ,Please fill up again!";
           }
}

  $token = md5(uniqid(rand(), true));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<title>Add | Admin</title>
</head>

<body>
<?php include "adminpanel.php"?>
<div class="container-fluid">
<div class="card text-center mx-auto mt-5" style="width: 18rem ;">
  <div class="card-body">
    <h2>Add Admin</h2>
    <form action="" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
  <label>Account ID:</label>
  <input type="text" name="employee_id"><p></p>
  <label>Password:</label>
  <input type="password" name="password">
  <p></p> 
  <button class="btn btn-primary" type="submit" name="add">Add</button>
  </form>
  </div>
</div>
<?php include "script.php"?>
</body>
</html>