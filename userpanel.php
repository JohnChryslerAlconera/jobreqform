<?php
require "formclass.php";
$conn = $class->openConnection();
$stmt = $conn->prepare("SELECT req_dept From requests");
$stmt->execute();



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$num = "1121";
	$i = 1;
	echo ++$i.$num;	
	echo ++$i.$num;
	echo ++$i.$num;
	echo concat(++$i, $num);	// while ($row = $stmt->fetch()) {
		// 	echo $row['req_dept']. "<br>". $row['req_dept']. "<br>". $row['req_dept']. "<br>". $row['req_dept']. "<br>". $row['req_dept']. "<br>". $row['req_dept']	;
		// }

	?>

</body>
</html>