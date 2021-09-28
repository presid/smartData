<?php
	
	if(!isset($_SESSION['admin_name'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>
<?php 
	if(isset($_GET['delete_book'])){
		
		$delete_id = $_GET['delete_book'];
		$delete_pro = "delete from books where book_id='$delete_id'";
		$run_delete = mysqli_query($db,$delete_pro);
		
		if($run_delete){
			echo"<script>alert('Book deleted')</script>";
			echo "<script>window.open('index.php?dashboard','_self') </script>";
		
		}
	}


?>



<?php
	}
?>