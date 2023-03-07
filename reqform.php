<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
if(isset($userdetails)){
if(isset($_POST['csrf_token'])){
  if($_POST['csrf_token'] == $_SESSION['csrf_token']){
  	$max_time = 60 * 60 * 24;
if(isset($_SESSION['csrf_token_time'])){
  $token_time = $_SESSION['csrf_token_time'];
  if(($token_time + $max_time) >= time()){
    $class->insertData();
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
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<title>Services Request Form</title>
				
		</head>

		<body>
<?php include "navbar.php"?>
<div class="content">
<div class="container">
<div class="fw-semibold">
<p class="fs-5">Request for <span class="fs-3">IT SERVICES</span></p>
<p>Use this form to request for IT equipment and other related services. Completing a request form is not a guarantee service will be granted.</p>
</div>
<div class="border border-4 border-secondary rounded">
	<form id="myForm" method="post">

		<!-- CSRF token -->
	<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
	<input type="hidden" name="fullname" value="<?php echo $userdetails['fullname'];?>">
	<input type="hidden" name="req_dept" value="<?php echo $userdetails['department'];?>">
	<input type="hidden" name="employee_id" value="<?php echo $userdetails['employee_id'];?>">
	<input type="hidden" name="contact" value="<?php echo $userdetails['contact'];?>">
	<input type="hidden" name="dept_head_fullname" value="<?php echo $userdetails['dept_head_fullname'];?>">
	<input type="hidden" name="position" value="<?php echo $userdetails['position'];?>">	
	<div class="container">
		<div class="row mt-2">
			<label><b>Name of End User/Equipment Info:</b></label>
		</div>
		<div class="row g-1 mt-1 ms-1 me-1">
			<div class="col">
				<div class="form-floating">
					<input type="text" name="euserfname" id="fname" class="form-control"  required>
					<label for="fname">Firstname</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating">
					<input type="text" name="eusermidname" id="midname" class="form-control">
					<label for="midname">Middlename(Optional)</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating">
					<input type="text" name="euserlname" id="lname" class="form-control" required>
					<label for="lname">Lastname</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating">
					<input type="text" name="eusersuffix" id="lname" class="form-control">
					<label for="suffix">Suffix</label>
				</div>
			</div>
		</div>
		<div class="row g-1 mt-1 me-1 ms-1 mb-4">
			<div class="col">
				<div class="form-floating">
					<input id="div" type="text" name="division" class="form-control"
					 required>
					<label for="div">Division:</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating">
					<input type="text" name="equip_type" class="form-control" required>
					<label>Equipment Type/Description:</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating">
					<input type="text" name="equip_number" class="form-control form-control" required>
					<label>Equipment Serial Number:</label>
				</div>
			</div>
		</div>
	</div>
</div>					
  <div class="border border-4 border-secondary mt-3 rounded">
  	<div class="container mt-3">
	<div class="row">
		<div class="col">
			<p class="fw-semibold">Equipment Issue/s: </b><i>(Check all that apply)</i></p>
		</div>
	</div>
	<div class="row g-2 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb1" name="issues[]" value="Application crash or OS blue screen">
			<label class="form-check-label" for="cb1" class="form-check-label">Application crash or OS blue screen</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb2" name="issues[]" value="Equipment freezes or hangs">
			<label class="form-check-label" for="cb2" class="form-check-label">Equipment freezes or hangs</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb3" name="issues[]" value="Damaged motherboard">
			<label class="form-check-label" for="cb3">Damaged motherboard</label>
		</div>		
	</div>	
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb4" name="issues[]" value="Application won't operate">
			<label class="form-check-label" for="cb4">Application won't operate</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb5" name="issues[]" value="No display">
			<label class="form-check-label" for="cb5">No display</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb6" name="issues[]" value="Damaged Hard drive">
			<label class="form-check-label" for="cb6">Damaged hard drive</label>
		</div>	
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb7" name="issues[]" value="Unservicesable">
			<label class="form-check-label" for="cb7">Unservicesable</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb8" name="issues[]" value="Printer bunking">
			<label class="form-check-label" for="cb8">Printer bunking</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb9" name="issues[]"  value="Damaged memory">
			<label class="form-check-label" for="cb9">Damaged memory</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb10" name="issues[]" value="Equipment won't boot or power up">
			<label class="form-check-label" for="cb10">Equipment won't boot or power up</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb11" name="issues[]" value="Equipment shuts down or reboots">
			<label class="form-check-label" for="cb11">Equipment shuts down or reboots</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb12" name="issues[]" value="Display issue">
			<label class="form-check-label" for="cb12">Display issue</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb13" name="issues[]" value="Can't access the internet">
			<label class="form-check-label" for="cb13">Can't access the internet</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb14" name="issues[]" value="Virus or malware">
			<label class="form-check-label" for="cb14">Virus or malware</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb15" name="issues[]" value="Equipment is slow">
			<label class="form-check-label" for="cb15">Equipment is slow</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb16" name="issues[]" value="Won't print">
			<label class="form-check-label" for="cb16">Won't print</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb17" name="issues[]" value="No internet connection">
			<label class="form-check-label" for="cb17">No internet connection</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb18" name="issues[]" value="Handset no dial tone">
			<label class="form-check-label" for="cb18">Handset no dial tone</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb19" name="issues[]" value="Application won't open">
			<label class="form-check-label" for="cb19">Application won't open</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb20" name="issues[]" value="Installation">
			<label class="form-check-label" for="cb20">Installation(OS, Apps, Internet)</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb21" name="issues[]" value="Inspection">
			<label class="form-check-label" for="cb21">Inspection</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col-md-4">
			<div class="form-floating mb-3">
				<div class="form-floating mb-3 mt-3">
					<input type="text" name="issues[]" class="form-control">
					<label>Others:</label>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<hr class="bg-secondary">
		</div>
	</div>

	<div class="row g-1 mx-auto"> 
		<div class="col"> 
			<div class="container mt-2"> 
				<p class="fw-semibold">Required Services: <i>(Check all that apply)</i></p> 
			</div> 
		</div> 
	</div> 
	<div class="row g-2 mt-1 mx-auto"> 
		<div class="col"> 
			<input class="form-check-input" type="checkbox" id="cb22" name="services[]" value="Diagnostic">
			<label class="form-check-label" for="cb22">Diagnostic</label> 
		</div> 
		<div class="col"> 
			<input class="form-check-input" type="checkbox" id="cb23" name="services[]" value="Computer repair">
			<label class="form-check-label" for="cb23">Computer repair</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb24" name="services[]" value="Printer setup">
			<label class="form-check-label" for="cb24">Printer setup</label>	
		</div>
		</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb25" name="services[]" value="Computer Format">
			<label class="form-check-label" for="cb25">Computer Format</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb26" name="services[]" value="Change hardware">
			<label class="form-check-label" for="cb26">Change hardware</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb27" name="services[]" value="Printer reset">
			<label class="form-check-label" for="cb27">Printer reset</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			
			<input class="form-check-input" type="checkbox" id="cb28" name="services[]" value="Data recovery">
			<label class="form-check-label" for="cb28">Data recovery</label>
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb29" name="services[]" value="Computer upgrade">
			<label class="form-check-label" for="cb29">Computer upgrade</label>
		</div>

		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb30" name="services[]" value="Router setup">
			<label class="form-check-label" for="cb30">Router setup</label>
		</div>

	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb31" name="services[]" value="Virus/ Malware removal">
			<label class="form-check-label" for="cb31">Virus/ Malware removal</label>
			
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb32" name="services[]" value="Printer repair">
			<label class="form-check-label" for="cb32">Printer repair</label>
			
		</div>
		<div class="col">
			<input class="form-check-input" type="checkbox" id="cb33" name="services[]" value="Router reset">
			<label class="form-check-label" for="cb33">Router reset</label>
			
		</div>
		</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col"> 
			<div class="container mt-4"> 
				<p><b>System Issues:  (<i>if checked, system problem input field should also be filled</i>)</b></p> 
			</div> 
		</div> 
	</div> 
<div class="checkbox-group">
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<label for="sp1">
			<input class="form-check-input" type="checkbox" data-textarea="textarea1" name="system[]" id="sp1" value="">
			System Name</label>
		</div>
		<div class="col">
			<label for="sp2">
			<input class="form-check-input" type="checkbox" data-textarea="textarea2" name="system[]" id="sp2" value="">
			System Name</label>
		</div>
		<div class="col">
			<label for="sp3">
			<input class="form-check-input" type="checkbox" data-textarea="textarea3" name="system[]" id="sp3" value="">
			System Name</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<label for="sp4">
			<input class="form-check-input" type="checkbox" data-textarea="textarea4" name="system[]" id="sp4" value="">
			System Name</label>
		</div>
		<div class="col">
			<label for="sp5">
			<input class="form-check-input" type="checkbox" data-textarea="textarea5" name="system[]" id="sp5" value="">
			System Name</label>
		</div>
		<div class="col">
			<label for="sp6">
			<input class="form-check-input" type="checkbox" data-textarea="textarea6" name="system[]" id="sp6" value="">
			System Name</label>
		</div>
	</div>
	<div class="row g-2 mt-1 mx-auto">
		<div class="col">
			<label for="sp7">
			<input class="form-check-input" type="checkbox" data-textarea="textarea7" name="system[]" id="sp7" value="">
			System Name</label>
		</div>
		<div class="col">
			<label for="sp8">
			<input class="form-check-input" type="checkbox" data-textarea="textarea8" name="system[]" id="sp8" value="">
			System Name</label>
		</div>
		<div class="col">
			<label for="sp9">
			<input class="form-check-input" type="checkbox" data-textarea="textarea9" name="system[]" id="sp9" value="">
			System Name</label>
		</div>
	</div>
</div>
	<div class="textarea-group mt-3">
	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea1" class="form-control" placeholder="Comment system problem1"></textarea>

			</div>

	</div>
	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea2" class="form-control" placeholder="Comment system problem2"></textarea>
				
		</div>
	</div>

	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea3" class="form-control" placeholder="Comment system problem3"></textarea>
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			
					<textarea style="display: none;" id="textarea4" class="form-control" placeholder="Comment system problem4"></textarea>
			
		</div>
	</div>
	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea5" class="form-control" placeholder="Comment system problem5"></textarea>
			
		</div>
	</div>
	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea6" class="form-control" placeholder="Comment system problem6"></textarea>
			
		</div>
	</div>
	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea7" class="form-control" placeholder="Comment system problem7"></textarea>
		
		</div>
	</div>
	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea8" class="form-control" placeholder="Comment system problem8"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col">

					<textarea style="display: none;" id="textarea9" class="form-control" placeholder="Comment system problem9"></textarea>
	
		</div>
	</div>
</div>
		
	
	<div class="row">
		<div class="col">
			<hr class="bg-secondary">
		</div>
	</div>
	<div class="row g-5 mx-auto"> 
		<div class="col"> 
				<p class="fw-semibold">Service Term Agreement:</p>
			<div class="container mt-2 mb-4 ms-4"> 
				<input required type="checkbox" value="tanda[]" class="form-check-input" id="tanda1" required="">
				<label class="ms-2" for="tanda1"><i>I understand that it is my sole responsibility to back up my files before turning over my equipment to be repaired;</i></label><br>
				<input required type="checkbox" value="tanda[]" class="form-check-input" id="tanda2">
				<label class="ms-2" for="tanda2"><i>I will not hold the office in-charge of repair for any loss/damage to
				the data/information stored in my device or computer;</i></label><br>
				<input required type="checkbox" value="tanda[]" class="form-check-input" id="tanda3">
				<label class="ms-2" for="tanda3"><i>I hereby authorize the office in charge to make required dianostic, repairs, and other services needed on the equipment;</i></label>
			</div> 
		</div> 
	</div> 
</div>
</div>
	<?php 
	if(!empty($errors)){
		foreach ($errors as $error) {
			echo '<div class="row mt-1">
			<div class="col">
			<p class="text-danger text-center">'.$error.'</p>
			</div>
			</div>';
		}
	}
	?>
	<div class="row">
		<div class="col">
				<div id="error-msg" style="display: none;"></div>
		</div>
	</div>
	<div class="row g-2 mt-3 mb-5">
		<div class="col-8 mx-auto"> 
		   <div class="d-grid gap-0">	
			<button type="submit" name="reqform" class="btn btn-success">Submit</button>
		</div>
		</div>
	</div>
</div>
</form>	
	<?php
	}else{
		header("Location: index.php");	
		include "script.php";
	}
	?>

</body>
<script type="text/javascript">
// Get all checkboxes
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

// Add event listener to each checkbox
checkboxes.forEach(checkbox => {
  checkbox.addEventListener('click', () => {
    // Check if the checkbox is checked
    if (checkbox.checked) {
      // Show the designated textarea
      const textarea = document.getElementById(checkbox.dataset.textarea);
      textarea.style.display = "block";
      // Set the textarea as required
      textarea.required = true;
    } else {
      // Hide the designated textarea
      const textarea = document.getElementById(checkbox.dataset.textarea);
      textarea.style.display = "none";
      // Set the textarea as not required
      textarea.required = false;
    }
  });
});

// Get the form
const form = document.querySelector('form');


// Add event listener to form submit event
form.addEventListener('submit', event => {
  // Check if any displayed textarea is empty
  const textareas = document.querySelectorAll('textarea[style="display: block;"]');
  for (let i = 0; i < textareas.length; i++) {
    if (textareas[i].value.trim() === '') {
      // Display an alert message
      const error = document.getElementById('error-msg');
      error.style.display = "block";
      // Prevent the form from submitting
      event.preventDefault();
      return;
    }
  }
});


	</script>
</script>
</html>