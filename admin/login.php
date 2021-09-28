

<?php
	
	include("include/dbConfig.php");
	session_start();
	
	if(isset($_SESSION["admin_name"]))
	{
		header("location:index.php?dashboard");
	}
	if(isset($_POST['admin_login']))
 {
		
		if (empty($_POST["admin_name"]) || empty($_POST["admin_pass"]))
		{
			
			echo'<script>alert("Both fields are required")</script>';
		}
		else
		{
		$admin_name = mysqli_real_escape_string($db,$_POST["admin_name"]);
		$admin_pass = mysqli_real_escape_string($db,$_POST["admin_pass"]);
		$user_pass = sha1($admin_pass);
		$get_admin = "SELECT * FROM admin where admin_name='$admin_name' and admin_pass='$user_pass'";
		$run_admin = mysqli_query($db,$get_admin);
		if (mysqli_num_rows($run_admin)>0)
		
		 {
			$_SESSION["admin_name"]=$admin_name;
			
			//echo"<script>alert('logged in. welcome back')</script>";
			//echo"<script>window.open('index.php?dashboard','_self')</script>";
			header("location:index.php?dashboard");
		 }
		else
		 {
			
			echo"<script>alert('Name or Password incorrect')</script>";
		 }
	    }
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

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header center">Admin Login</div>
        <div class="card-body">
          <form action="" class="form-login" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="admin_name" class="form-control"  required="required" >
                <label for="admin_name">Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="admin_pass" class="form-control"  required="required">
                <label for="admin_pass">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="admin_login">Login</button>
          </form>
         
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>



