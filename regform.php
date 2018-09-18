<?php
session_start();
?>
<?php include("includes/connect.php"); ?>
<?php

$errors   = array();
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<h5 style="color:rgb(250,30,30)">';
			foreach ($errors as $error){
				echo $error;
			}
		echo '</h5>';
	}
}


if (isset($_POST['register'])) {
	global $db, $errors, $uname, $email, $fname, $phone, $gender;

	// receive all input values from the form.
    // defined below to escape form values
	$uname =  mysqli_real_escape_string($db,$_POST['uname']);
	$email =  mysqli_real_escape_string($db,$_POST['email']);
	$gender =  mysqli_real_escape_string($db,$_POST['gender']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$repass =  mysqli_real_escape_string($db,$_POST['repass']);
	$fname =  mysqli_real_escape_string($db,$_POST['fname']);
	$lname =  mysqli_real_escape_string($db,$_POST['lname']);
	$phone =  mysqli_real_escape_string($db,$_POST['phone']);
  $level = mysqli_real_escape_string($db,$_POST['level']);
  $bio =  mysqli_real_escape_string($db,$_POST['bio']);
	$echeck1 = mysqli_query($db, "SELECT * FROM admin WHERE email='$email' LIMIT 1");
	$echeck2 = mysqli_query($db, "SELECT * FROM users WHERE email='$email' LIMIT 1");
	$ucheck1 = mysqli_query($db, "SELECT * FROM admin WHERE uname='$uname' LIMIT 1");
	$ucheck2 = mysqli_query($db, "SELECT * FROM users WHERE uname='$uname' LIMIT 1");
	$pcheck1 = mysqli_query($db, "SELECT * FROM admin WHERE phone='$phone' LIMIT 1");
	$pcheck2 = mysqli_query($db, "SELECT * FROM users WHERE phone='$phone' LIMIT 1");
	// form validation: ensure that the form is correctly filled
	if (empty($fname)) {
		array_push($errors, "FirstName is required");
	}elseif (empty($lname)) {
		array_push($errors, "LastName is required");
	}elseif (empty($email)) {
		array_push($errors, "Email is required");
	}elseif (empty($phone)) {
		array_push($errors, "PhoneNumber is required");
	}elseif (empty($password)) {
		array_push($errors, "Password is Required");
	}elseif (empty($uname)) {
		array_push($errors, "UserName is required");
	}elseif($password != $repass) {
		array_push($errors, "Passwords do not match");
	}elseif (empty($gender)) {
		array_push($errors, "Please select your gender");
	}elseif(empty($level)){
    array_push($errors, "Select Your Level");
  }elseif(mysqli_num_rows($echeck1)> 0 || mysqli_num_rows($echeck2)> 0){
		array_push($errors, "email address already in use!");
	}elseif(mysqli_num_rows($ucheck1)> 0 || mysqli_num_rows($ucheck2)> 0){
		array_push($errors, "username already in use!");
	}elseif(mysqli_num_rows($pcheck1)> 0 || mysqli_num_rows($pcheck2)> 0){
		array_push($errors, "phone number already in use!");
	}else{
	$epassword = md5($password);
	if (count($errors) == 0) {
$uniqid = uniqid('', true);
$explodeuniqid = explode('.', $uniqid);
$newuniqid = end($explodeuniqid);
$check1 = mysqli_query($db, "SELECT * FROM admin WHERE uniqid='$newuniqid' LIMIT 1");
$check2 = mysqli_query($db, "SELECT * FROM users WHERE uniqid='$newuniqid' LIMIT 1");
while (mysqli_num_rows($check1)> 0 || mysqli_num_rows($check2)> 0 ){
	$uniqid = uniqid('', true);
	$explodeuniqid = explode('.', $uniqid);
	$newuniqid = end($explodeuniqid);
}

		$sql = mysqli_query($db, "INSERT INTO users SET uname='$uname', fname='$fname',gender='$gender',lname='$lname', email='$email', password='$epassword', level='$level',uniqid='$newuniqid', phone='$phone', picture='user.png', status=2, aim='$bio',date=NOW()");
		if($sql) {
			$to = $email;
		$subject = "ACCOUNT REGISTRATION SUCCESSFUL";
		$message = '
		SDC UNN | SOFTWARE DEVELOPERS CLUB
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

		$headers = 'From: sdcunn@gmail.com';

		mail($to, $subject, $message, $headers); // Send our email



					echo "<script> alert('Registration Successful! Your unique Id is $newuniqid, Kindly keep it safe.');</script>";
		         ?>
				   <script type="text/javascript">
				window.location="login.php";
					</script>
				<?php

						}else{
							?>
				   <script type="text/javascript">
				alert("Unable to register! ");
				window.location="regform.php";
					</script>
				<?php
				die();
						}


				}
			}
		}
?>
<?php include("includes/header.php"); ?>
<body id="form-body">
   <header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">SDC|UNN</a>
										 <!-- <span id="time">Current Time</span> -->
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
												<li class="active"><a href="regform.php">Sign Up</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <!--<li><a href="blog.php">Blog</a></li> -->
                        <li><a href="contact-us.php">Contact</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->

    </header><!--/header-->
<div class="row">
<div class="col-md-4 sdc-part-login">
    <div class="col-sm-12 div-center">
        <span >
            <img class="animated zoomIn" src="images/REGFORM-TEXT.png" width="100%" height="100%">
        </span>
    </div>
</div>


<div class="col-md-7 col-sm-10 regform-img ">
    <form class="new-form animated fadeIn" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
        <!-- to display error-->
        <div><?php echo display_error(); ?></div>
        <div class="form-group col-sm-12">
            <div class="row form-content">

                    <div class="col-md-6">
                        <label for="fname">First Name</label>
                        <input class="form-control" type="text" id="fname" name="fname" placeholder="firstname" autofocus required>
                    </div>



                    <div class="col-md-6">
                        <label for="lname">Last Name</label>
                        <input class="form-control" type="text" id="lname" placeholder="lastname" name="lname" required>
                    </div>

            </div>
            <div class="row form-content">

                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="mail@example.com" required>
                    </div>


                    <div class="col-md-6">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" type="tel" id="pnumber" name="phone" placeholder="phone-number" required>
                    </div>

            </div>
            <div class="row form-content">

                    <div class="col-md-6">
                        <label>Gender:</label>
												<select name="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="level">Level of Study</label>
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

            </div>
            <div class="row form-content">
                <div id="user">usertype:<input id="user-type" type="radio" value="user" disabled></div>
            </div>
            <div class="row form-content">
                <div class="col-sm-6">
                    <label for="pass">Password</label>
                    <input type="password" id="passcode" class="form-control" name="password" placeholder="type password here" required>
                </div>
                <div class="col-sm-6">
                    <label for="repass">ReType Password</label>
                    <input type="password" id="passcode" class="form-control" name="repass" placeholder="re-type password here" required>
                </div>
            </div>
            <div class="row form-content">
                <div class="col-sm-12">
                <label for="uname">Username</label>
                    <input type="text" id="passcode" class="form-control" name="uname" placeholder="username" required>
                </div>
            </div>
            <div class="row form-content">

                    <div class="col-md-12">
                    <label for="bio">What do you aim to achieve with us&#63;</label>
                    <textarea class="form-control form-text" rows=3 placeholder="Type Here" name="bio" required></textarea>
                    </div>

            </div>
            <div class="row form-content">
                <div class="col-md-12 div-center"><input type="submit" class="btn btn-danger" name="register" value="Submit" required></div>
            </div>
        </div>
    </form>
</div>
    </div>
<?php include("includes/footer.php"); ?>
