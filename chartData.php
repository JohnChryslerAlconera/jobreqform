<?php
$department = $_POST['department'];
include "formclass.php";
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
		FROM requests WHERE req_dept = :department");
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
	    "department" => $department]);

$count = $stmt->rowCount();
if($count > 0){
	while ($row = $stmt->fetch()){
		$data1 = $row['issue1'];
		$data2 = $row['issue2'];
		$data3 = $row['issue3'];
		$data4 = $row['issue4'];
		$data5 = $row['issue5'];
		$data6 = $row['issue6'];
		$data7 = $row['issue7'];
		$data8 = $row['issue8'];
		$data9 = $row['issue9'];
		$data10 = $row['issue10'];
		$data11 = $row['issue11'];
		$data12 = $row['issue12'];
		$data13 = $row['issue13'];
		$data14 = $row['issue14'];
		$data15 = $row['issue15'];
		$data16 = $row['issue16'];
		$data17 = $row['issue17'];
		$data18 = $row['issue18'];
		$data19 = $row['issue19'];
		$data20 = $row['issue20'];
		$data21 = $row['issue21'];

		}
}
$bar_graph = '
			<canvas id="graph" data-settings=
			\'{
				"type": "bar",
				"data": {
					"labels": ["Application crash or OS blue screen","Equipment freezes or hangs", "Damaged motherboard", "Application wont operate", "No display", "Damaged Hard drive", "Unservicesable", "Printer bunking", "Damaged memory", "Equipment wont boot or power up", "Equipment shuts down or reboots", "Display issue", "Cant access the internet", "Virus or malware", "Equipment is slow", "Wont print", "No internet connection", "Handset no dial tone", "Application wont open", "Installation(OS, Apps, Internet)", "Inspection"],
				"datasets": [{
					"label": "'. $department .' Issues",
					"backgroundColor": ["rgba(245, 76, 39, 0.8)",
								       "rgba(39, 245, 63, 0.8)",
								       "rgba(39, 245, 200, 0.8)",
								       "rgba(39, 187, 245, 0.8)",
								       "rgba(39, 46, 245, 0.8)",
								       "rgba(148, 39, 245, 0.8)",
								       "rgba(245, 39, 213, 0.8)",
								       "rgba(245, 39, 80, 0.8)",
								       "rgba(245, 142, 122, 0.51)",
								       "rgba(245, 203, 122, 0.51)",
								       "rgba(245, 244, 122, 0.51)",
								       "rgba(124, 250, 122, 0.66)",
								       "rgba(122, 250, 225, 0.66)",
								       "rgba(122, 227, 250, 0.66)",
								       "rgba(122, 169, 250, 0.66)",
								       "rgba(140, 122, 250, 0.66)",
								       "rgba(195, 122, 250, 0.66)",
								       "rgba(225, 122, 250, 0.66)",
								       "rgba(250, 122, 150, 0.66)",
								       "rgba(83, 150, 62, 0.66)",
								       "rgba(83, 150, 62, 0.66)"],
					"borderColor": "#000000",
					"data": ['. $data1 .', '.$data2.', '. $data3 .', '. $data4 .', '. $data5 .', '. $data6 .',
					'. $data7 .', '. $data8 .','. $data9 .', '. $data10 .', '. $data11 .','. $data12 .', '. $data13 .', '. $data14 .','. $data15 .','. $data16 .','. $data17 .','. $data18 .','. $data19 .','. $data20 .','. $data21 .']
					}]
				},
				"options":
				{
					"legend":
					{
						"display": false
					}
				}
			}\'
			></canvas>';

			echo $bar_graph;
?>
