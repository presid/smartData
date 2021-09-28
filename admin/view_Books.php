<?php 
 if(isset($_SESSION['admin_name'])){
		
?>

<div class="row">
	<div class="col-lg-12">
	  <h1 class="page-header">Dashboard</h1>
	  
		  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
            </li>
            <li class="breadcrumb-item active">View Books</li>
          </ol>
	
	</div>
</div>

 <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Book ID</th>
					  <th>Book Category</th>
                      <th>Book Title</th>
                      
                      <th>Book Image</th>
                      <th>Book Author</th>
                      <th>Book Co-Author</th>
                      <th>Book PubYear</th>
                      <th>Book Description</th>
                      <th>Book Code</th>
                      
					  
                      <th>Book Delete</th>
                      <th>Book Edit</th>
                    </tr>
                  </thead>
                 
                  <tbody>
				  <?php 
					$i=0;
				
						
					$get_book="select * from books";
					$run_book = mysqli_query($db,$get_book);
					while($row_book = mysqli_fetch_array($run_book)){
						$book_id = $row_book['book_id'];
						$cat_id = $row_book['cat_id'];
						
						$book_title = $row_book['book_title'];
						$book_img = $row_book['book_img'];
						$book_author = $row_book['book_author'];
						$book_coauthors = $row_book['book_coauthors'];
						$book_pubYear = $row_book['book_pubYear'];
						$book_desc = $row_book['book_desc'];
						$book_code= $row_book['book_code'];
						$i++;
					
				  
				  ?>
				  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $cat_id; ?></td>
                      <td><?php echo $book_title; ?></td>
                      <td><img src="images/<?php echo $book_img; ?>"style="width:25%;height:27%;"></td>
                      <td><?php echo $book_author; ?></td>
                      <td><?php echo $book_coauthors; ?></td>
                      <td><?php echo $book_pubYear; ?></td>
					  
					  <td><?php echo $book_desc; ?></td>
					  <td><?php echo $book_code; ?></td>
                      <td><a href="index.php?delete_book=<?php echo $book_id; ?>">
						<i class="fa fa-trash"></i> Delete
					  </a></td>
					  <td><a href="index.php?edit_book=<?php echo $book_id; ?>">
						<i class="fa fa-edit"></i> Edit
					  </a></td>
                     
                    </tr>
				  <?php
					}
				  ?>
                    
                  
                   
                     
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>



	<?php
	}else{echo"<script>window.open('login.php','_self')</script>";
	}
	?>