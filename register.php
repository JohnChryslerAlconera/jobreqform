<?php
require_once("formclass.php");
if(isset($_POST['csrf_token'])){
      if($_POST['csrf_token'] == $_SESSION['csrf_token']){
        $max_time = 60 * 60 * 24;
        if(isset($_SESSION['csrf_token_time'])){
          $token_time = $_SESSION['csrf_token_time'];
          if(($token_time + $max_time) >= time()){
            $class->register();
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

	<title>Sign up | Job Request Form</title>
</head>
<body>
	<?php include "indexnav.php";?>
	<div class="content">
	 <div class="container">
	 	<div class="row">
	 		<div class="col-8 mx-auto">
    	<div class="border border-3 rounded">
    		<div class="row ms-3 me-3 text-center">
    			<div class="col">
    				<h1 class="text-primary fw-bold">Sign up</h1>
    				<p class="text-secondary">Employee ID will be used as log in credential for this account.</p>
    			</div>
    		</div>
           <form method="post">            
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">

          <div class="card-body shadow-5">
            <div class="row ms-3 me-3">
              <div class="col">
                <b>Your name:</b>
              </div>
            </div>
              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input required type="text" name="firstname"  class="form-control" placeholder="Firstname">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" name="middlename" placeholder="Middle Name/Optional"  class="form-control">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input required type="text" name="lastname" placeholder="Lastname"  class="form-control">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" name="suffix" placeholder="Suffix/Optional"  class="form-control">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input required type="text" name="employee_id" placeholder="Employee ID"class="form-control">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input required type="text" name="contact" placeholder="Contact Number: 09*********" class="form-control">
                  </div>
                </div>
              </div>
        
              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input required type="text" name="position" placeholder="Your Position" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">                      
                    <input required type="text" name="department" placeholder="Department" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <b>Department/Office Head Name:</b>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input required type="text" name="dept_head_firstname" placeholder="Firstname" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="col">
                  <div class="form-outline">
                    <input required  type="text" name="dept_head_lastname" placeholder="Lastname" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
              	<div class="col ms-4">
              		<b>Set up password:</b>
              	</div>
              </div>
              <div class="row ms-1 me-1 mb-1">
                <div class="form-outline col">
                  <div class="input-group">
                  <input required type="password" name="password" id="password" class="form-control" placeholder="Set Your Password">
                  <button class="btn btn-outline-secondary" onclick="togglePassword('password', this)"><i class="fa-solid fa-eye"></i> Show</button>
                  </div>
                </div>
              </div>

              <div class="row ms-1 me-1 mb-1">
                <div class="form-outline col">
                  <div class="input-group">
                  <input required type="password" name="cpassword" class="form-control" id="confirmpassword"
                  placeholder="Confirm Your Password">
                  <button class="btn btn-outline-secondary" onclick="togglePassword('confirmpassword', this)"> <i class="fa-solid fa-eye"></i> Show</button>
                 </div>
                </div>
              </div>
              <?php
              if(!empty($errors)){
                foreach ($errors as $error) {
                  echo '<div class="row ms-3 me-3 mt-1">
                          <div class="col">
                          <p class="text-danger text-center">'.$error.'</p>
                          </div>
                        </div>';
                }
              }
            ?>
            <div class="row ms-3 me-3 mt-3">
            	<div class="col-5 mx-auto mb-3">
            		<div class="d-grid gap-2">
            			<button type="submit" name="register" class="btn btn-success">Sign up</button>
            		</div>
            	</div>
            </div>
            
          </div>
        </div>
     </div>
 </div>
 </form>
</div>
</div>
<?php include "script.php"?>
</body>
  <script>
    
 // Get the checkbox element
const checkbox = $("#checkEdit");

// Get all input fields with the readonly attribute
const readonlyInputs = $("input[readonly]");

// Get the submit button
const submitButton = $("#editBtn");
submitButton.hide();
// Add event listener to the checkbox
checkbox.on("click", function() {
  if ($(this).is(":checked")) {
    // If checkbox is checked, remove the readonly attribute from all input fields
    readonlyInputs.prop("readonly", false);
    // Show the submit button
    submitButton.show();
  } else {
    // If checkbox is not checked, set the readonly attribute to all input fields
    readonlyInputs.prop("readonly", true);
    // Hide the submit button
    submitButton.hide();
  }
});
  </script>
<!-- <script src="script.js"></script> -->
</html>