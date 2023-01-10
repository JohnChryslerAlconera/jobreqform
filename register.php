<?php
require_once('formclass.php');



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
    $errors[] = "Passwords do not match";
  }
}
if(empty($errors)){
  $register = $class->register();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<section class="text-center text-lg-start">
  <style>
    body {
      background-image: url("https://www.iloilotoday.com/wp-content/uploads/2022/03/1-735x400.jpg");
      background-size: 100rem 80rem;
      background-image:no-repeat;
    }

    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>
<body>
	<a href="login.php"><button class="btn btn-primary">Login</button></a>
   <div class="container py-4">
    <div class="row g-0 align-items-center">
    	<div class="col-lg-10 mb-10 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
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
              </div>
               <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  	<input type="text" name="employee_id" placeholder="Employee ID" id="form3Example" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  		<input type="text" name="contact" placeholder="Contact Number" id="form3Example3" class="form-control">
                 
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


       
              <!-- Email input -->
           
              <!-- Password input -->
              <div class="form-outline col-md-6 mb-4">
              	<input type="password" name="password" id="form3Example4" class="form-control" placeholder="Set Your Password">
              </div>
              <div class="form-outline col-md-6 mb-4">
              	<input type="password" name="cpassword" id="form3Example4" class="form-control" placeholder="Confirm Your Password">
              </div>

                 <!-- Checkbox -->
            <!--   <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  Subscribe to our newsletter
                </label>
              </div>
 								-->
              <!-- Submit button -->
              		<button type="submit" name="register" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>
              

                  </div>
                  </div>
                </div>
              </div>
          	</div>




           
            </form>
</body>
</html>
