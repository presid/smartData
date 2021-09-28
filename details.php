<?php 
include("include/dbConfig.php");
if(isset($_GET['book_id'])){
			$book_id = $_GET['book_id'];
			$get_book ="select * from books where book_id='$book_id'";
			$run_book = mysqli_query($db,$get_book);
			$row_book = mysqli_fetch_array($run_book);
			$book_cat_id = $row_book['book_id'];
			$cat_id = $row_book['cat_id'];
			$book_title = $row_book['book_title'];
			$book_author = $row_book['book_author'];
			$book_coauthors = $row_book['book_coauthors'];
			$book_desc = $row_book['book_desc'];
			$book_pubYear = $row_book['book_pubYear'];
			$book_img = $row_book['book_img'];
			$book_code = $row_book['book_code'];
			
			$get_cat = "select * from categories where id='$cat_id'";
			$run_cat = mysqli_query($db,$get_cat); 
			$row_cat = mysqli_fetch_array($run_cat);
			$cat_name = $row_cat['name'];
			
			
		}
	 

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hand2Hand E-Shop </title>
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href='src/vendor/normalize.css/normalize.css' rel='stylesheet'>
  <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>
  <link href="dist/vertical-responsive-menu.min.css" rel="stylesheet">
  <!-- Owl Stylesheets -->
  <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet" />
  <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />	
  <link href="css/ss.css" rel="stylesheet">
  <link href="css/style_detail.css" rel="stylesheet">
  <link href="css/style_userprofile.css" rel="stylesheet">
</head>

<body>

<div class = "wrapper">

 <div class="col-md-12">
	<ul class="breadcrumb crumb">
		<li>
			<a href="index.php">Home</a>
		</li>
		<li>
			Details
		</li>
		<li>
			<a href="index.php?cat=<?php echo $cat_id;?>"><?php echo $cat_name;?></a>
		</li>
		<li>
		 <?php echo $book_title;?>
		</li>
	</ul>
 
 </div>
 <div class="container product">
    <div class="row">
		<div class="col-md-5">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
               
				<div class="carousel-inner">
					<div class="carousel-item active">
					  <img class="d-block w-100" src="admin/images/<?php echo $book_img?>" alt="First slide">
					</div>
						
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
			</div>
		</div>
		<div class="col-sm-6">
		
			<div class="box">
			
			<h2><?php echo $book_title;?></h2>
			
		  <form class="form-horizontal" method="post" >
		    <h3>Author: <?php echo $book_author;?> </h3>
		    <h3>Co-Author: <?php echo $book_coauthors;?> </h3>
			<p class="price">Year: <?php echo $book_pubYear;?></p>
			<!--<p><b>Availability: </b> In Stock</p>
			<p><b>Condition: </b> New</p>-->
			
			<p><i class="fa fa-code"></i><span> Book Code:</span> <?php echo $book_code;?></p>
			
			<h2> Description </h2>
			<p><?php echo $book_desc;?></p>
			
			
			
			</p>
			
			
			
			
		  </form>
		  
		  
	
			</div>
		
			
		</div>
	   
	
	</div> <!--row -->

  <!--box details-->

     
		
		
			
				
					
		   </div>
     </div>
    

    

</div>
</div>

</body>
</html>		

