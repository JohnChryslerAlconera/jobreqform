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
			if(isset($_POST['employee_id'])){
				$employee_id = $_POST['employee_id'];
				$password = $_POST['password'];
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
						window.location.href = "login.php";
					</script>
					<?php
				}
			}else{
				?>
					<script>
						alert("Employee do not exist, Please be sure to sign up first");
						window.location.href = "login.php";
					</script>
					<?php
			}
		}
	}

		
				public function register(){
		if(isset($_POST['register'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$employee_id = $_POST['employee_id'];
			$contact = $_POST['contact'];
			$department = $_POST['department'];
			$dept_head_firstname = $_POST['dept_head_firstname'];
			$dept_head_lastname = $_POST['dept_head_lastname'];
			$dept_head_fullname = $dept_head_firstname. " ". $dept_head_lastname;
			$position = $_POST['position'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			if($this->check_user_exist($employee_id) == 0){
			if($password != $cpassword){
				echo "Passwords do not match";
			}else{
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$conn = $this->openConnection();
			$stmt = $conn->prepare("INSERT INTO `users`(`firstname`, `lastname`, `employee_id`, `contact`, `department`, `dept_head_fullname`, `position`, `password`) 
				VALUES (?,?,?,?,?,?,?,?)");
			$stmt->execute([$firstname, $lastname, $employee_id, $contact, $department, $dept_head_fullname, $position, $hashed_password]);
			$count = $stmt->rowCount();
			if($count > 0){
				echo "Added";
				header("Location: login.php");
			}else{
				echo "something is wrong";
				}
			}
			
		}else{
			echo "this employee_id is already registered";
		}
	}

}	
	public function set_userdata($array){
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['userdata'] = array("fullname" => $array['firstname']. " ". $array['lastname'], 
			"employee_id" => $array['employee_id'], "contact" => $array['contact'],
			 "department" => $array['department'], "dept_head_fullname" => $array['dept_head_fullname'], 
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
	// public function set_token($token){
			
	// 	return $_SESSION['csrf_token'];
	// 		return $_SESSION['csrf_token_time'];
		
	// } 
	public function get_token(){

		if(isset($_POST) & !empty($_POST)){
			if(isset($_POST['csrf_token'])){
				if($_POST['csrf_token'] == $_SESSION['csrf_token']){
					$max_time = 60*30;
					if(isset($_SESSION['csrf_token_time'])){
						$token_time = $_SESSION['csrf_token_time'];
						if(($token_time + $max_time) >= time()){
							$this->userInsertData();
							?>
					<script>
						alert("Added");
						window.location.href = "submitted.php";
					</script>
					<?php
							}else{
								unset($_SESSION['csrf_token']);
								unset($_SESSION['csrf_token_time']);
								echo "CSRF Expired";
							}
							}
				}else{
					echo "Token expired! ,Please fill up again!";
					 }

			} 
			
			}
		
		}
		public function getSubmitted(){
			$userdetails = $this->get_userdata();
			$employeeid = $userdetails['employee_id'];
			$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests WHERE employee_id = ?");
		$stmt->execute([$employeeid]);
		$form = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $form;

		}
	}




		public function userInsertData(){
			if (isset($_POST['submit'])) {
					date_default_timezone_set('Asia/Manila');
					$fullname = $_POST['fullname'];
					$req_dept = $_POST['req_dept'];
					$employee_id = $_POST['employee_id'];
					$contact = $_POST['contact'];
					$date_sub = date('Y-m-d H:i:s');
					$token = $_POST['csrf_token'];

					$dept_head_fullname = $_POST['dept_head_fullname'];
					$position = $_POST['position'];
				$euser_fname = $_POST['euserfname'];
				$euser_midname = $_POST['eusermidname'];
				$euser_lname = $_POST['euserlname'];
				$euser_suffix = $_POST['eusersuffix'];
				$euser_fullname = $euser_fname. " ". $euser_midname. " ". $euser_lname. " ". $euser_suffix;
				// $form_date = $_POST['form_date'];
				$equip_type = $_POST['equip_type'];
				$equip_num = $_POST['equip_number'];
				$equip_issues= implode(',', $_POST['issues']);
				if(strlen($equip_issues) == 0){
					echo "need to check or write issue";
				}else{	
				$required_services = implode(',', $_POST['services']);
				if(strlen($required_services) == 0){
					echo "check one or more services";
				}else{
				$conn = $this->openConnection();
				$stmt = $conn->prepare("INSERT INTO requests(req_name, req_dept, employee_id, contact, dept_head_fullname, euser_fullname, position, equip_type, equip_num, equip_issues, required_services,date_added)
					VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->execute([$fullname, $req_dept, $employee_id, $contact, $dept_head_fullname, $euser_fullname, $position, $equip_type, $equip_num, $equip_issues, $required_services, $date_sub]);
					// $insertid = $conn->lastInsertId();
				$count = $stmt->rowCount();
				if($count > 0){
					}else{
					echo "not added";
				}
			
		}
				}
	}
}
<<<<<<< Updated upstream
	public function formId(){
		if(!empty($this->userInsertData())){
			$id = $conn->lastInsertId();
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM requests WHERE id = ?");
			$stmt->execute([$id]);
			$user = $stmt->fetch();
			$this->setformId($user);
			}
=======
	public function getinsertedID(){
		$insert = $this->userInsertData();
		if(!empty($insert)){
			$id = $insert->lastInsertId();
			$id->fetchAll();
			return $id;
		}
>>>>>>> Stashed changes
	}

	public function setformId($a){
		$_SESSION['form_id'] = array("euser_fullname" => $a['euser_fullname'], "equip_type" => $a['equip_type'], "equip_num" => $a['equip_num'], "equip_issues" => $a['equip_issues'], "required_services" => $a['required_services']);
		return $_SESSION['form_id'];
			
		}
		public function getinsertedID(){
			if(isset($_SESSION['form_id'])){
				return $_SESSION['form_id'];
			}else{
				return null;
			}
		}
	
	public function addAdmin(){
		if(isset($_POST['add'])){

			$employee_id = $_POST['employee_id'];
			$password = $_POST['password'];

			if($this->check_admin_exist($employee_id) == 0){

			$conn = $this->openConnection();
			$stmt = $conn->prepare("INSERT INTO users(employee_id, password) VALUES(?,?)");
			$stmt->execute([$employee_id,$password]);


			echo "added";
			
			
			}else{
				echo 'user already exist';
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
		if(isset($_POST['register'])){
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



	public function getPendings(){
			date_default_timezone_set('Asia/Manila');
		$now = date('Y-m-d H:i:s');
		$lastweek = date('Y-m-d H:i:s', strtotime("-7 days"));
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests WHERE form_status = :form_status ORDER BY date_added DESC");
		$stmt->execute(['form_status' => 'pending']);
		$pendings = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $pendings;
		}else{
			echo "theres no pending request/s yet";
		}
	}
	public function getApproved(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests WHERE form_status = :form_status AND reason IS NULL");
		$stmt->execute(['form_status' => 'approved']);
		$approved = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $approved;

		}
	}
	public function getDenied(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests WHERE form_status = :form_status AND reason IS NULL");
		$stmt->execute(['form_status' => 'denied']);
		$denied = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $denied;
		
		}
	}
	public function getCompleted(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests WHERE changed_status_by IS NOT NULL AND reason IS NOT NULL");
		$stmt->execute();
		$completed = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $completed;	
		
		}
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
		// if(isset($_POST["approve"])){
		// 	$id = $_POST['id'];
		// 	$changed_status_by = $_POST['changed_status_by']; 
		// 	$stmt = $conn->prepare("UPDATE requests SET changed_status_by = :changed_status_by, form_status = :form_status WHERE id = :id");
 	// 		$stmt->execute(["changed_status_by" => $changed_status_by, "form_status" => "approved", "id" => $id]);
 	// 		echo "Status approved!";
 	// 	}
 	// 		if(isset($_POST["denied"])){
 	// 			$stmt = $conn->prepare("UPDATE requests SET changed_status_by = :changed_status_by, form_status = :form_status WHERE id = :id");
 	// 		$stmt->execute(["changed_status_by" => $changed_status_by, "form_status" => "denied", "id" => $id]);
		
		if(isset($_POST['submit'])){
			$id =  $_POST['id'];
			$form_status = $_POST['form_status'];
			$changed_status_by = $_POST['changed_status_by'];
			$conn = $this->openConnection();
			$stmt = $conn->prepare("UPDATE requests SET changed_status_by = :changed_status_by, form_status = :form_status WHERE id = :id");
 			$stmt->execute(["changed_status_by" => $changed_status_by, "form_status" => $form_status, "id" => $id]);
			$count = $stmt->rowCount();
			if($count > 0){
				"successfully updated";
			}else{
				"error";
				}
			}else{
				echo "select a table to update";
			}
		}
	public function redirect(){	
	 	$userdetails = $this->get_userdata();
			if(isset($userdetails)){
				if($userdetails['access'] == 'administrator'){
					header("Location: adminpanel.php");
				
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
				header("Location: login.php");
			}
		}else{
			header("Location: login.php");
		} 
	}
	public function remarks(){
		if(isset($_POST['comment'])){
			$id = $_POST['id'];
			$reason = $_POST['reason'];
			$form_status = $_POST['form_status'];
			$conn = $this->openConnection();
			$stmt = $conn->prepare("UPDATE requests SET reason = :reason WHERE id = :id");
			$stmt->execute(['reason' => $reason, 'id' => $id]);
		$count = $stmt->rowCount();
		if ($count > 0) {
			echo "commented";
		}
		$fetch = $stmt->fetch();
		return $fetch;

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
	   
}

$class = new RequestForm();
?>
