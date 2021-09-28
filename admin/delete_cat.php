<?php
	
	if(isset($_SESSION['admin_name'])){
		
?>
<?php 
	if(isset($_GET['delete_cat'])){
		
		$delete_id = $_GET['delete_cat'];
		$delete_cat = "delete from categories where id='$delete_id'";
		$run_delete = mysqli_query($db,$delete_cat);
		
		if($run_delete){
			echo"<script>alert('Category deleted')</script>";
			echo"<script>window.open('index.php?dashboard','_self')</script>";
		
		}
	}


?>



<?php
	}else{echo"<script>window.open('index.php','_self')</script>";
	}
?>