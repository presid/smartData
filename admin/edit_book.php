<?php
	
	if(!isset($_SESSION['admin_name'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>

<?php
if (isset($_GET['edit_book'])){
	$edit_id = $_GET['edit_book'];
	$get_book = "select * from books where book_id='$edit_id'";
	$run_book = mysqli_query($db,$get_book);
	$row_book = mysqli_fetch_array($run_book);
	$book_id = $row_book['book_id'];
	$cat_id = $row_book['cat_id'];
	
	$book_title = $row_book['book_title'];
	$book_img = $row_book['book_img'];
	$book_author = $row_book['book_author'];
	$book_coauthors = $row_book['book_coauthors'];
	$book_pubYear = $row_book['book_pubYear'];
	$book_desc = $row_book['book_desc'];
	$book_code= $row_book['book_code'];
}
	$get_cat = "select * from categories where id='$cat_id' ";
	$run_cat = mysqli_query($db,$get_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	$cat_title = $row_cat['name']; 

?>
<?php

require ("include/dbConfig.php");

function categoryTree($id_parent = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM categories WHERE id_parent = $id_parent ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree($row['id'], $sub_mark.'---');
        }
    }
}
?>

			<div class="container">
<div class="row">
    <div class="col-lg-12">
	  <div class="panel-default panel">
	    <div class="panel-heading">
		  <h3 class="panel-title">
		  
			<i class="fa fa-money fa-fw"></i> Edit Book
		  
		  </h3>
		  </div>
		  <div class="panel-body">
		  
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Title</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="book_title" required value="<?php echo$book_title?>">
			 </div>
			 </div>
			  <div class="form-group row">
				<label class="col-md-3 col-form-label">Category</label>
				<div class="col-md-6">
			<select name="category" class=" form-control">
			
			<option value="<?php echo $cat_id; ?>"> <?php echo $cat_title; ?></option>
				<?php categoryTree(); ?>
			</select>	
			
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Image </label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="book_img" required>
			 <img class="img-responsive col-md-6"  src="images/<?php echo $book_img;?>" alt="<?php echo $book_img;?>">
			 </div>
			 </div>
			
			 
	
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Author</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_author" required value="<?php echo$book_author?>" >
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Co-Authers</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_coauthors" value="<?php echo$book_coauthors?>" >
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Description</label>
				<div class="col-md-6">
				<textarea name="book_desc" cols="19" rows="10" class="form-control">
				<?php echo $book_desc;?>
				</textarea>
			 </div>
			 </div>
			  <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Code</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_code" value="<?php echo $book_code;?>">
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Publication Year</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_pubYear" required value="<?php echo $book_pubYear;?>">
			 </div>
			 </div>
			 <div class="text-center">
			 
			   <button type="update" name="update" value="update Item"class="btn btn-success">
			   <i class="fa fa-plus-square">Update Book</i></button>
			 
			 </div>
		   </form>
		  
		  </div>
		
		</div>
	  
	  </div>
	
		 
				
		  
		
	

	


<?php
if(isset($_POST['update'])){
	


	
	$book_title = mysqli_real_escape_string ($db,$_POST['book_title']);
	$category = mysqli_real_escape_string ($db,$_POST['category']);
	$book_author = mysqli_real_escape_string ($db,$_POST['book_author']);
	$book_coauthors = mysqli_real_escape_string ($db,$_POST['book_coauthors']);
	$book_pubYear = mysqli_real_escape_string ($db,$_POST['book_pubYear']);
	$book_desc = mysqli_real_escape_string ($db,$_POST['book_pubYear']);
	$book_code = mysqli_real_escape_string ($db,$_POST['book_pubYear']);
	
	$book_img = $_FILES['book_img']['name'];
	$temp_name1 = $_FILES['book_img']['tmp_name'];
	move_uploaded_file($temp_name1, "images/$book_img");
	
	
	$update_book = "update books set cat_id='$category',book_title='$book_title',book_img='$book_img',
	book_author='$book_author',book_coauthors='$book_coauthors',book_pubYear='$book_pubYear',book_desc='$book_desc',book_code='$book_code' where book_id='$book_id'";
	
	$run_book= mysqli_query($db,$update_book);
	
	if($run_book){
		echo "<script>alert('Your book has been updated successfully') </script>";
		echo "<script>window.open('index.php?dashboard','_self') </script>";
	}
}
	}
?>
