<?php
session_start();
function isLoggedIn()
{
	if (isset($_SESSION['id'])) {
		return true;
	}else{
		return false;
	}
}
	if (!isLoggedIn()) {
	header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>


      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SDC-Club</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/animate.css">
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- Importing bootstrap 3.0, css and Javascript Files -->
    <meta charset="UTF-8" />
	<link href="css/jquery.yacal.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.yacal.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="stylechat.css" />
</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php" style="background-color: #14bfcc;">ADMIN</a>
            </div>
 <div style="color: white;
padding: 15px 150px 5px 50px;
float: left;
font-size: 30px;">&nbsp; <a href="dashboard.php" class=" square-btn-adjust" style="background-color: #4d4d4d; color: white">Software Developers Club</a> </div>
  <?php
include ("connect.php");

$admin_id = $_SESSION['id'];


	$record = mysqli_query($db, "SELECT * FROM admin WHERE id=$admin_id");

	while ( $row = mysqli_fetch_array($record) ) {


         $last_logged = $row['last_logged'];
	}
	?>
<?php
$id = 0;
if(isset($_GET['logout'])){
$id = $_GET['edit'];
echo $id;

$update = mysqli_query($db, "UPDATE admin SET last_logged=NOW() WHERE id=$id");
 if ($update) {
    unset($admin_id);
    $_SESSION = array();
    session_destroy();
    header("Location: ../adminsignin.php");
 }
 }
?>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;

font-size: 16px;"> Last access : <?php echo $last_logged; ?> &nbsp; <a href="adminlogout.php?logout=<?php echo $admin_id; ?>" class="btn btn-warning square-btn-adjust" style="background-color: #14bfcc;">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
