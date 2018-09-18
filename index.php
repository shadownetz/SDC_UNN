<?php include("includes/connect.php"); ?>
<?php
$query = "SELECT * ";
$query .= "FROM gallery ";
$query .= "WHERE status = '1' ";
$count = 1;
$imageList = array();
$msgList = array();
$result1 = mysqli_query($db, $query);

while ( $row1 = mysqli_fetch_array($result1) ) {
                $image1 = $row1['image1'];
                $imagepath1 = "gallery/photo/".$image1;
                $msg1 = $row1['imageMessage1'];
                array_push($msgList,$msg1);
                array_push($imageList,$imagepath1);
				$image2 = $row1['image2'];
                $imagepath2 = "gallery/photo/".$image2;
                $msg2 = $row1['imageMessage2'];
                array_push($msgList,$msg2);
                array_push($imageList,$imagepath2);
				$image3 = $row1['image3'];
                $imagepath3 = "gallery/photo/".$image3;
                $msg3 = $row1['imageMessage3'];
                array_push($msgList,$msg3);
                 array_push($imageList,$imagepath3);
				$image4 = $row1['image4'];
                $imagepath4 = "gallery/photo/".$image4;
                    $msg4 = $row1['imageMessage4'];
                array_push($msgList,$msg4);
                array_push($imageList,$imagepath4);
				$image5 = $row1['image5'];
                $imagepath5 = "gallery/photo/".$image5;
                    $msg5 = $row1['imageMessage5'];
                array_push($msgList,$msg5);
                array_push($imageList,$imagepath5);
				$image6 = $row1['image6'];
                $imagepath6 = "gallery/photo/".$image6;
                    $msg6 = $row1['imageMessage6'];
                array_push($msgList,$msg6);
                array_push($imageList,$imagepath6);
				$image7 = $row1['image7'];
                $imagepath7 = "gallery/photo/".$image7;
                    $msg7 = $row1['imageMessage7'];
                array_push($msgList,$msg7);
                array_push($imageList,$imagepath7);
				$image8 = $row1['image8'];
                $imagepath8 = "gallery/photo/".$image8;
                    $msg8 = $row1['imageMessage8'];
                array_push($msgList,$msg8);
                array_push($imageList,$imagepath8);
				$image9 = $row1['image9'];
                $imagepath9 = "gallery/photo/".$image9;
                    $msg9 = $row1['imageMessage9'];
                array_push($msgList,$msg9);
                array_push($imageList,$imagepath9);
				$image10 = $row1['image10'];
                $imagepath10 = "gallery/photo/".$image10;
                    $msg10 = $row1['imageMessage10'];
                array_push($msgList,$msg10);
                array_push($imageList,$imagepath10);
			$_SESSION['no_of_images']= $row1['no_of_images'];
				$no_of_images = $row1['no_of_images'];
 ?>
<?php include("includes/header.php"); ?>
  <body class="homepage">
	<header>
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
                        <li class="active"><a href="index.php">Home</a></li>
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
	<div class="row"><br>
        <div class="col-md-12" id="sdc-name-full"><h1 class="animated fadeInUp">SOFTWARE DEVELOPERS<br><b>CLUB</b></h1>
        <span style="float:right;padding-right:1em" class="animated fadeIn"><code><i>...coding with insight</i></code></span></div>

      </div>
	<div class="slider" >
		<div class="container"  >
			<div id="about-slider" >
				<div div id="carousel-slider" class="carousel " data-ride="carousel" >
					<div class="carousel-inner">

				<div class="item active">

                    <div class="col-sm-12 slide-content " >

            <div class="col-sm-12 myslides w3-animate-fading" style="width:100%;background-color:transparent;overflow:hidden;background-image: url('<?php echo $imagepath1; ?>');background-repeat:no-repeat;background-size: 100%;height:35em;background-position: center;">
                     <span> <div class="col-sm-3 slide-html animated slideInLeft ">
                <div> <h2> SDC UNN </h2> </div>
                <div><p><?php echo $msg1; ?></p> </div>
                 <div class="col-md-12"><a class="btn btn-success sdc-project-btn" href="regform.php">Join Us </a></div>
                         </div> </span>
            </div>

                    </div>

				   <div class="carousel-caption">
				   </div>
				</div>
                <?php while($count < $no_of_images) { ?>
                                <div class="item">

                    <div class="col-sm-12 slide-content " >

            <div  class="col-sm-12 myslides w3-animate-fading" style="width:100%;background-color:transparent;overflow:hidden;background-image: url('<?php echo $imageList[$count]; ?>');background-repeat:no-repeat;background-size: 100%;height:35em;background-position: center;">

                  <span> <div class="col-sm-3 slide-html animated slideInLeft ">
                <div> <h2> SDC UNN</h2> </div>
                <div><p><?php echo $msgList[$count]; ?></p> </div>
                 <div class="col-md-12"><a class="btn btn-success sdc-project-btn" href="regform.php">Join Us </a></div>
                      </div>      </span>
                </div>

                    </div>

				   <div class="carousel-caption">
				   </div>

				</div>

    <?php $count ++;}  } ?>
					</div>
					<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>

					<a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div> <!--/#carousel-slider-->
			</div><!--/#about-slider-->
		</div>
	</div>

	 <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown" id="sdc-body2 ">
                <h2>What We Offer</h2>
                <p class="lead">Develop Your Basic Skills in...</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-html5"></i>
                            <h2>HTML &frasl; CSS</h2>
                            <h3>Active Html and CSS Sessions including the latest HTML5</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-css3"></i>
                            <h2>BOOTSTRAP</h2>
                            <h3>Responsive Applications?<br>...we gotcha!</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-code"></i>
                            <h2>PHP</h2>
                            <h3>Communicate with the database with your own version of code</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-android"></i>
                            <h2>Android</h2>
                            <h3>Get acquainted the Android Studio App and start building your own apps.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-code-fork"></i>
                            <h2>JavaScript</h2>
                            <h3>Enrich your webpages with high end interactive pages.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud"></i>
                            <h2>Resources</h2>
                            <h3>Access to materialsranging from helpful programming online resources to practical manuals</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#feature-->
<?php include("includes/footer.php") ?>
