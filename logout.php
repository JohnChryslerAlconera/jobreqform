<?php

require_once('formclass.php');

$class->logout();
?>
 <script>
 	alert("You've been disconnected to server! \n Please log in again for security!");
 	window.location.href='login.php';


 </script>
 <?php

?>