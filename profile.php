<?php
require_once "formclass.php";
$userdetails = $class->get_userdata();
if(isset($userdetails)){
  if($userdetails['access'] == 'user'){
    $edit = $class->editProfile();
       ?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>Profile | Forms</title>
      <link rel="shortcut icon" type="x-icon" href="CH.jpg">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
  <?php  include "navbar.php";
    include "script.php";?>
    <div class="content">
      <div class="container">
        <div class="row text-center fw-bold">
         <div class="col mt-3">
          
          <h3>Profile</h3>
          <hr>
        </div>
      </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="checkEdit">
                <label class="form-check-label" for="checkEdit">Edit</label>
                <p class="text-center text-success"><?php echo $edit;?></p>
                <form method="post">
              </div>
            </div>
          </div>
          <div class="row g-1 ms-1 me-1">
            <div class="col">
              <div class="form-floating">
                <input id="fname" type="text" name="firstname" value="<?php echo $userdetails['firstname'];?>" class="form-control" readonly>
                <label for="fname" class="form-label">Firstname:</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating">
                <input type="text" id="midname" name="middlename" value="<?php echo $userdetails['middlename']?>" class="form-control" readonly>
                <label for="lname">Middlename:</label>
              </div>
            </div>

             <div class="col">
              <div class="form-floating">
                <input id="lname" type="text" name="lastname" 
                 value="<?php echo $userdetails['lastname'];?>" class="form-control" readonly>
                <label for="lname">Lastname:</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating">
                <input id="suffix" type="text" name="suffix" 
                 value="<?php echo $userdetails['suffix'];?>" class="form-control" readonly>
                <label for="suffix">Suffix:</label>
              </div>
            </div>

          </div>

          <div class="row g-1 ms-1 me-1">
            <div class="col">
              <div class="form-floating mt-2">
                <input id="employee_id" type="text" name="employee_id" 
                value="<?php echo $userdetails['employee_id'];?>" class="form-control" readonly>
                <label for="employee_id">Employee ID:</label>
              </div>
            </div>
          </div>
            
          <div class="row g-1 ms-1 me-1">
            <div class="col">
              <div class="form-floating mt-2">
                <input id="contact" type="text" name="contact" 
                value="<?php echo $userdetails['contact'];?>" class="form-control" readonly>
                <label for="contact">Contact Number:</label>
              </div>
            </div>
          </div>

          <div class="row g-1 ms-1 me-1">
            <div class="col">
              <div class="form-floating mt-2">
                  <input id="department" type="text" name="department" 
                  value="<?php echo $userdetails['department'];?>" class="form-control" readonly>
                <label for="department">Department:</label>
              </div>
            </div>
          </div>

          <div class="row g-1 ms-1 me-1">
            <div class="col">
              <div class="form-floating mt-2">
                <input id="position" type="text" name="position" 
                value="<?php echo $userdetails['position'];?>" class="form-control" readonly>
                <label for="department">Position:</label>
              </div>
            </div>
          </div>

          <?php
          $fullname = explode(" ", $userdetails['dept_head_fullname']);
          ?>

        <div class="row g-1 ms-1 me-1">
          <div class="col-md-6">
              <div class="form-floating mt-2">
                <input id="dept_head_firstname" type="text" name="dept_head_firstname" 
                value="<?php echo $fullname[0];?>" class="form-control" readonly>
                <label for="dept">Department Head Firstname:</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating mt-2">
                <input id="dept_head_lastname" type="text" name="dept_head_lastname" 
                value="<?php echo $fullname[1];?>" class="form-control" readonly>
                <label for="dept_head_lastname">Department Head Lastname:</label>
              </div>
            </div>
        </div>
        <div class="row mx-auto mt-4 mb-4 ms-5 me-5">
          <div class="col-6 mx-auto">
            <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="edit" id="editBtn"><i class="fa-solid fa-pen"></i> Edit</button>
            </div>
          </div>
        </div>
         </form>
    </div>
  </div>
  

 
   <?php
 }else{?><script>
  alert("Log in first to enter");
  window.location.href="index.php";
</script>
<?php
}
}else{?><script>
  alert("You're not logged in yet, \n Sign in first!");
  window.location.href="index.php";
</script>
<?php
}
?>
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
</html>