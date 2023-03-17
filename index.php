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
<body>
 <!-- <?php include "indexnav.php";?> -->
 <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark bg-gradient">
      <div class="container-fluid">
        <a href="index.php" class="nav link active">
        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:90px; height:80px;">

        </a>
         <span class="navbar-brand ms-3 fs-2 fw-bold text-center text-light">Job Request Form</span>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
       <!--  <div class="collapse navbar-collapse justify-content-end me-5 text-center" id="mynavbar">
           <ul class="navbar-nav ms-5">
            <li class="nav-item">
             <a href="index.php" class="nav-link fs-4 <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'active'; }?>">Log in</a>
            </li>
           <!--  <li class="nav-item">
              <a href="register.php" class="nav-link fs-4 <?php if (basename($_SERVER['PHP_SELF']) == 'register.php') { echo 'active'; }?>">Sign up</a> -->
            </li> -->
        </ul>
      </div>
  </div>
  </nav>



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
                    <input required type="password" name="logpass" id="password" placeholder="Password" class="form-control">
                    <button class="btn btn-outline-secondary" onclick="togglePassword('password', this)" type="button"><i class="fa-solid fa-eye"></i></button>
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
                <p>Don't have an account?
                 <a href="register.php"><button type="button" class="btn btn-success mb-2">
                 Create new Account
                </button></a></p>
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
</body>
</html>
