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
				echo "theres one existed";
				$this->set_userdata($user);
					header("Location: reqform.php");
				
				}else{
					echo "not correct";
				}
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
		public function userInsertData(){
			if (isset($_POST['submit'])) {
					$fullname = $_POST['fullname'];
					$req_dept = $_POST['req_dept'];
					$employee_id = $_POST['employee_id'];
					$contact = $_POST['contact'];
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
				$required_services = implode(',', $_POST['services']);
				$conn = $this->openConnection();
				$stmt = $conn->prepare("INSERT INTO requests(req_name, req_dept, dept_acc_id, contact, dept_head_fullname, euser_fullname, position, equip_type, equip_num, equip_issues, required_services)
					VALUES(?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->execute([$fullname, $req_dept, $employee_id, $contact, $dept_head_fullname, $euser_fullname, $position, $equip_type, $equip_num, $equip_issues, $required_services]);
				$count = $stmt->rowCount();
				if($count > 0){
				echo "added";
				$rowId = $stmt->fetch();
				

				}else{
					echo "not added";
				}
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
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests
		 WHERE form_status = :form_status");
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
		$stmt = $conn->prepare("SELECT * FROM requests
		 WHERE form_status = :form_status");
		$stmt->execute(['form_status' => 'approved']);
		$approved = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $approved;

		}
	}
	public function getDenied(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM requests
		 WHERE form_status = :form_status");
		$stmt->execute(['form_status' => 'denied']);
		$denied = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $denied;
		
		}
	}

	public function updateStatus(){
		if(isset($_POST['update'])){	
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


		}
	}
	public function redirect(){	
	 	$userdetails = $this->get_userdata();
			if(isset($userdetails)){
				if($userdetails['access'] == 'administrator'){
					header("Location: adminpanel.php");
			}
			if($userdetails['access'] == 'user'){
					header("Location: reqform.php");
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



}



$class = new RequestForm();
?>
