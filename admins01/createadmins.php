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
if (isset($_POST['register'])) {
	global $db, $errors, $uname, $email, $fname, $phone, $gender;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$uname =  $_POST['uname'];
	$email =  $_POST['email'];
	$gender =  $_POST['gender'];
	$password =  $_POST['password'];
	$repass =  $_POST['repass'];
	$fname =  $_POST['fname'];
	$lname =  $_POST['lname'];
	$phone =  $_POST['phone'];


	// form validation: ensure that the form is correctly filled
	if (empty($uname)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($gender)) { 
		array_push($errors, "Gender is required"); 
	}
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password != $repass) {
		array_push($errors, "Passwords do not match");
	}
	if (strlen($password) < 6  ) {
		array_push($errors, "Password is too short");
	}
	if (empty($fname)) { 
		array_push($errors, "Firstname is required"); 
	}
	if (empty($lname)) { 
		array_push($errors, "Lastname is required"); 
	}
	if (empty($phone)) { 
		array_push($errors, "Phone Number is required"); 
	}

	
	if (count($errors) == 0) {
		
$check = mysqli_query($db, "SELECT * FROM users WHERE email='$email' LIMIT 1");
		if (mysqli_num_rows($check)> 0) { 
				?>
				<script> alert ("Email Already Registered by another user!!");
					window.location="createadmins.php";
				</script>
			<?php
		}else
			
$check = mysqli_query($db, "SELECT * FROM users WHERE uname='$uname' LIMIT 1");
		if (mysqli_num_rows($check)> 0) { 
				?>
				<script> alert ("Username Already Used!");
					window.location="createadmins.php";
				</script>
			<?php
		}else
				
$check = mysqli_query($db, "SELECT * FROM admin WHERE uname='$uname' LIMIT 1");
		if (mysqli_num_rows($check)> 0) { 
				?>
				<script> alert ("Username Already Used!");
					window.location="createadmins.php";
				</script>
			<?php
		}else
			
$check = mysqli_query($db, "SELECT * FROM admin WHERE email='$email' LIMIT 1");
		if (mysqli_num_rows($check)> 0) { 
				?>
				<script> alert ("Email Already Registered by another user!!");
					window.location="createadmins.php";
				</script>
			<?php
		}else{
				
		
		
$epassword = md5($password);
		
$uniqid = uniqid('', true);
$explodeuniqid = explode('.', $uniqid);
$newuniqid = end($explodeuniqid);


		$sql = mysqli_query($db, "INSERT INTO admin SET uname='$uname', gender='$gender', fname='$fname', lname='$lname', email='$email', password='$epassword', uniqid='$newuniqid', phone='$phone', picture='user.png', status=1, date=NOW()");
		if($sql) {
			
			
$to = $email;
$subject = "ACCOUNT REGISTRATION SUCCESSFUL";
$message = '
 
Thanks for signing up on Software Developers Club!
Your account has been created, your login credentials  are below, You can login with your credentials after your account has been confirmed and activated by the Administrator.

 
------------------------
UserName: '.$uname.'
Password: '.$password.'
User I.D: '.$newuniqid.'
------------------------
 
Please click this link to visit our site for help:
http://www.sdc.com/contact.php
 
'; // Our message above including the link

$headers = "From: SDC UNN | SOFTWARE DEVELOPERS CLUB";

mail($to, $subject, $message, $headers); // Send our email			

			
			
			echo "<script> alert('Registration Successful! User Unique Id is $newuniqid, Kindly keep it safe.');</script>";
         ?>	
		   <script type="text/javascript">
		window.location="createadmins.php";
			</script>
		<?php
            
				}else{
					?>	
		   <script type="text/javascript">
		alert("Unable to register admin! ");
		window.location="createadmins.php";
			</script>
		<?php
		die();
				}
			
		
		}
	}
}
?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                 <form action="createadmins.php" method="post">
				 <marquee><?php echo display_error(); ?></marquee>
<div class="row">
 
    <div class="col-xs-8 col-md-offset-2">
        <h2 class="col-sm-offset-5" style="color: #232347">Create Admin</h2>
		
         <hr>
                     <br>
<br>
<br>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">F<i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your First Name" name="fname"/>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">L<i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Last Name" name="lname"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username" name="uname"/>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Your Email" name="email"/>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">G</span>
                                            <select name="gender" class="chosen-select form-control">
                                                    <option value="">Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                            </select>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">#</span>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone"/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Retype Password" name="repass"/>
                                        </div>
                                         <button type="submit" name="register" class="btn btn-info" required="required">Register</button>                                    <hr />

          </div>
</div>		  
          </form>
   
     
      
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        <?php include("includes/footer.php"); ?>