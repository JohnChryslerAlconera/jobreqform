<?php

require_once('formclass.php');
$userdetails = $class->get_userdata();


?>

<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<header class="header">
    <img src="https://iloilocity.gov.ph/main/wp-content/uploads/2018/07/cropped-iloilo-city-seal-300x300.png">
    <nav>
      <ul class="nav_links">
        <li>
          <a href="reqform.php">Make a Request form</a>
        </li>
        <li>
          <a href="submitted.php">Submitted Forms</a>
        </li>
        <li>
          
        </li>

      </ul>
    </nav>
   <a id="logout" href="logout.php"> <button>LOGOUT</button></a>
</header>

