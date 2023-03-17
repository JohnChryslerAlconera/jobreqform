<?php
session_start();
class RequestForm {	
	private $server = "mysql:host=localhost;dbname=requestform";
	private $root = "root";
	private $password = "";
	private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	protected $con;

//make a public function for openConnection with try and catch/this loop/function
	public function openConnection(){
		try{
			$this->con = new PDO($this->server, $this->root, $this->password, $this->options);
			return $this->con;

		}catch (PDOException $e) {

			echo "There is something wrong". $e->getMessage();
		}
	}
	public function closeConnection(){	
		$this->con = null;
	}
	public function getUser(){
		if(isset($_POST['account'])){
			$employee_id = $_POST['account'];
			$password = $_POST['logpass'];
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM users WHERE employee_id = ?");
			$stmt->execute([$employee_id]);	
			$user = $stmt->fetch();
			if($stmt->rowCount() > 0){		
				if(password_verify($password, $user['password'])){
					$this->set_userdata($user);
				}else{
					?>
					<script>
						alert("Password and Employee ID do not match");
						window.location.href = "index.php";
					</script>
					<?php
				}
			}else{
				?>
				<script>
					alert("Employee do not exist, Please be sure to sign up first");
					window.location.href = "index.php";
				</script>
				<?php
			}
		}
	}
	public function register(){
		if(isset($_POST['register'])){
			$firstname = ucwords(strtolower($_POST['firstname']));
			$lastname = ucwords(strtolower($_POST['lastname']));
			$middlename = ucwords(strtolower($_POST['middlename']));
			$suffix = ucwords(strtolower($_POST['suffix']));
			$employee_id = $_POST['employee_id'];
			$contact = $_POST['contact'];
			$department = $_POST['department'];
			$dept_head_firstname = $_POST['dept_head_firstname'];
			$dept_head_lastname = $_POST['dept_head_lastname'];
			$dept_head_fullname = $dept_head_firstname. " ". $dept_head_lastname;
			$dept_head_fullname = ucwords(strtolower($dept_head_fullname));
			$position = ucwords($_POST['position']);
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			if($password == $cpassword){
				if($this->check_user_exist($employee_id)){
					?><script>
						alert("ID already exist");
						event.preventDefault();
					</script><?php

					}else{
							
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$conn = $this->openConnection();
			$stmt = $conn->prepare("INSERT INTO `users`(`firstname`, `lastname`, `middlename`, `suffix`, `employee_id`, `contact`, `department`, `dept_head_fullname`, `position`, `password`) 
				VALUES (?,?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$firstname, $lastname, $middlename, $suffix, $employee_id, $contact, $department, 
				$dept_head_fullname, $position, $hashed_password]);
			$count = $stmt->rowCount();
			if($count > 0){
				?><script>
				alert("Registered \n Log in to enter");
				window.location.href="index.php";
					</script><?php
			}else{
				?><script>
				alert("Something went wrong");
				window.location.href="register.php";
					</script><?php
			}
		}
			

			}else{
				?><script>
				alert("Passwords do not match");
				event.preventDefault();
					</script><?php
			}
		}
	}
		
		 
		public function set_userdata($array){
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['userdata'] = array("fullname" => $array['firstname']. " ". $array['lastname'], 
				"firstname" => $array['firstname'], "lastname" => $array['lastname'], 
				"middlename" => $array['middlename'], "suffix" => $array['suffix'],
				"employee_id" => $array['employee_id'], "contact" => $array['contact'],
				"department" => $array['department'], 
				"dept_head_fullname" => $array['dept_head_fullname'], 
				"position" => $array['position'], "access" => $array['access']);
			return $_SESSION['userdata'];
		}

		public function get_userdata(){	
			if(!isset($_SESSION)){
				session_start();

			}
			if(isset($_SESSION['userdata'])){
				return $_SESSION['userdata'];
			}else{

				return null;
			}
		}
		public function editProfile(){
			if (isset($_POST['edit'])){
			$firstname = ucwords(strtolower($_POST['firstname']));
			$lastname = ucwords(strtolower($_POST['lastname']));
			$middlename = ucwords(strtolower($_POST['middlename']));
			$suffix = ucwords(strtolower($_POST['suffix']));
			$employee_id = $_POST['employee_id'];
			$contact = $_POST['contact'];
			$department = $_POST['department'];
			$dept_head_firstname = $_POST['dept_head_firstname'];
			$dept_head_lastname = $_POST['dept_head_lastname'];
			$dept_head_fullname = $dept_head_firstname. " ". $dept_head_lastname;
			$dept_head_fullname = ucwords(strtolower($dept_head_fullname));
				$conn = $this->openConnection();
				$stmt = $conn->prepare("UPDATE users SET firstname = :fname, lastname = :lname, middlename = :mname, 
					suffix = :suffix, employee_id = :employee_id, contact = :contact, department = :req_dept, dept_head_fullname = :dept_head_fullname WHERE employee_id = :employee_id");
				$stmt->execute(["fname" => $firstname, "lname" => $lastname, "mname" => $middlename, 
								"suffix" => $suffix, "employee_id" => $employee_id, "contact" => $contact,
								"req_dept" => $department, "dept_head_fullname" => $dept_head_fullname]);
				$count = $stmt->rowCount();
				if($count > 0){
					return $message[] = "Sucessfully editted.";

				}else{
					return $message[] = "Something went wrong";

				}
			}
		}

		public function insertData(){
			if (isset($_POST['reqform'])) {
				date_default_timezone_set('Asia/Manila');
				$fullname = $_POST['fullname'];
				$req_dept = $_POST['req_dept'];
				$employee_id = $_POST['employee_id'];
				$contact = $_POST['contact'];
				$date_sub = date('Y-m-d H:i:s');
				$formid =$this->randomId();
				$dept_head_fullname = $_POST['dept_head_fullname'];
				$position = $_POST['position'];
				$division = ucwords(strtolower($_POST['division']));
				$euser_fname = $_POST['euserfname'];
				$euser_midname = $_POST['eusermidname'];
				$euser_lname = $_POST['euserlname'];
				$euser_suffix = $_POST['eusersuffix'];
				$euser_fullname = $euser_fname. " ". $euser_midname. " ". $euser_lname. " ". $euser_suffix;
				$euser_fullname = ucwords(strtolower($euser_fullname));
				$equip_type = $_POST['equip_type'];
				$equip_num = $_POST['equip_number'];
				$equip_issues= implode(", ", $_POST['issues']);
				$equip_issues = substr($equip_issues, 0, -1);
				if(strlen($equip_issues) == 0){
					echo "need to check or write issue";
					?><script>event.preventDefault();</script><?php
				}else{	
					$required_services = implode(", ", $_POST['services']);
					$required_services = substr($required_services, 0, -1);
					if(strlen($required_services) == 0){
						echo "check one or more services";
						?><script>event.preventDefault();</script><?php
					}else{
						$conn = $this->openConnection();
						$stmt = $conn->prepare("INSERT INTO requests(req_name, req_dept, division, employee_id, contact, dept_head_fullname, euser_fullname, position, equip_type, equip_num, equip_issues, required_services,date_added,form_id)
							VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$stmt->execute([$fullname, $req_dept, $division, $employee_id, $contact, 
							$dept_head_fullname,$euser_fullname, $position, $equip_type, $equip_num, $equip_issues, 
							$required_services,$date_sub, $formid]);
						$count = $stmt->rowCount();
						if($count > 0){
							?><script>
					            alert("Submitted successfully");
					            window.location.href="submitted.php";
					        </script><?php
				
						}else{
							?><script>
				            alert("Something went wrong");
				            window.location.href="reqform.php";
				      	  </script><?php

						}	
					}
				}
			}
		}
		public function randomId(){
			$number = uniqid();
			$varray = str_split($number);
			$len = sizeof($varray);
			$formid = array_slice($varray, $len-5, $len);
			$formid = implode(",", $formid);
			$formid = str_replace(',', '', $formid);
			$formid = strtoupper($formid);
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT id FROM requests");
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$number = $count + 1;
			}else{
				$number = 1;
			}
			$id = $number.$formid;
			return $id;
		}
		public function getSubmitted(){
			if(!empty($this->get_userdata())){
				$employee_id = $this->get_userdata();
				$id = $employee_id['employee_id'];
				$conn = $this->openConnection();
				$stmt = $conn->prepare("SELECT * FROM requests WHERE employee_id = ? ORDER BY date_added DESC");
				$stmt->execute([$id]);
				return $stmt;

			}
		}

		public function addAdmin(){
			if(isset($_POST['add'])){
				$fname = ucwords(strtolower($_POST['firstname']));
				$lname = ucwords(strtolower($_POST['lastname']));
				$middlename = ucwords(strtolower($_POST['middlename']));
				$suffix = ucwords(strtolower($_POST['suffix']));
				$employee_id = $_POST['employee_id'];
				$contact = $_POST['contact'];
				$position = $_POST['position'];
				$department = $_POST['department'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				if($cpassword == $password){
					if($this->check_admin_exist($employee_id) == 0){
						$password_hash = password_hash($password, PASSWORD_DEFAULT);
						$conn = $this->openConnection();
						$stmt = $conn->prepare("INSERT INTO users(firstname, lastname, middlename, suffix, contact, employee_id, department, position, password, access) VALUES(?,?,?,?,?,?,?,?,?,?)");
						$stmt->execute([$fname, $lname, $middlename, $suffix, $contact, $employee_id, $department, $position, $password_hash, "administrator"]);
						$count = $stmt->rowCount();
						if($count > 0){
							?><script>alert("Do you want to confirm admin addition?");
							window.location.href="addadmin.php";
							</script><?php
						}
					}else{
						?><script>
							alert("ID already registered");
							event.preventDefault();
						</script><?php
					}
				}else{
					?><script>
						alert("Password do not match");
						event.preventDefault();
						</script><?php
				}
			}
		}


		public function check_admin_exist(){
			if(isset($_POST['add'])){
				$employee_id = $_POST['employee_id'];
				$conn = $this->openConnection();
				$stmt = $conn->prepare("SELECT * FROM users WHERE employee_id = ?");
				$stmt->execute([$employee_id]);
				$count = $stmt->rowCount();
				return $count;
			}
		}
		public function check_user_exist(){
			if(isset($_POST['index'])){
				$employee_id = $_POST['employee_id'];
				$conn = $this->openConnection();
				$stmt = $conn->prepare("SELECT * FROM users WHERE employee_id = ?");
				$stmt->execute([$employee_id]);
				$count = $stmt->rowCount();
				return $count;
			}
		}


		public function logout(){
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['userdata'] = null;
			unset($_SESSION['userdata']);
		}

		public function getData($form){
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM requests WHERE form_status = :form ORDER BY date_added DESC");
			$stmt->execute(['form' => $form]);
			return $stmt;

		}
		public function updateStatus(){
			if(isset($_GET)){
				if(isset($_GET['approved'])){
					$id = intval($_GET['id']);
					$changed_status_by = $_GET['admin']; 
					$conn = $this->openConnection();
					$stmt = $conn->prepare("UPDATE requests SET changed_status_by = :changed_status_by,
						form_status = :form_status WHERE id = :id");
					$stmt->execute(["changed_status_by" => $changed_status_by, "form_status" => "approved", "id" => $id]);
					$row = $stmt->rowCount();
					if($row > 0){
						?>
						<script>
							alert("Form approved!");
							window.location.href = "pendings.php";
						</script>
						<?php
					}else{
						?>
						<script>
							alert("There is something wrong");
							window.location.href = "pendings.php";
						</script>
						<?php
					}
				}
				if(isset($_GET['denied'])){
					$id = intval($_GET['id']);
					$changed_status_by = $_GET['admin']; 
					$reason = $_GET['reason'];
					$conn = $this->openConnection();
					$stmt = $conn->prepare("UPDATE requests SET changed_status_by = :changed_status_by, form_status = :form_status,reason = :reason WHERE id = :id");
					$stmt->execute(["changed_status_by" => $changed_status_by, "form_status" => "denied", "reason" => $reason,
						"id" => $id]);
					$row = $stmt->rowCount();
					if($row > 0){
						?>
						<script>
							alert("Form denied!");
							window.location.href = "pendings.php";
						</script>
						<?php

					}else{
						?>
						<script>
							alert("something is wrong");
							window.location.href = "pendings.php";
						</script>
						<?php
					}
				}
			}
		}
		
		public function toComplete(){
			if(isset($_GET['comment'])){
				$id = $_GET['id'];
				$remarks = $_GET['remarks'];
				$admin = $_GET['admin'];
				$conn = $this->openConnection();
				$stmt = $conn->prepare("UPDATE requests SET form_status = :form_status , reason = :reason, changed_status_by = :changed WHERE id = :id");
				$stmt->execute(["form_status" => "completed" , "reason" => $remarks, "id" => $id, "changed" => $admin]);
				$row = $stmt->rowCount();
				if ($row > 0) {
					?><script>
						alert("Form updated to completed");
						window.location.href="completed.php";
					</script>
					<?php
				}
			}
		}
		public function redirect(){	
			$userdetails = $this->get_userdata();

			if(isset($userdetails)){
				if($userdetails['access'] == 'administrator'){
					header("Location: adminchart.php");

				}
				if($userdetails['access'] == 'user'){
					header("Location: submitted.php");
				}

			}
		}
		public function sessionAdmin(){
			$session = $this->get_userdata();
			if(isset($session)){
				if($session['access'] != 'administrator'){
					header("Location: index.php");
				}
			}else{
				header("Location: index.php");
			} 
		}
		public function exportData($form){	
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM requests WHERE form_status = ?");
			$stmt->execute([$form]);
			return $stmt;
		}

		public function chartForms(){
			$year = date("Y");
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT DISTINCT(req_dept) AS department,
				SUM(form_status = :approved) as APPROVED, 
				SUM(form_status = :denied) as DENIED,
				SUM(form_status = :pending) as PENDING,
				SUM(form_status = :completed) as COMPLETED FROM requests 
				WHERE YEAR(date_added) = :year GROUP BY department");
			$stmt->execute(["approved" => "approved", 
				"denied" => "denied", "completed" => "completed", "pending" => "pending", "year" => $year]);
			return $fetch = $stmt->fetchAll();
		}
		public function chartTable(){
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT AVG(form_status = :avgApproved) as avgApproved, 
									AVG(form_status = :avgDenied) as avgDenied, 
									AVG(form_status = :avgCompleted) as avgCompleted FROM requests 
									");
			$stmt->execute(["avgApproved" => "approved", "avgDenied" => "denied", 
				"avgCompleted" => "completed"]);
			$fetch = $stmt->fetchAll();
			return $fetch;
		}
		
		public function departments(){
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT DISTINCT req_dept FROM requests");
			$stmt->execute();
			return $stmt;
		}
		
		public function customExport(){
			if(isset($_GET['submitExport'])){
				$from = $_GET['fromdate'];
				$to = $_GET['todate'];
				$conn = $this->openConnection();
				$query = "SELECT * FROM requests WHERE ";
				$conditions = array();
				if(!empty($_GET['issues'])){
					$issues = implode(",", $_GET['issues']);
					$conditions[] = "equip_issues LIKE :issues";
				}
				if(!empty($from) && !empty($to)){
					$conditions[] = "date_added BETWEEN :start AND :to";
				}	
				if(!empty($_GET['department'])){
					$department = $_GET['department'];
					$conditions[] = "req_dept = :department";
				}
				if(!empty($_GET['form'])){
					$form_status = $_GET['form'];
					$conditions[] = "form_status = :form_status";
				}
				if(!empty($conditions)){
					$query .= implode(" AND ", $conditions);

				}else{
					$query .= "1=1";
				}
				$stmt = $conn->prepare($query);
				if(!empty($issues)){
					$issueParam = "%$issues%";
					$stmt->bindParam(':issues', $issueParam);
				}
				if(!empty($from) && !empty($to)){
					$stmt->bindParam(':start', $from);
					$stmt->bindParam(':to', $to);
				}
				if (!empty($department)) {
					$stmt->bindParam(':department', $department);
				}
				if(!empty($form_status)){
					$stmt->bindParam(':form_status', $form_status);
				}
				$stmt->execute();
				return $stmt;
			}
		}
		public function viewDetails($id){
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM requests WHERE id = :id");
			$stmt->bindValue('id', $id);
			$stmt->execute();
			return $stmt;
		}
		


	}
	$class = new RequestForm();
	?>

