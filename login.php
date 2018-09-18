<?php include("process_signin.php"); ?>
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
                        <li  class="active"><a href="login.php">Login</a></li>
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
        <div class="col-md-5 col-sm-12 sdc-part-login">
            <div class="col-sm-12 div-center">
        <span >
            <img class="animated zoomIn" src="images/Login-Text.png" width="100%" height="100%">
        </span>
    </div>
        </div>

        <div class="col-md-4 col-sm-6 sdc-login wow fadeIn">
            <h3 style="color:rgb(250,30,30)"><?php echo displayError(); ?></h3>
            <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >


                    <div class="col-md-12 form-content ">
                    <label for="uname"><code>UserName:</code></label>
                    <input type="text" class="form-control" placeholder="username" name="uname" value="<?php echo $uname; ?>" autofocus>
                    </div>

                    <div class="col-md-12 form-content">
                    <label for="pass"><code>Password:</code></label>
                    <input type="password" class="form-control" placeholder="password" name="password">
                    </div>
                    <div class="col-md-12">
                    <div class="col-md-6 re"> <label><strong><a href="regform.php">Not yet registered ? </a><strong></label></div>
                    <div class="col-md-6 re"> <label><strong><a href="fpass.php">Forgot password ? </a><strong></label></div>
                      </div>
                    <div class="col-md-12 div-center form-content">
                    <input type="submit" class="btn btn-warning" value="login" name="submit">
                    </div>


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
