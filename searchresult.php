<?php
include "formclass.php";
	$search = $_POST['search'];
	$conn = $class->openConnection();
	$stmt = $conn->prepare("SELECT * FROM requests WHERE req_dept LIKE :search OR form_id LIKE :search OR dept_head_fullname LIKE :search OR equip_issues LIKE :search OR form_status LIKE :search");
	$stmt->bindValue(':search', '%'.$search.'%');
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	echo json_encode($result);


?>