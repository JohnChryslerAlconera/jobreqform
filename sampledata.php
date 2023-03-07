<?php
require_once "formclass.php";
$conn = $class->openConnection();
isset($_POST['department']) ? $department = $_POST['department'] : $department = "";

$query = "SELECT 
            SUM(equip_issues LIKE :issues1) AS issue1,
            SUM(equip_issues LIKE :issues2) AS issue2,
            SUM(equip_issues LIKE :issues3) AS issue3,
            SUM(equip_issues LIKE :issues4) AS issue4,
            SUM(equip_issues LIKE :issues5) AS issue5 
          FROM requests 
          WHERE req_dept = :department";
$stmt = $conn->prepare($query);
$stmt->execute(["issues1" => "%Application crash or OS blue screen%",
						   "issues2" => "%Equipment freezes or hangs%",
						   "issues3" => "%Damaged motherboard%",
						   "issues4" => "%Application won't operate%",
						   "issues5" => "%No display%",
						   "department" => $department]);
$count = $stmt->rowCount();
$data[] = "";
if($count > 0){
	while ($row = $stmt->fetch()){
		$data1 = $row['issue1'];
		$data2 = $row['issue2'];
		$data3 = $row['issue3'];
		$data4 = $row['issue4'];
		$data5 = $row['issue5'];
		}
}
$bar_graph = '
			<canvas id="graph" data-settings=
			\'{
				"type": "bar",
				"data": {
					"labels": ["Application crash or OS blue screen","Equipment freezes or hangs", "Damaged motherboard", "Application wont operate", "No display"],
				"datasets": [{
					"label": "'. $department .'Issues",
					"backgroundColor": "#000000",
					"borderColor": "#000000",
					"data": ['. $data1 .', '.$data2.']
					}]
				},
				"options":
				{
					"legend":
					{
						"display": true
					}
				}
			}\'
			></canvas>';

			echo $bar_graph;

?>