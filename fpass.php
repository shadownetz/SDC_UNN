<?php
	session_start();
include("includes/connect.php");

$errors = array();
function displayError(){
    global $errors;
    if(count($errors) > 0){
    foreach($errors as $error){
        echo $error . '<br>';
    }}}
?>
<?php
// variable declaration
$uniqueid = "";


if (isset($_POST['next'])) {

global $db;
	$uniqueid = mysqli_real_escape_string($db,$_POST['uniqueid']);


	$check = mysqli_query($db, "SELECT * FROM users WHERE uniqid='$uniqueid' LIMIT 1");

	if (mysqli_num_rows($check)== 1) {

		$n = mysqli_fetch_array($check);
		$uname = $n['uname'];
		$email = $n['email'];
		$phone = $n['phone'];



	$to = $email;
	$subject = "PASSWORD RECOVERY";
	$message = '
	SDC UNN | SOFTWARE DEVELOPERS CLUB
	Please click this link to change your password:
	http://www.sdcunn.com/recover.php?email='.$email.'&id='.$uniqueid.'

	'; // Our message above including the link

	$headers = "From: sdcunn@gmail.com";

	mail($to, $subject, $message, $headers); // Send our email

	echo "<script> alert('Request Sent Successfully, Your Details Will be forwarded to your email.');</script>";
	//header("location: index.php");
}else{array_push($errors,"No Match Found!");}}
?>
<?php include("includes/header.php"); ?>
  <body id="login-body">
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
                    <a class="navbar-brand" href="index.html">SDC|UNN </a>
                    <!-- <span id="time">current time</span> -->
                </div>

                <div class="collapse navbar-collapse navbar-right ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="regform.php">Sign Up</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <!--<li><a href="blog.php">Blog</a></li> -->
                        <li><a href="contact-us.php">Contact</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->

    </header><!--/header-->

    <div class="row f">
        <div class="col-md-4 col-md-offset-4 sdc-login  wow fadeIn">
			<div>		<h3 style="color:rgb(250,30,30)"><?php echo displayError(); ?></h3></div>
					<form role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
				<label><h4>Enter Your Unique ID:</h4></label>
					<br>
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
					<input type="text" name="uniqueid" class="form-control" id="uniqueid" placeholder="Enter Your Unique ID:" >
				</div>
		<div>	<button type="submit" name="next" class="btn btn-info" required="required">Next</button></div>
		<div class="re"><label style="color:rgb(100,100,100)">Do not remember Unique ID ? <strong><a href="contact-us.php">CLick</a></strong></label></div>
		<div class="re"><label style="color:rgb(100,100,100)">Go back to <strong> <a href="index.php">Home</a></strong></label></div>
		</form>
        </div>

    </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/script.js"></script>
    </body>
</html>
<?php die(); ?>
