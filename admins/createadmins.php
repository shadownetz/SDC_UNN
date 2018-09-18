<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
if (isset($_POST['register'])) {
	global $db, $errors, $uname, $email, $fname, $phone, $gender;

	    // defined below to escape form values
	$uname = mysqli_real_escape_string($db, $_POST['uname']);
	$email =  mysqli_real_escape_string($db,$_POST['email']);
	$gender =  mysqli_real_escape_string($db,$_POST['gender']);
	$password =  mysqli_real_escape_string($db,$_POST['password']);
	$repass =  mysqli_real_escape_string($db,$_POST['repass']);
	$fname =  mysqli_real_escape_string($db,$_POST['fname']);
	$lname =  mysqli_real_escape_string($db,$_POST['lname']);
	$phone =  mysqli_real_escape_string($db,$_POST['phone']);


	// form validation: ensure that the form is correctly filled
	if (empty($fname)) {
		array_push($errors, "Firstname must be filled!");
	}elseif (empty($lname)) {
		array_push($errors, "Lastname must be filled!");
	}elseif (empty($password)) {
		array_push($errors, "Password is required!");
	}elseif( strlen($password) <= 10  ) {
		array_push($errors, "Password is too short!");
	}elseif( $password !=$password1  ) {
		array_push($errors, "Password do not match!");
	}elseif (empty($email)) {
		array_push($errors, "Lastname is required!");
	}elseif (empty($phone)) {
		array_push($errors, "Phone number is required!");
	}elseif (empty($level)) {
		array_push($errors, "Enter Your Level!");
	 }elseif (empty($gender)) {
		array_push($errors, "Gender is required!");
	}else


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

		<div class="col-md-12"><h2>Create Admins</h2></div>
	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

	<div class="container-fluid">
	<?php echo display_error(); ?>
	</div>
	<div class="form-group col-md-12">
	 <div class="row">

	<div class="col-md-6 push_Up"><label for="fname">Firstname</label><input type="text" class="form-control" name="fname" placeholder="enter firstname" required></div>

	<div class="col-md-6 push_Up"><label for="lname">Lastname</label><input type="text" class="form-control" name="lname" placeholder="enter lastname" required></div>

	<div class="col-md-6 push_Up"><label for="email">Email</label><input type="email" class="form-control" name="email" placeholder="enter email" required></div>

	<div class="col-md-6 push_Up"><label for="password">New Password (min:10)</label><input type="password" class="form-control" name="password" placeholder="password" required></div>

	<div class="col-md-6 push_Up"><label for="password">Re-enter Password</label><input type="password" class="form-control" name="repass" placeholder="re-enter password" required></div>

	<div class="col-md-6 push_Up"><label for="phone">Phone-number</label><input type="tel" class="form-control" name="phone" placeholder="phone number" required></div>

<div class="col-md-6 push_Up"><label for="uname">Username</label><input type="text" class="form-control" name="uname" placeholder="username" required></div>

	<div class="col-md-6 push_Up"><label for="level">Level</label>
	 <select name="level" class="form-control" required>
			 <option value="">Select Level</option>
			 <option value="100">100</option>
			 <option value="200">200</option>
			 <option value="300">300</option>
			 <option value="400">400</option>
			 <option value="500">500</option>
			 <option value="other">Other</option>
	 </select>
	</div>

	<div class="col-md-6 push_Up"><label for="gender">Gender</label>
	 <select name="gender" class="form-control" required>
	<option value="">Select Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
	 </select>
	</div>


	<div class="col-md-12 push_Up">
	 <center><input type="submit" class="btn btn-warning" name="register" value="Register" required></center>
	</div>

	</div>

	</div>

	</form>
        </div>

        <?php include("includes/footer.php"); ?>
