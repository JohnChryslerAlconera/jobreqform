<?php
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
			$firstname = $_POST['firstname'];
			$firstname = ucwords(strtolower($firstname));
			$lastname = $_POST['lastname'];
			$lastname = ucwords(strtolower($lastname));
			$employee_id = $_POST['employee_id'];
			$contact = $_POST['contact'];
			$department = $_POST['department'];
			$dept_head_firstname = $_POST['dept_head_firstname'];
			$dept_head_lastname = $_POST['dept_head_lastname'];
			$dept_head_fullname = $dept_head_firstname. " ". $dept_head_lastname;
			$dept_head_fullname = ucwords(strtolower($dept_head_fullname));
			$position = $_POST['position'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$conn = $this->openConnection();
			$stmt = $conn->prepare("INSERT INTO `users`(`firstname`, `lastname`, `employee_id`, `contact`, `department`, `dept_head_fullname`, `position`, `password`) 
				VALUES (?,?,?,?,?,?,?,?)");
			$stmt->execute([$firstname, $lastname, $employee_id, $contact, $department, $dept_head_fullname, $position, $hashed_password]);
			$count = $stmt->rowCount();
			if($count > 0){
				// echo "Added";
				header("Location: reqform.php");
			}else{
				header("location: index.php");				}
			}
		}

		public function set_userdata($array){
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['userdata'] = array("fullname" => $array['firstname']. " ". $array['lastname'], 
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
		public function get_token(){
			if(isset($_POST) & !empty($_POST)){
				if(isset($_POST['csrf_token'])){
					if($_POST['csrf_token'] == $_SESSION['csrf_token']){

					}else{
						return $error[] ="CSRF token expired!, Please fill up again";
					}

				}
				$max_time = 5;
				if(isset($_SESSION['csrf_token_time'])){
					$token_time = $_SESSION['csrf_token_time'];
					if(($token_time + $max_time) >= time()){
					}else{
						unset($_SESSION['csrf_token']);
						unset($_SESSION['csrf_token_time']);
						return $error[] = "CSRF token expired!, Please fill up again";
					}
				}

			}
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
		public function userInsertData(){
			if (isset($_POST['reqform'])) {
				date_default_timezone_set('Asia/Manila');
				$fullname = $_POST['fullname'];
				$req_dept = $_POST['req_dept'];
				$employee_id = $_POST['employee_id'];
				$contact = $_POST['contact'];
				$date_sub = date('Y-m-d H:i:s');
				$token = $_POST['csrf_token'];
				$i = 1;
				$formid = ++$i.$this->randomId();
				$dept_head_fullname = $_POST['dept_head_fullname'];
				$position = $_POST['position'];
				$euser_fname = $_POST['euserfname'];
				$euser_midname = $_POST['eusermidname'];
				$euser_lname = $_POST['euserlname'];
				$euser_suffix = $_POST['eusersuffix'];
				$euser_fullname = $euser_fname. " ". $euser_midname. " ". $euser_lname. " ". $euser_suffix;
				$euser_fullname = ucwords(strtolower($euser_fullname));
				$equip_type = $_POST['equip_type'];
				$equip_num = $_POST['equip_number'];
				$equip_issues= implode(", ", $_POST['issues']);
				if(strlen($equip_issues) == 0){
					echo "need to check or write issue";
				}else{	
					$required_services = implode(',', $_POST['services']);
					if(strlen($required_services) == 0){
						echo "check one or more services";
					}else{
						$conn = $this->openConnection();
						$stmt = $conn->prepare("INSERT INTO requests(req_name, req_dept, employee_id, contact, dept_head_fullname, euser_fullname, position, equip_type, equip_num, equip_issues, required_services,date_added,form_id)
							VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$stmt->execute([$fullname, $req_dept, $employee_id, $contact, $dept_head_fullname,
							$euser_fullname, $position, $equip_type, $equip_num, $equip_issues, 
							$required_services,$date_sub, $formid]);
						$count = $stmt->rowCount();
						if($count > 0){
							$_SESSION['status'] = "Form added";
							$_SESSION['status_code'] = "success";
							header('Location: submitted.php');
					// echo "added";
					// header('Location: submitted.php');

						}else{
							$_SESSION['status'] = "There's something wrong, form is not submitted";
							$_SESSION['status_code'] = "error";
						}	
					}
				}
			}
		}
		public function randomId(){
			$number = uniqid();
			$varray = str_split($number);
			$len = sizeof($varray);
			$formid = array_slice($varray, $len-7, $len);
			$formid = implode(",", $formid);
			$formid = str_replace(',', '', $formid);
			$formid = strtoupper($formid);	
			return $formid;
		}

		public function getinsertedID(){
			$insert = $this->userInsertData();
			if(!empty($insert)){
				$id = $insert->lastInsertId();
				$id->fetchAll();
				return $id;
			}
		}

		public function addAdmin(){
			if(isset($_POST['add'])){
				$fname = ucwords(strtolower($_POST['fname']));
				$lname = ucwords(strtolower($_POST['lname']));
				$employee_id = $_POST['employee_id'];
				$password = $_POST['password'];
				if($this->check_admin_exist($employee_id) == 0){
					$password_hash = password_hash($password, PASSWORD_DEFAULT);
					$conn = $this->openConnection();
					$stmt = $conn->prepare("INSERT INTO users(firstname, lastname, employee_id, password, access) VALUES(?,?,?,?,?)");
					$stmt->execute([$fname, $lname, $employee_id,$password_hash, "administrator"]);
					$count = $stmt->rowCount();
					if($count > 0){
						?><script>alert("ID successfully added");
					window.location.href="addadmin.php";
					</script><?php
					}
				}else{
					?><script>alert("ID already registered");
					window.location.href="addadmin.php";
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
			date_default_timezone_set('Asia/Manila');
			$now = date('Y-m-d H:i:s');
			$lastweek = date('Y-m-d H:i:s', strtotime("-7 days"));
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM requests WHERE form_status = :form ORDER BY date_added DESC");
			$stmt->execute(['form' => $form]);
			return $stmt;

		}
		// public function getnew_requests(){
	// 	date_default_timezone_set('Asia/Manila');
	// 	$now = date('Y-m-d H:i:s');
	// 	$lastweek = date('Y-m-d H:i:s', strtotime("-7 days"));
	// 	$conn = $this->openConnection();
	// 	$stmt = $conn->prepare("SELECT * FROM requests WHERE date_added BETWEEN ? AND ?
	// 		");
	// 	$stmt->execute([$lastweek,$now]);
	// 	$newrequests = $stmt->fetchAll();
	// 	$count = $stmt->rowCount();
	// 	if($count > 0){
	// 		return $newrequests;
	// 	}
	// }

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
		public function pdf(){
			if(isset($_POST['printpdf'])){
				$id = $_POST['id'];
				$conn = $this->openConnection();
				$stmt = $conn->prepare("SELECT * FROM requests WHERE id = ?");
				$stmt->execute([$id]);
				$data = $stmt->fetchAll();
				return $data;
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
					echo "Form updated to completed";
					header("Location: approved.php");
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

		public function getprint(){
			if(isset($_POST['printpdf'])){
				$id = $_POST['id'];
				$conn = $this->openConnection();
				$stmt = $conn->prepare("SELECT * FROM requests WHERE id = ?");
				$stmt->execute([$id]);
				$data = $stmt->fetch();
				return $data;
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
  $stmt = $conn->prepare("SELECT MONTHNAME(date_added) AS MONTH,
        SUM(form_status = :approved) as APPROVED, 
        SUM(form_status = :denied) as DENIED,
        SUM(form_status = :pending) as PENDING,
        SUM(form_status = :completed) as COMPLETED FROM requests 
        WHERE YEAR(date_added) = :year GROUP BY MONTH ORDER BY date_added ASC");
      $stmt->execute(["approved" => "approved", 
      "denied" => "denied", "completed" => "completed", "pending" => "pending", "year" => $year]);
      return $fetch = $stmt->fetchAll();
		}
		public function searchForm(){
			if(isset($_GET['load'])){
				$search = $_GET['search'];
				$conn = $this->openConnection();
				$stmt = $conn->prepare("SELECT * FROM requests WHERE form_id LIKE :search OR req_name LIKE :search OR req_dept LIKE :search OR employee_id LIKE :search OR equip_issues LIKE :search GROUP BY form_status");
				$stmt->bindValue(':search', "%".$search."%", PDO::PARAM_STR);
				$stmt->execute();
				$searched = $stmt->fetchAll();
				return $searched;
			}
		}
		public function departments(){
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT DISTINCT req_dept FROM requests");
			$stmt->execute();
			return $stmt;
		}
		public function customExport(){
			if (isset($_GET['exportcustom'])){
				$conn = $this->openConnection();
				$from = date('Y-m-d 00:00:00', strtotime($_GET['fromdate']));
				$to = date('Y-m-d 00:00:00', strtotime($_GET['todate']));
				if(!empty($_GET['issues']) && !empty($from) && !empty($to)) {
					$issues = implode(",",$_GET['issues']);
					$stmt = $conn->prepare("SELECT * FROM requests WHERE equip_issues LIKE :issues AND date_added
						BETWEEN :start AND :to");
					$stmt->execute(["issues" => $issues, "start" => $from, "to" => $to]);
					return $stmt;
				}
				if(empty($_GET['issues']) && !empty($from) && !empty($to)){
					$stmt = $conn->prepare("SELECT * FROM requests WHERE date_added
						BETWEEN :start AND :to");
					$stmt->execute(["start" => $from, "to" => $to]);
					return $stmt;
				}
				if(!empty($_GET['issues']) && empty($from) && empty($to)) {
										$issues = implode(",",$_GET['issues']);
					$stmt = $conn->prepare("SELECT * FROM requests WHERE equip_issues LIKE :issues");
					$stmt->execute(["issues" => "%".$issues."%"]);
					return $stmt;
				}
			}
		}


				// if(isset($_GET['exportcustom']) && empty($_GET['issues'])){

 }
	$class = new RequestForm();
	?>

