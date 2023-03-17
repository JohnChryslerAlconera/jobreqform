<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark bg-gradient">
	    <div class="container-fluid">
	      <a href="index.php" class="nav link active">
	      <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Seal_of_Iloilo_City.png" style="width:90px; height:80px;">
	      </a>
         <span class="navbar-brand ms-3 fs-2 fw-bold text-center text-light">Job Request Form</span>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end me-5 text-center" id="mynavbar">
        	 <ul class="navbar-nav ms-5">
		       	<li class="nav-item">
	           <a href="index.php" class="nav-link fs-5 <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'active'; }?>"> Go back to log in</a>
	         	</li>
		       <!--  <li class="nav-item">
		          <a href="register.php" class="nav-link fs-4 <?php if (basename($_SERVER['PHP_SELF']) == 'register.php') { echo 'active'; }?>">Sign up</a> -->
		        </li>
     	 	</ul>
	    </div>
	</div>
	</nav>