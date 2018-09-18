<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?> 
<?php
	if (isset($_GET['deactivate'])) {
		$id = $_GET['deactivate'];
		$result = mysqli_query($db, "UPDATE posts SET status='0' WHERE id=$id");			
		}


	if (isset($_GET['activate'])) {
		$id = $_GET['activate'];
		$result = mysqli_query($db, "UPDATE posts SET status='1' WHERE id=$id");			
		}
?>
<br>

	<div id="page-wrapper" >
            <div id="page-inner">

            <div class="center">        
                <h2>Admin Manage Posts</h2>
            </div> 
            <div class="row contact-wrap"> 
			<h3 class="text-center">Active Posts</h3>
                <div class="status alert alert-success" style="display: none"></div>
                  <div class="column"> 
                    
					<div  class="col-sm-12">
	<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						 <thead>
							<th>id</th>
							<td>Username</td>
							<td>Posts</td>
							<td>Picture</td>
							<td>Date</td>
							<td>Control</td>
						</thead>
					<?php
					
$query = "SELECT * FROM posts WHERE status='1' ";
					
$result = mysqli_query($db, $query);
$counter=1;	
					while ( $row = mysqli_fetch_array($result) ) {
//		$row_counter =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['uname'] =$row['uname'];
                $uname = $_SESSION['uname'];
                $_SESSION['post'] =$row['post'];
		$_SESSION['post']= $row['post'];
                $post = $row['post'];
        $_SESSION['picture']= $row['picture'];
				$picture = $row['picture'];
              $imagepath = "../posts/photo/".$picture;
                
                ?>

					<tbody>
                <tr>
                        <td><?php echo $counter;?></td>
                        
                        <td><?php echo $row['uname'];?></td>
                        <td><?php echo $row['post']?></td>
                        
                    
                        <td><img src="<?php echo $imagepath; ?>" alt="user image" height="50" class="img-rounded"></td>
                        
                        <td><?php echo $row['date']?></td>
						<td>
						<a href="manageposts.php?deactivate=<?php echo $row['id']; ?>" class="deactivate_btn" style="color:blue;"><button class="btn btn-danger">De-Activate</button></a>
						</td>

			                      
				</tr>
					
				
                
                
                <?php
                $counter++;
        }
        ?>
		</tbody>
                                </table>
		</div>
					
					</div>
					</div>
					<br>
					
               
            </div><!--/.row-->
			<div class="row contact-wrap"> 
			<h3 class="text-center">In-Active Posts</h3>
                <div class="status alert alert-success" style="display: none"></div>
                  <div class="column"> 
                    
					<div  class="col-sm-12">
	<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						 <thead>
							<th>id</th>
							<td>Username</td>
							<td>Posts</td>
							<td>Picture</td>
							<td>Date</td>
							<td>Control</td>
						</thead>
					<?php
					
$query = "SELECT * FROM posts WHERE status='0' ";
					
$result = mysqli_query($db, $query);
$counter=1;	
					while ( $row = mysqli_fetch_array($result) ) {
//		$row_counter =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['uname'] =$row['uname'];
                $uname = $_SESSION['uname'];
                $_SESSION['post'] =$row['post'];
		$_SESSION['post']= $row['post'];
                $post = $row['post'];
		$_SESSION['picture']= $row['picture'];
				$picture = $row['picture'];
              $imagepath = "../posts/photo/".$picture;
                
                ?>

					<tbody>
                <tr>
                        <td><?php echo $counter;?></td>
                        
                        <td><?php echo $row['uname'];?></td>
                        <td><?php echo $row['post']?></td>
                        
                    
                        <td><img src="<?php echo $imagepath; ?>" alt="user image" height="50" class="img-rounded"></td>
                        
                        <td><?php echo $row['date']?></td>
						<td>
						<a href="manageposts.php?activate=<?php echo $row['id']; ?>" class="deactivate_btn" style="color:blue;"><button class="btn btn-success">Activate</button></a>
						</td>

			                      
				</tr>
					
				
                
                
                <?php
                $counter++;
        }
        ?>
		</tbody>
                                </table>
		</div>
					
					</div>
					</div>
					<br>
					
               
            </div><!--/.row-->
        </div><!--/.container-->

	</div>

	
	<?php include("includes/footer.php"); ?> 