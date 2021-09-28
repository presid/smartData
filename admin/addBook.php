<?php 
 if(isset($_SESSION['admin_name'])){
		
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title> Add Book</title>
   <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>

</head>
<body>

<div class="row">
  <div class="col-lg-12">
     <ol class="breadcrumb">
		<li class="active">
		  <i class="fa fa-dashboard"></i> Dashboard / Add Book
		
		</li>
	 
	 </ol>
  
  </div>

</div>
<div class="container">
<div class="row">
    <div class="col-lg-12">
	  <div class="panel-default panel">
	    <div class="panel-heading">
		  <h3 class="panel-title">
		  
			<i class="fa fa-money fa-fw"></i> Add Book
		  
		  </h3>
		  </div>
		  <div class="panel-body">
		  
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Title</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="book_title" required>
			 </div>
			 </div>
			  <div class="form-group row">
				<label class="col-md-3 col-form-label">Category</label>
				<div class="col-md-6">
			<select name="category" class=" form-control">
			<option> Select a Category</option>
				<?php categoryTree(); ?>
			</select>	
			
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Image </label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="book_img" required>
			 </div>
			 </div>
			
			 
	
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Author</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_author" required>
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Co-Authers</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_coauthors" >
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Description</label>
				<div class="col-md-6">
				<textarea name="book_desc" cols="19" rows="10" class="form-control"></textarea>
			 </div>
			 </div>
			  <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Code</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_code" >
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Book Publication Year</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="book_pubYear" required>
			 </div>
			 </div>
			 <div class="text-center">
			 
			   <button type="submit" name="submit" value="Add Book"class="btn btn-success">
			   <i class="fa fa-plus-square">Add Book</i></button>
			 
			 </div>
		   </form>
		  
		  </div>
		
		</div>
	  
	  </div>
	
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	
	$book_title = $_POST['book_title'];
	$category = $_POST['category'];
	$book_author = $_POST['book_author'];
	$book_coauthors = $_POST['book_coauthors'];
	$book_pubYear = $_POST['book_pubYear'];
	$book_desc = $_POST['book_desc'];
	$book_code = $_POST['book_code'];
	
	$book_img = $_FILES['book_img']['name'];
	
	
	$temp_name1 = $_FILES['book_img']['tmp_name'];
	
	
	move_uploaded_file($temp_name1, "images/$book_img");
	
	
	$add_book = "insert into books(cat_id,book_title,book_img,
	book_author,book_coauthors,book_pubYear,book_desc,book_code)
	values('$category','$book_title','$book_img','$book_author',
	'$book_coauthors','$book_pubYear','$book_desc','$book_code')";
	
	$run_book = mysqli_query($db,$add_book);
	
	if($run_book){
		
		echo"<script>alert('Book has been Added sucessfully')</script>";
		echo"<script>window.open('index.php?view_Books','_self')</script>";
	}
}
	}else{echo"<script>window.open('login.php','_self')</script>";
	}
?>

