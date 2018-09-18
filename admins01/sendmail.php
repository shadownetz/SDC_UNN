<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>

<?php
 $uniqid = uniqid('', true);



$uname = "";
$email = "";
$phone = "";
$id = 0;
	


	if (isset($_GET['mail'])) {
        $id = $_GET['mail'];

        $uniqid = uniqid('', true);

        $to =
        $subject =
        $message =
        $headers =

		mail($to, $subject, $message, $headers); // Send our email			
		}

 ?>    


<div id="page-wrapper" >
            <div id="page-inner">
      
      <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h2 class="col-sm-offset-5" style="color: #232347">Admin Lists</h2>
 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                
                                <th>Phone Number</th>
                                
                                <th>Control</th>
                             
                            </tr>
                        </thead>
                        <tbody>                      
<?php
$query = "SELECT * ";
$query .= "FROM admin ";        
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['fname'] =$row['fname'];
                $fname = $_SESSION['fname'];
                $_SESSION['lname'] =$row['lname'];
		$_SESSION['email']= $row['email'];
                $picture = $row['picture'];
                $imagepath = "photo/".$picture;
                
                ?>
                <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['uname'];?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['phone']?></td>

						<td>
				<a href="sendmail.php?mail=<?php echo $row['id']; ?>" class="mail_btn" style="color:blue;"><button class="btn btn-success">Mail</button></a>
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
                    <!--End Advanced Tables -->
                </div>
            </div>



			
<?php
			if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($db, "SELECT * FROM admin WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);	
			$uname = $n['uname'];
			$password = $n['password'];
			$email = $n['email'];
			$phone = $n['phone'];			
		}
	
?>
			
                <div class="row">
                <div class="col-md-12">
				
<form method="post" action="sendmail.php">
<marquee><?php echo display_error(); ?></marquee>

        <h2 class="col-sm-offset-5" style="color: #232347">Admin Edit Page</h2>
         <hr>
                     <br>

			
<br>									
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"></span></span>
                                            <input type="hidden" class="form-control transparent" placeholder="Id"  name="id" value="<?php echo $id; ?>"/>
                                                
                                        </div>
                                        
-->                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $email; ?>"/>
                                                
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone"  value="<?php echo $phone; ?>"/>
                                                
                                        </div>
										

                                         <center><button class="btn btn-success" type="submit" name="update" style="background: green;" >Update</button></center>                                        
          </form>
		</div>
		</div> 
<?php	
}
?>		
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
 
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
