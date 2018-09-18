<?php
	session_start();
include("includes/connect.php"); ?>
<?php
$errors = array();
function display_error(){
	global $errors;
	if(count($errors) > 0){
		echo '<div class="error col-md-12 col-md-offset-3">';
			foreach ($errors as $error){
				echo "<div class='col-sm-12' id='err-box'>" . $error . "<br></div></div>";
		}
	}
}
if (isset($_POST['submit'])) {


	$name = mysqli_real_escape_string($db,$_POST['name']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$phone = mysqli_real_escape_string($db,$_POST['phone']);
	$company = mysqli_real_escape_string($db,$_POST['company']);
	$subject = mysqli_real_escape_string($db,$_POST['subject']);
	$message = mysqli_real_escape_string($db,$_POST['message']);

if(empty($name)||empty($email)||empty($phone)||empty($company)||empty($subject)||empty($message)){
	array_push($errors,"Ensure all fields are filled!");
}elseif(count($errors)== 0){
	$sql = mysqli_query($db, "INSERT INTO  public_messages SET email='$email', company='$company', phone='$phone', subject='$subject', Sender='$name', Message='$message', date=NOW() ");
	if($sql) {
			 ?>
		 <script type="text/javascript">
	alert("Thank You for your feedback.");
	window.location="contact-us.php";																	//header location
		</script>
	<?php

			}else{
				?>
		 <script type="text/javascript">
	alert("Unable to send post. Check your Internet Connection");
	window.location="contact-us.php";																//header location
		</script>
	<?php
	die();
			}
}

}
?>
<?php include("includes/header.php"); ?>
  <body class="homepage">
	<h<header id="header">
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="regform.php">Sign Up</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <!--<li><a href="blog.php">Blog</a></li> -->
                        <li class="active"><a href="contact-us.php">Contact</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->

    </header><!--/header-->
	<div class="map">
    <div class="row wow fadeInUp center">
    <h2>SDC UNN </h2>
    <p>Prof.Ezeilo Building (Abuja Building)<br>University of Nigeria,Nsukka.</p>
  </div>
		<iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=University%20of%20Nigeria%20Nsukka%2C%20Enugu+(SDCUNN)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed">
      </iframe>
	</div>

	<section id="contact-page">
        <div class="container" style="padding:0">
            <div class="center">
                <h2>Drop Your Message</h2>
                <p class="lead">If you have any question or would like to reach out to us,<br> kindly fill in the required details below and we will get back to you in the next 24hrs</p>
            </div>
            <div class="row contact-wrap ">
							<?php display_error(); ?>
                <!-- <div class="status alert alert-success" style="display: none"></div> -->
                <form id="" class="contact-form" name="contact-form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company" class="form-control" >
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" class="form-control" rows="8" ></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Message</button>
                        </div>
                    </div>
                </form>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->

    <section id="bottom">
          <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <div class="row">
                  <div class="col-md-4 col-sm-6">
                      <div class="widget">
                          <h3>SDC</h3>
                          <ul>
                              <li><a href="about-us.php">About us</a></li>
                              <li><a href="contact-us.ph">Contact us</a></li>
                              <li><a href="about-us.php">Meet the team</a></li>
                          </ul>
                      </div>
                  </div><!--/.col-md-3-->

                    <div class="col-md-4 col-sm-6">
                      <div class="widget">
                          <h3>Developers</h3>
                          <ul>
                              <li><a href="#">Web Development</a></li>
                              <li><a href="#">Android</a></li>
                                  </ul>
                      </div>
                  </div><!--/.col-md-3-->

                  <div class="col-md-4 col-sm-6">
                      <div class="widget">
                          <h3>Our Partners</h3>
                          <ul>
                              <li><a href="#">Nacoss</a></li>
                              <li><a href="#">UNN</a></li>
                          </ul>
                      </div>
                  </div><!--/.col-md-3-->
              </div>
          </div>
      </section><!--/#bottom-->
<?php include("includes/footer.php"); ?>
