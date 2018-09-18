<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?> 

<br>

	<div id="page-wrapper" >
            <div id="page-inner">

            <div class="row contact-wrap"> 
			<div class="text-center">
			<h3>Removed Public Messages</h3>
			</div>
                <div class="status alert alert-success" style="display: none"></div>
                  <div class="column"> 
                    
					<div  class="col-sm-12">
	<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						 <thead>
							<th>id</th>
							<td>Name</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Company</td>
							<td>Subject</td>
							<td>Messages</td>
							<td>Date</td>
						</thead>
					<?php
					
$query = "SELECT * FROM  public_messages WHERE status='2' ";
					
$result = mysqli_query($db, $query);
$counter=1;	
					while ( $row = mysqli_fetch_array($result) ) {
//		$row_counter =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['Sender'] =$row['Sender'];
                $Sender = $_SESSION['Sender'];
              
	
                ?>

					<tbody>
                <tr>
                        <td><?php echo $counter;?></td>
                        
                        <td><?php echo $row['Sender'];?></td>
                        <td><?php echo $row['Message']?></td>
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['phone']?></td>
						<td><?php echo $row['company']?></td>
						<td><?php echo $row['subject']?></td>
						<td><?php echo $row['date']?></td>
                        

			                      
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