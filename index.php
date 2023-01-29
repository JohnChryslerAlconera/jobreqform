<?php
require_once('formclass.php');
$user = $class->getUser();
$direct = $class->redirect();
$check = $class->check_user_exist();
$token = $class->get_token();
  $token = md5(uniqid(rand(), true));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();

if(isset($_POST) & !empty($_POST)){
      if(empty($_POST['firstname'])){
        $errors[] = "Firstname is required<br>";
      }
       if(empty($_POST['lastname'])){
        $errors[] = "Lastname is required<br>";
      }
       if(empty($_POST['employee_id'])){
        $errors[] = "Employee ID is required<br>";
      }
       if(empty($_POST['contact'])){
        $errors[] = "Contact Number is required<br>";
      } 
       if(empty($_POST['dept_head_firstname'] | $_POST['dept_head_lastname'])){
        $errors[] = "Department Head Name is required<br>";
      }
       if(empty($_POST['department'])){
        $errors[] = "Department is required<br>";
      }
       if(empty($_POST['position'])){
        $errors[] = "position is required<br>";
      }
       if(empty($_POST['password'])){
        $errors[] = "Firstname is required<br>";
      }
       if(empty($_POST['cpassword'])){
        $errors[] = "Firstname is required<br>";
      }
      if($_POST['password'] != $_POST['cpassword']){
        $errors[] = "Passwords do not match<br>";
      }
      if($class->check_user_exist($_POST['employee_id']) != 0){
        $errors[] = "Employee ID already taken";
      }
    if(empty($errors)){
      $register = $class->register();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Register | Job Request Form</title>
</head>

<body class="bg-light border">
  <section class="text-center text-lg-start">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="index.php">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:90px; height:80px;"></a>
         <form method="post" class="d-flex">
           <div class="input-group me-md-4">
              <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
           <input type="text" name="account" placeholder="Account ID" class="form-control me-2">
           <input type="password" name="logpass" placeholder="Password" class="form-control me-3">
           <button type="submit" name="login" class="btn btn-success">Login</button>
         </div>
         </form>
    </div>
  </div>
</nav>
   <div class="container-fluid py-5">
    <div class="row g-5">
    	<div class="col-lg-6 mb-10 mb-lg-0">
        <div class="card cascading-right ms-5" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center ms-3">
            <h2 class="fw-bold mb-5">Register now</h2>
            <?php
            if(!empty($errors)){
              echo "<div class= 'alert alert-danger'>";
            foreach($errors as $error){
              echo $error;
            }
            echo "</div>";
          }
            ?>
            <form method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  	<input type="text" name="firstname"  class="form-control" placeholder="Firstname">
                  </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  		<input type="text" name="lastname" placeholder="Lastname"  class="form-control">
                  </div>
                </div>
               <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  	<input type="text" name="employee_id" placeholder="Employee ID" id="form3Example" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  		<input type="text" name="contact" placeholder="Contact Number: 09*********" id="form3Example3" class="form-control">
                 
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  	<input type="text" name="dept_head_firstname" placeholder="Department/Office Head firstname" id="form3Example4" class="form-control">
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  		<input  type="text" name="dept_head_lastname" placeholder="Department/Office Head Lastname" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <select name="department" class="form-control">
                      <option disabled selected >Select Department</option>
                      <option value="IT Department">IT Department</option>
                      <option value="Agriculture Department">Agriculture Department</option>
                      <option value="DSWD Department">DSWD Department</option>
                      <option value="DPWH Department">DPWH Department</option>
                    </select>
                  		<!-- <input type="text" name="department" placeholder="Department" class="form-control"> -->
                  </div>
                </div>
                <div class="form-outline col-md-6 mb-4" >
                  		<input type="text" name="position" placeholder="Your Position" class="form-control">
                  </div>
                 </div>
              <div class="form-outline col-md-6 mb-4">
              	<input type="password" name="password" id="form3Example4" class="form-control" placeholder="Set Your Password">
              </div>
              <div class="form-outline col-md-6 mb-4">
              	<input type="password" name="cpassword" id="form3Example4" class="form-control" placeholder="Confirm Your Password">
              </div>
              		<button type="submit" name="register" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>
              </form>
                  </div>
                  </div>
                </div>
              </div>
            
            <div class="container-fluid">
              <div class="mx-auto">
                 <div class="position-absolute top-50 start-50 translate-top">
                  <h1 class="text-center">Job Request Form</h1>
                    <a href="index.php">
  <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" class="ms-5 w-75"></a>
                 </div>
              </div>
            </div>
            <?php include "script.php"?>
</body>
</html>
