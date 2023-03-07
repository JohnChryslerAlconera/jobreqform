<?php
require "formclass.php";
$year = date('Y');
$department = $_POST['data'];
$conn = $class->openConnection();
$stmt = $conn->prepare("SELECT SUM(equip_issues LIKE :issues1) as issue1,
			 						SUM(equip_issues LIKE :issues2) as issue2,
			 						SUM(equip_issues LIKE :issues3) as issue3,
			 						SUM(equip_issues LIKE :issues4) as issue4,
			 						SUM(equip_issues LIKE :issues5) as issue5,
			 						SUM(equip_issues LIKE :issues6) as issue6,
			 						SUM(equip_issues LIKE :issues7) as issue7,
			 						SUM(equip_issues LIKE :issues8) as issue8,
			 						SUM(equip_issues LIKE :issues9) as issue9,
			 						SUM(equip_issues LIKE :issues10) as issue10,
			 						SUM(equip_issues LIKE :issues11) as issue11,
			 						SUM(equip_issues LIKE :issues12) as issue12,
			 						SUM(equip_issues LIKE :issues13) as issue13,
			 						SUM(equip_issues LIKE :issues14) as issue14,
			 						SUM(equip_issues LIKE :issues15) as issue15,
			 						SUM(equip_issues LIKE :issues16) as issue16,
			 						SUM(equip_issues LIKE :issues17) as issue17,
			 						SUM(equip_issues LIKE :issues18) as issue18,
			 						SUM(equip_issues LIKE :issues19) as issue19,
			 						SUM(equip_issues LIKE :issues20) as issue20,
			 						SUM(equip_issues LIKE :issues21) as issue21
			 						 FROM requests WHERE YEAR(date_added) = :year AND req_dept = :department");
			$stmt->execute(["issues1" => "%Application crash or OS blue screen%",
						   "issues2" => "%Equipment freezes or hangs%",
						   "issues3" => "%Damaged motherboard%",
						   "issues4" => "%Application won't operate%",
						   "issues5" => "%No display%",
						   "issues6" => "%Damaged Hard drive%",
						   "issues7" => "%Unservicesable%",
						   "issues8" => "%Printer bunking%", 
						   "issues9" => "%Damaged memory%",
						   "issues10" => "%Equipment won't boot or power up%",
						   "issues11" => "%Equipment shuts down or reboots%",
						   "issues12" => "%Display issue%",
						   "issues13" => "%Can't access the internet%",
						   "issues14" => "%Virus or malware%",
						   "issues15" => "%Equipment is slow%",
						   "issues16" => "%Won't print%",
						   "issues17" => "%No internet connection%",
						   "issues18" => "%Handset no dial tone%",
						   "issues19" => "%Application won't open%",
						   "issues20" => "%Installation(OS, Apps, Internet)%",
						   "issues21" => "%Inspection%",
						   "year" => $year, "department" => $department]);
			$data = array();
			while ($row = $stmt->fetch()) {
				$data[] = $row;
			}



echo json_encode($data);






?>