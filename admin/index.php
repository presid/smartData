
<?php
	session_start();
	include("include/dbConfig.php");
	if(!isset($_SESSION['admin_name'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else if (isset($_SESSION['admin_name'])) {
		
		$admin_session = $_SESSION['admin_name'];
		
		$get_admin = "select * from admin where admin_name='$admin_session'";
		$run_admin = mysqli_query($db,$get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$admin_id = $row_admin['admin_id'];
		$admin_name = $row_admin['admin_name'];
		/*$admin_image = $row_admin['admin_image'];
		$admin_about = $row_admin['admin_about'];
		$admin_contact = $row_admin['admin_contact'];
		/*$get_products = "select * from products";
		$run_products = mysqli_query($db,$get_products);
		$count_products = mysqli_num_rows($run_products);
		$get_users = "select * from users";
		$run_users = mysqli_query($db,$get_users);
		$count_users = mysqli_num_rows($run_users);
		$get_p_cat = "select * from categories";
		$run_p_cat = mysqli_query($db,$get_p_cat);
		$count_p_cat = mysqli_num_rows($run_p_cat);
		$get_hot_pro = "select * from hot_deals";
		$run_hot_pro = mysqli_query($db,$get_hot_pro);
		$count_hot_pro = mysqli_num_rows($run_hot_pro);*/
		}
		
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin_Area</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
<?php include("include/sidebar.php");?>
<body id="page-top">

<div id="wrapper">
	 <div class="container-fluid">

          <!-- Breadcrumbs-->
        
           <?php 
			if(isset($_GET['dashboard'])){
			  
				include("dashboard.php");
		   } 
		   if(isset($_GET['addBook'])){
			  
				include("addBook.php");
		   } 
		   if(isset($_GET['view_Books'])){
			  
				include("view_Books.php");
		   }
		
		if(isset($_GET['edit_book'])){
			  
				include("edit_book.php");
		   }
		
	
	
			  
		
		
		   
			if(isset($_GET['insert_cat'])){
			  
				include("insert_cat.php");
			}
		    if(isset($_GET['view_cat'])){
			  
				include("view_cat.php");
		   }
		     if(isset($_GET['delete_cat'])){
			  
				include("delete_cat.php");
		   }  
		   if(isset($_GET['edit_cat'])){
			  
				include("edit_cat.php");
		   }
		  
		
		 
				
			
		 
		   
		   ?>
          </div>
        <!-- /.container-fluid -->


      <div id="content-wrapper">

       
	<!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-book"></i>
            <span>Books</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="productsDropdown">
            <h6 class="dropdown-header">Books:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?addBook">Add Books</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_Books">View Books</a>
            
          </div>
        </li>
		
		
		
		  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="p_catDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-edit"></i>
            <span>Categories</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="p_catDropdown">
            <h6 class="dropdown-header">Categories:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?insert_cat">Insert Category</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_cat">View Categories</a>
            
          </div>
        </li>
		
		
        
        
		
	
			
		
		<div class="dropdown-divider"></div>
		 
		<li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
        </li>
      </ul>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Hand2Hand 2021</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
