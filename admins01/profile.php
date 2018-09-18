<?php include("includes/connect.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?> 
<?php 
$errors   = array();
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error . ",\n";
			}
		echo '</div>';
	}
} 
?> 


<?php
$query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE id =$admin_id";         
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
            $fname = $row['fname'];
			$lname = $row['lname'];
            $uname = $row['uname'];
            $email = $row['email'];
            $password = $row['password'];
             $phone = $row['phone'];
            $gender = $row['gender'];
             $date = $row['date'];
			 $id = $row['id'];
        }

?>
<?php
if (isset($_POST['update'])) {
	// receive all input values from the form. Call the e() function
    // defined below to escape form values
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];

			$password = $_POST['password'];
			$password1 = $_POST['password1'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$id = $_POST['id'];

	// form validation: ensure that the form is correctly filled	
	if (empty($fname)) { 
		array_push($errors, "Firstname must be filled"); 
	}
	if (empty($lname)) { 
		array_push($errors, "Lastname must be filled"); 
	}
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}
	if( strlen($password) < 6  ) { 
		array_push($errors, "Password is too short"); 
	}
	if( $password !=$password1  ) { 
		array_push($errors, "Password do not match"); 
	}
	if (empty($email)) { 
		array_push($errors, "Lastname is required"); 
	}
	if (empty($phone)) { 
		array_push($errors, "Phone number is required"); 
	}
	if (empty($gender)) { 
		array_push($errors, "Gender is required"); 
	}
	
	// update users details if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database
		
		$update = mysqli_query($db, "UPDATE admin SET fname='$fname', lname='$lname', password='$password', email='$email', phone='$phone', gender='$gender', date= NOW() WHERE id=$id");
		if($update) {	?>
				<script>alert('Admin Profile Updated Successfully');
					window.location="profile.php";
				</script>
			<?php
		}else{
			?>
				<script>alert('Admin Profile Not Updated');
					window.location="profile.php";
				</script>
			<?php
			
		}
	}
	}

 ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                 <form method="post" action="profile.php">
<marquee><?php echo display_error(); ?></marquee>
         <h2 class="col-sm-offset-5" style="color: #232347">Admin Profile</h2>
                     <hr>
                     <br>
                        <div class="container-fluid"><img src="<?php echo $imagepath; ?>" alt="user image" height="150" class="col-lg-offset-5 img-rounded"></div>
                                   
                             
<br>
<br>
<div class="col-xs-8 col-md-offset-2">

                                        <div class="form-group input-group">
                                            <input type="hidden" class="form-control transparent" placeholder="Id"  name="id" value="<?php echo $id; ?>"/>
                                                
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">First Name</span></span>
                                            <input type="text" class="form-control transparent" placeholder="First Name"  name="fname" value="<?php echo $fname;?>"/>
                                                
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Last Name</span></span>
                                            <input type="text" class="form-control" placeholder="Last Name"  name="lname" value="<?php echo $lname;?>"/>
                                                
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Email</span></span>
                                            <input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $email;?>"/>
                                                
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Password</span></span>
                                            <input type="password" class="form-control" placeholder="Password" name="password"/>
                                                
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Re-Enter Password</span></span>
                                            <input type="password" class="form-control" placeholder="Re-Enter Password" name="password1"/>
                                                
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Phone Number</span></span>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone"  value="<?php echo $phone;?>"/>
                                        </div>
                                        <div class="form-group input-group">                                        
                                                <select name="gender" class="chosen-select form-control">
                                                    <option value="<?php echo $gender;?>">Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">date</span></span>
                                            <input type="text" class="form-control" name="date"  value="<?php echo $date;?>"/>
                                        </div>
										
										
                                        <center><button class="btn btn-success" type="submit" name="update" style="background: green;" >Update</button></center>                                      
                                        
          </form>
   </div>
     
      
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        <?php include("includes/footer.php"); ?>