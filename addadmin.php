<?php
require_once "formclass.php";
$userdetails = $class->get_userdata();
$session = $class->sessionAdmin();
  if(isset($_POST['csrf_token'])){
  if($_POST['csrf_token'] == $_SESSION['csrf_token']){
    $max_time = 60;
if(isset($_SESSION['csrf_token_time'])){
  $token_time = $_SESSION['csrf_token_time'];
  if(($token_time + $max_time) >= time()){
    $class->addAdmin();
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
	<title>Add Admin | Forms</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
</head>
<body>
	<?php include 'adminpanel.php';?>

<div style="overflow: hidden;">
	<div class="content"> 
		<div class="container">
			<div class="row">
				<div class="col text-center mt-1">
					<h2 class="fw-bold">New Admin</h2>
					<hr>
				</div>
			</div>
			<form method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
              <div class="row g-1 ms-1 mb-2 me-1">
                <div class="col">

                    <div class="form-floating">
                    <input required id="firstname" type="text" name="firstname"  class="form-control">
                    <label for="firstname" class="form-label">Firstname</label>
                    </div>

                </div>
                <div class="col">

                    <div class="form-floating">
                    <input type="text" id="middlename" name="middlename" class="form-control">
                    <label for="middlename">Middlename(Optional)</label>
                    </div>
                
                </div>
                <div class="col">

                    <div class="form-floating">
                    <input required id="lastname" type="text" name="lastname" class="form-control">
                    <label for="lastname">Lastname</label>
                    </div>
                </div>
                <div class="col">

                    <div class="form-floating">
                    <input type="text" id="suffix" name="suffix" class="form-control">
                    <label for="suffix">Suffix (Jr, Sr, I, II, III etc. | Optional)</label>
                    </div>

                </div>

              </div>

              <div class="row g-1 ms-1 mb-1 me-1">
                <div class="col">

                    <div class="form-floating">
                    <input required id="employee_id" type="text" name="employee_id" class="form-control">
                    <label for="employee_id">Employee ID</label>
                    </div>

                </div>
              </div>

              <div class="row g-1 ms-1 mb-1 me-1">
                <div class="col">

                  <div class="form-floating">
                    <input required id="contact" type="text" name="contact" class="form-control">
                    <label for="contact">Contact</label>
                  </div>

                </div>
              </div>
    
              <div class="row g-1 ms-1 mb-1 me-1">
                <div class="col">

                  <div class="form-floating">
                    <input required id="position" type="text" name="position" class="form-control">
                    <label for="position">Position</label>
                  </div>

                </div>
              </div>

              <div class="row g-1 ms-1 mb-2 me-1">
                <div class="col">

                    <div class="form-floating">
                    <input required id="department" type="text" name="department" class="form-control">
                    <label for="department">Department</label>
                    </div>

                </div>
              </div>
             
              <div class="row g-1 ms-1 mb-2 me-1">
                <div class="col">

                  <div class="input-group">
                  <input required type="password" name="password" id="password" class="form-control" aria-describedby="showpassword" placeholder="Password">
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', this)"><i class="fa-solid fa-eye"></i> Show</button>
                  </div>

                </div>
              </div>

              <div class="row g-1 ms-1 mb-2 me-1">
                <div class="col">

                <div class="input-group">
                  <input required type="password" name="cpassword" id="cpassword" class="form-control" aria-describedby="showpassword" placeholder="Confirm password">
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('cpassword', this)"><i class="fa-solid fa-eye"></i> Show</button>

                  </div>

                </div>
              </div>

              <div class="row">
               <?php 
              if(!empty($errors)){
                foreach ($errors as $error) {
                  echo '<div class="row mt-1">
                          <div class="col text-center text-danger">
                          '.$error.'
                          </div>
                        </div>';
                }
              }
              ?>
              </div>
      <div class="row mb-5">
    				<div class="col-10 text-center mx-auto">

              <div class="d-grid gap-2">
    					<button class="btn btn-primary" name="add" type="submit">Confirm</button>
    				  </div>
				      </div>
			</div>
				</form>
			</div>
		</div>
	</div>

   
     
		<?php include "script.php";?>  

</body>
</html>