<?php
session_start();
include("includes/connect.php");
?>
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

$uniqueid = mysqli_real_escape_string($db,$_GET['uniqueid']);
$email = mysqli_real_escape_string($db,$_GET['email']);


$query = "SELECT * FROM users WHERE uniqid='$uniqueid' AND email='$email' ";

 $result = mysqli_query($db, $query);
 $counter=1;
 if (mysqli_num_rows($result)== 1) {
       	while ( $row = mysqli_fetch_array($result) ) {

            $uname = $row['uname'];
            $email = $row['email'];
			$id = $row['id'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDC</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
    <link href="css/w3.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	 <link href="css/responsive.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
	 <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

  </head>
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
                    <a class="navbar-brand" href="index.html">SDC <span id="time">current time</span></a>
                </div>

                <div class="collapse navbar-collapse navbar-right ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">User login</a></li>
                        <li   class="active"><a href="adminlogin.php">Admin login</a></li>
                        <li><a href="regform.php">Sign Up</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <!--<li><a href="blog.php">Blog</a></li> -->
                        <li><a href="contact-us.php">Contact</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->

    </header><!--/header-->

    <div class="row">

        <div class="col-md-4 sdc-login wow fadeIn">
            <h3 style="color:rgb(250,30,30)"><?php echo display_error(); ?></h3>
            <form method="post" action="processrecover.php">
<marquee><?php echo display_error(); ?></marquee>
         <h2 class="col-sm-offset-5" style="color: #232347">Change Password</h2>


<br>
<div class="col-xs-8 col-md-offset-2">

                                        <div class="form-group input-group">
                                            <input type="hidden" class="form-control transparent" placeholder="Id"  name="id" value="<?php echo $id; ?>" />

                                        </div>

										<div class="form-group input-group">
											<span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Username</span></span>
                                            <input type="text" class="form-control" placeholder="Username" name="uname"  value="<?php echo $uname; ?>" disabled style="background-color:white;"/>

                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Email</span></span>
                                            <input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $email; ?>" disabled style="background-color:white;"/>

                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">New Password</span></span>
                                            <input type="password" class="form-control" placeholder="Password" name="password"/>

                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Re-Type</span></span>
                                            <input type="password" class="form-control" placeholder="Re-Enter Password" name="password1"/>

                                        </div>




                                        <center><button class="btn btn-success" type="submit" name="update" style="background: green;" >Update</button></center>

          </form>
        </div>

    </div>
	</div>
	<?php
        }
 }else{
			echo "<script> alert('ERROR UNDEFINED');</script>";
 }
?>

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
