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
	header('location: ../adminlogin.php');
}
include ("connect.php");
$admin_id = $_SESSION['id'];
	$record = mysqli_query($db, "SELECT * FROM admin WHERE id=$admin_id");

	while ( $row = mysqli_fetch_array($record) ) {


         $last_logged = $row['last_logged'];
	}
?>
<?php
$errors   = array();
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo "<div class='col-sm-12' id='err-box'>" . $error . "<br></div>";
			}
		echo '</div>';
	}
}
?>
<?php
$id = 0;
if(isset($_GET['logout'])){
$id = $_GET['edit'];
echo $id;

$update = mysqli_query($db, "UPDATE admin SET last_logged=NOW() WHERE id=$id");
 if ($update) {
    unset($member_id);
    $_SESSION = array();
    session_destroy();
    header("Location: ../adminlogin.php");
 }
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SDC | admin</title>
 <!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet">
		 <!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet">
		 <!-- MORRIS CHART STYLES-->
<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet">
				<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/style.css">
		 <!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body id="Uboard">
<div class="nav-fixed">
	<ul>
		<li class="sdc-text"><a>SDC |UNN</a></li>
		<li class="push_center sdc-text  animated fadeIn"><a>DASHBOARD</a></li>
		<li class="push_right">
			<a href="adminlogout.php?logout=<?php echo $admin_id; ?>"><button  class="btn btn-danger">logout</button></a>
		</li>
		<span><a style="float:right;padding-top:20px;color:#fff">last access: <?php echo $last_logged; ?></a></span>
	</ul>
</div>
