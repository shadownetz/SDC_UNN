<?php
session_start();
include("includes/connect.php");
$errors   = array();
function displayError() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error . "\n";
			}
		echo '</div>';
	}
}
include("processrecover.php");
?>
<?php
$id="";$uname="";$email = "";$uniqueid="";
if(empty($_GET['id']) || empty($_GET['email'])){
  header("location:../SDC_Web_Prog/login.php");
  die();
}
$uniqueid = mysqli_real_escape_string($db,$_GET['id']);
$email = mysqli_real_escape_string($db,$_GET['email']);
$query = "SELECT * FROM users WHERE uniqid='$uniqueid' AND email='$email' ";

 $result = mysqli_query($db, $query);
 $counter=1;
 if (mysqli_num_rows($result)== 1) {
    $row = mysqli_fetch_assoc($result);

            $uname = $row['uname'];
            $email = $row['email'];
			$id = $row['id'];
}else{
  array_push($errors,"AN UNKNOWN ERROR OCCURED!");
  $id="";$uname="";$email = "";$uniqueid="";
}
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

        <div class="col-md-4 col-md-offset-4 sdc-login wow fadeIn">
          <div>		<h3 style="color:rgb(250,30,30)"></h3></div>
          <div>		<h3 style="color:rgb(250,30,30)"><?php echo displayError(); ?></h3></div>
          <form role="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>"  id="f" enctype="multipart/form-data" >
            <div> <label><h4>Password Reset:</h4></label></div>
        <div class="form-group">
            <div class="col-md-12  input-group" hidden>
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="hidden" class="form-control transparent" placeholder="Id"  name="id" value="<?php echo $id; ?>" disabled>
            </div>
            <div class="col-md-12  input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="text" class="form-control" placeholder="Username" name="uname"  value="<?php echo $uname; ?>" disabled>
            </div>
            <div class="col-md-12  input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $email; ?>" disabled>
            </div>
            <div class="col-md-12  input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="col-md-12  input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="password" class="form-control" placeholder="Re-Enter Password" name="password1" required>
            </div>
        </div>
    <div>	<button type="submit" name="update" class="btn btn-success" required>Next</button></div>
    <div class="re"><label style="color:rgb(100,100,100)">Go back to <strong> <a href="index.php">Home</a></strong></label></div>
    </form>
        </div>

    </div>
	</div>
    <script src="js/script.js"></script>
    <?php if(count($errors) !== 0){
      echo "
    <script>
    var x = document.getElementById('f');
    x.style.display = 'none';
    </script>
      ";
    }?>
    </body>
</html>
<?php die(); ?>
