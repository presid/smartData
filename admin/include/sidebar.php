<?php
	
	if(!isset($_SESSION['admin_name'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		
      <a class="navbar-brand mr-1" href="index.php?dashboard">Admin Area</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

     

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-md-0">
       
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i> <?php echo $admin_name;?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         
            <a class="dropdown-item" href="logout.php" >
			 <i class="fa fa-fw fa-power-off"></i>
			Logout</a>
          </div>
        </li>
      </ul>

    </nav>
	<?php
	}
	?>