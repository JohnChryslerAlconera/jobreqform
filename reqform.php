<?php
require_once('formclass.php');
$userdetails = $class->get_userdata();
$insert = $class->userInsertData();
if(isset($userdetails)){


?>



<!DOCTYPE html>
<html>
<head>

	<link href="https:cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	</style>
	<title>Services Request Form</title>
</head>
<body class="m-5 p-5">
<div class="container">
<div class="fw-semibold">




	

	<p class="fs-5">Request for <span class="fs-3">IT SERVICES</span></p>
	<p>Use this form to request for IT equipment and other related services. Completing a request form is not a guarantee service will be granted.</p>
</div>
	<table>
		<div class="border border-5">
		<tr>
			<form action="" method="post">
				<input type="hidden" name="fullname" value="<?php echo $userdetails['fullname'];?>">
				<input type="hidden" name="req_dept" value="<?php echo $userdetails['department'];?>">
				<input type="hidden" name="account_id" value="<?php echo $userdetails['account_id'];?>">
				<input type="hidden" name="contact" value="<?php echo $userdetails['contact'];?>">
				<input type="hidden" name="dept_head_fullname" value="<?php echo $userdetails['dept_head_fullname'];?>">
				<input type="hidden" name="position" value="<?php echo $userdetails['position'];?>">

			<?php
				 }else{
				 	header("Location: login.php");	
				 }

			?>
			<input type="date" name="form_date">
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
						<label>Equipment Type/Description:</label>
					</div>
				</div>
					</td>
					<td colspan="2">
						<div class="container mt-3">
		<div class="form-floating mb-3 mt-3">
						<input type="text" name="equip_number" class="form-control" required>
						<label>Equipment Serial Number:</label>
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
					<input type="checkbox" name="issues[]" value="Application crash or OS blue screen">
					<label>Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Application crash or OS blue screen">
					<label>Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Damaged motherboard">
					<label>Damaged motherboard</label>
				</td>		
			</tr>	 
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Application won't operate">
					<label>Application won't operate</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="No display">
					<label>No display</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Damaged Hard drive">
					<label>Damaged Hard drive</label>
				</td>	
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Unservicesable">
					<label>Unservicesable</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Printer bunking">
					<label>Printer bunking</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Damaged memory">
					<label>Damaged memory</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Equipment won't boot or power up">
					<label>Equipment won't boot or power up</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Equipment shuts down or reboots">
					<label>Equipment shuts down or reboots</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Display issue">
					<label>Display issue</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Can't access the internet">
					<label>Can't access the internet</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Virus or malware">
					<label>Virus or malware</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Equipment is slow">
					<label>Equipment is slow</label>
				</td>
			</tr>
			<tr>
					<td>
					<input type="checkbox" name="issues[]" value="Won't print">
					<label>Won't print</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="No internet connection">
					<label>No internet connection</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Handset no dial tone">
					<label>Handset no dial tone</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Application won't open">
					<label>Application won't open</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Installation">
					<label>Installation(OS, Apps, Internet)</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Inspection">
					<label>Inspection</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Others:</label>
					<input type="text" name="issues[]">
				</td>

				</tr> <tr> <td> <div class="container mt-4"> <p
				class="fw-semibold">Required Services: <i>(Check all that
				apply)</i></p> </div> </td> </tr> <tr> <td> <input
				type="checkbox" name="services[]" value="Diagnostic">
				<label>Diagnostic</label> </td> <td> <input
				type="checkbox" name="services[]" value="Computer repair">
				<label>Computer repair</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Printer setup">
					<label>Printer setup</label>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="services[]" value="Computer Format">
					<label>Computer Format</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Change hardware">
					<label>Change hardware</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Printer reset">
					<label>Printer reset</label>
					
				</td>
			</tr>
			<tr>
			<td>
					
					<input type="checkbox" name="services[]" value="Data recovery">
					<label>Data recovery</label>
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Computer upgrade">
					<label>Computer upgrade</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Router setup">
					<label>Router setup</label>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="services[]" value="Virus/ Malware removal">
					<label>Virus/ Malware removal</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Printer repair">
					<label>Printer repair</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Router reset">
					<label>Router reset</label>
					
				</td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr>

					<td> 
						<button type="submit" name="submit" class="btn btn-success">Submit Request/Print PDF   </button>
						<!-- <input type="hidden" name="inputid" value="<?php echo $insert['id'];?>"> -->

						<a href="logout.php">LOGOUT</a>
		</form>
					</td>
			</tr>
		</div></div>
	</table>
</div>

</body>
</html>