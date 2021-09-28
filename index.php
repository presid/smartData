<?php

include("include/dbConfig.php");
include("functions/functions.php");

if(isset($_GET['pro_id'])){
			$product_id = $_GET['pro_id'];
			$get_product ="select * from products where product_id='$product_id'";
			$run_product = mysqli_query($db,$get_product);
			$row_product = mysqli_fetch_array($run_product);
			$pro_cat_id = $row_product['product_id'];
			$cat_id = $row_product['cat_id'];
			$pro_title = $row_product['product_title'];
			$pro_price = $row_product['product_price'];
			$pro_desc = $row_product['product_desc'];
			$contact_number = $row_product['contact_number'];
			$pro_img1 = $row_product['product_img1'];
			$pro_img2 = $row_product['product_img2'];
			$pro_img3 = $row_product['product_img3'];
			$pro_img4 = $row_product['product_img4'];
		    $user_name  = $row_product ['user_name'];
			$get_cat = "select * from categories where id='$cat_id'";
			$run_cat = mysqli_query($db,$get_cat); 
			$row_cat = mysqli_fetch_array($run_cat);
			$cat_name = $row_cat['name'];
			
			
		}
	 



?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Book Catalog</title>
     
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
      <link href="css/style.css" rel="stylesheet">
     
   </head>
   <body>
      




  
  <div class="container">
   <!--<nav class="vertical_nav">
 
   
    <ul id="js-menu" class="menu">

    <?= show_menu() ?>
    
    </ul>
	
 
  </nav>-->
		
		    <ol class="breadcrumb">
            <li class="breadcrumb-item ">
              <i class="fas fa-fw fa-tachometer-alt"></i>  <h4 class="text-center"> Book Catalog</h4>

          </ol>
	
		  <div class="row">
		    
		  
				<?php 
		  
					getPro();
				?>
		    
		    
         
		   
		</div>
		
		
	
	
	
		</div>
                  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    

   </body>
</html>