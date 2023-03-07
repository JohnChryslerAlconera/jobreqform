<?php

require_once('formclass.php');

if(isset($_POST['csrf_token'])){
  if($_POST['csrf_token'] == $_SESSION['csrf_token']){
    $max_time = 60 * 60 * 24;
    if(isset($_SESSION['csrf_token_time'])){
      $token_time = $_SESSION['csrf_token_time'];
      if(($token_time + $max_time) >= time()){
        $class->getUser();
        $class->redirect();
  }else{
    unset($_SESSION['csrf_token']);
    unset($_SESSION['csrf_token_time']);
    $errors[] = "CSRF Token expired";
  }
}

  }else{
    $errors[] = "There's a problem with CSRF Token";
  }
}

$token = md5(uniqid(rand(), true));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();
  

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 <link rel="shortcut icon" type="x-icon" href="CH.jpg">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="style.css">
 <title>Login | Job Request Form</title>
</head>
<body class="bg-light border">
 <?php include "indexnav.php";?>

  <div class="content">
  <div class="container">
    <div class="border border-3 rounded">
    <div class="row">
    <div class="col-5 mt-3 mx-auto">
    <div class="row">
      <div class="col">
            <h2 class="text-primary fw-bold text-center">Log in</h2>
            <hr>
            <form method="post">
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
              <div class="row">
                <div class="col">
                  <input required type="text" name="account" placeholder="Employee ID" class="form-control me-2">
                </div>
              </div>

              <div class="row mt-4">
                <div class="col">
                  <div class="input-group">
                    <input required type="password" name="logpass" placeholder="Password" class="form-control" aria-describedby="showpassword">
                    <button class="btn btn-outline-secondary" id="showpassword" type="button"><i class="fa-solid fa-eye"></i> Show</button>
                  </div>
                </div>
              </div>
              <?php 
              if(!empty($errors)){
                foreach ($errors as $error) {
                  echo '<div class="row mt-1">
                          <div class="col text-danger">
                          '.$error.'
                          </div>
                        </div>';
                }
              }
              ?>

              <div class="row mt-3">
                <div class="col-lg-5 mx-auto">
                  <div class="d-grid gap-2">
                  <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
                </div>
              </div>
            </form>
             <div class="row">
               <div class="col">
                <hr>
                <p>Don't have an account?</p>
                 <a href="register.php"><button type="button" class="btn btn-success mb-4">
                 Create new Account
                </button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php include "script.php"?>
<script src="script.js"></script>
</body>
</html>
