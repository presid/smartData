<?php
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);






/*books from db*/
function getPro(){
	global $db;
	
	$get_books ="select * from books order by 1 DESC ";
	$run_books = mysqli_query($db,$get_books);
	while ($row_books = mysqli_fetch_array($run_books))
	{
		$book_id =$row_books ['book_id'];
		$book_title = $row_books ['book_title'];
		$book_author = $row_books ['book_author'];
		$book_pubYear = $row_books ['book_pubYear'];
		$book_img = $row_books ['book_img'];
		
		echo "
		
		
		<div class='product-card'>
			<div class='product-image'>
				<a href='details.php?book_id=$book_id'> <img src='admin/images/$book_img' class='card-img-top' alt='card img top'></a>
			</div>
			<div class='product-info'>
				<h5><a href='details.php?book_id=$book_id'> </a>
							$book_title</h5>
				<h6>$book_author</h6>
				<h6>$book_pubYear</h6>
				
					<a href='details.php?book_id=$book_id' class='btn btn-secondary btn-sm '>Details</a>
			<input type='hidden' name='book_id'value='$book_id'>
			</div>
			
		</div>
		
		
		
		
		
		";
		
	}
}

/* categories sidenav */


function show_menu(){
	
		global $db ;
		$categories = '';
	
		$categories .= generate_multilevel_menus($db);

		return $categories;
	}

	function generate_multilevel_menus($db,$id_parent=0){
	
		$menu = '';
		$sql ='';
	
		if(is_null($id_parent)){
			$sql = "SELECT * FROM `categories` WHERE `id_parent` IS 0";
		}
		else{
			$sql = "SELECT * FROM `categories` WHERE `id_parent`= $id_parent";
		}
	
		$result = mysqli_query($db,$sql);
	
		while ($row = mysqli_fetch_assoc($result)){
		
			if ($row ['id'] ){
				$menu.= '<li  ><a  href = "index.php?cat='.$row['id'].'">'.$row['name'].'</i></a>';
		
			}
			else {
			$menu.='<li ><a href ="#">'.$row['name'].'</a>';
			}
		$menu.= '<ul class ="dropdown sub_menu  " >'.generate_multilevel_menus($db,$row['id']).'</ul>';

		$menu.= '</li>';
	}
	return $menu;
	}

//geting the categories or rather descriptions 

	function getcat(){
		global $db;

		if(isset($_GET['cat'])){
	 
			$cat_id =$_GET['cat'];
		
			$get_cat = "select * from categories where id='$cat_id'";
			$run_cat = mysqli_query($db,$get_cat);
			$row_cat = mysqli_fetch_array($run_cat);
			$cat_name = $row_cat['name'];
			
			$get_books ="select * from books where cat_id='$cat_id' ";
			$run_books = mysqli_query($db,$get_books);

			$count = mysqli_num_rows($run_books);
			
	  
			if($count==0){
					echo " <div class='col-md-12 h1'>
					
					<p> No items found in this category </p>
					</div>
					";
			} 
			
			else {
					echo"
					<div class='col-md-12 h1'>
						<p> $cat_name</p> 
					</div>	
						";
			}
			
	       while ($row_books = mysqli_fetch_array($run_books))
	{
		$book_id =$row_books ['book_id'];
		$book_title = $row_books ['book_title'];
		$book_author = $row_books ['book_author'];
		$book_pubYear = $row_books ['book_pubYear'];
		$book_img = $row_books ['book_img'];
		
		echo "
		
		
		<div class='product-card'>
			<div class='product-image'>
				<a href='details.php?book_id=$book_id'> <img src='admin/images/$book_img' class='card-img-top' alt='card img top'></a>
			</div>
			<div class='product-info'>
				<h5><a href='details.php?book_id=$book_id'> </a>
							$book_title</h5>
				<h6>$book_author</h6>
				<h6>$book_pubYear</h6>
				
					<a href='details.php?book_id=$book_id' class='btn btn-secondary btn-sm '>Details</a>
			<input type='hidden' name='book_id'value='$book_id'>
			</div>
			
		</div>
		
		
		
		
		
		";
			}

	}
	
}


?>
