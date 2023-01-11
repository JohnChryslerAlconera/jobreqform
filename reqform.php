<?php

require_once('formclass.php');
$userdetails = $class->get_userdata();
$gettoken = $class->get_token();
	$token = md5(uniqid(rand(), true));
		$_SESSION['csrf_token'] = $token;
		$_SESSION['csrf_token_time'] = time();
if(isset($userdetails)){

?>

<!DOCTYPE html>
<html>
<head>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	</style>
	<title>Services Request Form</title>
</head>
<?php include "userpanel.php"?>

<body class="m-5 p-5">
<div class="container">
<div class="fw-semibold">
	<p class="fs-5">Request for <span class="fs-3">IT SERVICES</span></p>
	<p>Use this form to request for IT equipment and other related services. Completing a request form is not a guarantee service will be granted.</p>
</div>
	<table>
		<div class="border border-5">
		<tr>
			<form role="form" method="post" name="reqform">
					<input type="hidden" name="csrf_token" value="<?php echo $token;?>">
				<input type="hidden" name="fullname" value="<?php echo $userdetails['fullname'];?>">
				<input type="hidden" name="req_dept" value="<?php echo $userdetails['department'];?>">
				<input type="hidden" name="employee_id" value="<?php echo $userdetails['employee_id'];?>">
				<input type="hidden" name="contact" value="<?php echo $userdetails['contact'];?>">
				<input type="hidden" name="dept_head_fullname" value="<?php echo $userdetails['dept_head_fullname'];?>">
				<input type="hidden" name="position" value="<?php echo $userdetails['position'];?>">

		
		</tr>
		
		<tr>
			<td>
				
			</td>
					<td colspan="2">
	
					</td>
				</tr>
				<tr>
					<tr>
					<td>
						<div class="container">
						<table>
							
						<label>Name of End User:</label>
						<tr><td>
						<input type="text" name="euserfname" class="form-control" placeholder="Firstname" required>
						</td>
						<td>
						<input type="text" name="eusermidname" class="form-control" placeholder="Middlename">
						</td><td>
						<input type="text" name="euserlname" class="form-control" placeholder="Lastname" required>
						</td><td>
						<input type="text" name="eusersuffix" class="form-control" placeholder="Suffix/Optional">
					</div></td>
					</table>
						
				</tr>
					
				</tr>
				<tr>	
					<td>
						<div class="container mt-3">
		<div class="form-floating mb-3 mt-3">
						
						<input type="text" name="equip_type" class="form-control" required>
						<label for="cb">Equipment Type/Description:</label>
					</div>
				</div>
					</td>
					<td colspan="2">
						<div class="container mt-3">
		<div class="form-floating mb-3 mt-3">
						<input type="text" name="equip_number" class="form-control" required>
						<label for="cb">Equipment Serial Number:</label>
					</div></div>
					</td>
				</tr>
			</div>
			</div>	

	</table>
	
	<table>
		<div class="container mt-4 ml-3">
			<tr>
					<p class="fw-semibold">Equipment Issue/s: </b><i>(Check all that apply)</i></p>
				<td>
					<input type="checkbox" id="cb1" name="issues[]" value="Application crash or OS blue screen">
					<label for="cb1">Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" id="cb2" name="issues[]" value="Application crash or OS blue screen">
					<label for="cb2">Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" id="cb3" name="issues[]" value="Damaged motherboard">
					<label for="cb3">Damaged motherboard</label>
				</td>		
			</tr>	 
			<tr>
				<td>
					<input type="checkbox" id="cb4" name="issues[]" value="Application won't operate">
					<label for="cb4">Application won't operate</label>
				</td>
				<td>
					<input type="checkbox" id="cb5" name="issues[]" value="No display">
					<label for="cb5">No display</label>
				</td>
				<td>
					<input type="checkbox" id="cb6" name="issues[]" value="Damaged Hard drive">
					<label for="cb6">Damaged Hard drive</label>
				</td>	
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="cb7" name="issues[]" value="Unservicesable">
					<label for="cb7">Unservicesable</label>
				</td>
				<td>
					<input type="checkbox" id="cb8" name="issues[]" value="Printer bunking">
					<label for="cb8">Printer bunking</label>
				</td>
				<td>
							<input type="checkbox" id="cb9" name="issues[]"  value="Damaged memory">
					<label for="cb9">Damaged memory</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="cb10" name="issues[]" value="Equipment won't boot or power up">
					<label for="cb10">Equipment won't boot or power up</label>
				</td>
				<td>
					<input type="checkbox" id="cb11" name="issues[]" value="Equipment shuts down or reboots">
					<label for="cb11">Equipment shuts down or reboots</label>
				</td>
				<td>
					<input type="checkbox" id="cb12" name="issues[]" value="Display issue">
					<label for="cb12">Display issue</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="cb13" name="issues[]" value="Can't access the internet">
					<label for="cb13">Can't access the internet</label>
				</td>
				<td>
					<input type="checkbox" id="cb14" name="issues[]" value="Virus or malware">
					<label for="cb14">Virus or malware</label>
				</td>
				<td>
					<input type="checkbox" id="cb15" name="issues[]" value="Equipment is slow">
					<label for="cb15">Equipment is slow</label>
				</td>
			</tr>
			<tr>
					<td>
					<input type="checkbox" id="cb16" name="issues[]" value="Won't print">
					<label for="cb16">Won't print</label>
				</td>
				<td>
					<input type="checkbox" id="cb17" name="issues[]" value="No internet connection">
					<label for="cb17">No internet connection</label>
				</td>
				<td>
					<input type="checkbox" id="cb18" name="issues[]" value="Handset no dial tone">
					<label for="cb18">Handset no dial tone</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="cb19" name="issues[]" value="Application won't open">
					<label for="cb19">Application won't open</label>
				</td>
				<td>
					<input type="checkbox" id="cb20" name="issues[]" value="Installation">
					<label for="cb20">Installation(OS, Apps, Internet)</label>
				</td>
				<td>
					<input type="checkbox" id="cb21" name="issues[]" value="Inspection">
					<label for="cb21">Inspection</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Others:</label>
					<input type="text" name="issues[]">
				</td>

				</tr> <tr> <td> <div class="container mt-4"> <p
				class="fw-semibold">Required Services: <i>(Check all that apply)</i></p> </div> </td> </tr> 
				<tr> <td> 
					<input type="checkbox" id="cb22" name="services[]" value="Diagnostic">
				<label for="cb22">Diagnostic</label> </td> <td> 

					<input type="checkbox" id="cb23" name="services[]" value="Computer repair">
				<label for="cb23">Computer repair</label>
					
				</td>
				<td>
					<input type="checkbox" id="cb24" name="services[]" value="Printer setup">
					<label for="cb24">Printer setup</label>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="cb25" name="services[]" value="Computer Format">
					<label for="cb25">Computer Format</label>
					
				</td>
				<td>
					<input type="checkbox" id="cb26" name="services[]" value="Change hardware">
					<label for="cb26">Change hardware</label>
					
				</td>
				<td>
					<input type="checkbox" id="cb27" name="services[]" value="Printer reset">
					<label for="cb27">Printer reset</label>
					
				</td>
			</tr>
			<tr>
			<td>
					
					<input type="checkbox" id="cb28" name="services[]" value="Data recovery">
					<label for="cb28">Data recovery</label>
				</td>
				<td>
					<input type="checkbox" id="cb29" name="services[]" value="Computer upgrade">
					<label for="cb29">Computer upgrade</label>
					
				</td>
				<td>
					<input type="checkbox" id="cb30" name="services[]" value="Router setup">
					<label for="cb30">Router setup</label>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="cb31" name="services[]" value="Virus/ Malware removal">
					<label for="cb31">Virus/ Malware removal</label>
					
				</td>
				<td>
					<input type="checkbox" id="cb32" name="services[]" value="Printer repair">
					<label for="cb32">Printer repair</label>
					
				</td>
				<td>
					<input type="checkbox" id="cb33" name="services[]" value="Router reset">
					<label for="cb33">Router reset</label>
					
				</td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr>

					<td> 
						
				<input type="submit" name="reqform" class="btn btn-success" value="ADD">
		</form>
	

	</table>
</div>
	<?php
		
	
				 }else{
				 	header("Location: login.php");	
				 }

			?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="crossorigin="anonymous"></script>
</body>
</html>