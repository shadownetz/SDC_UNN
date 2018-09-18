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
include ("connect.php");
$member_id = $_SESSION['id'];
	$record = mysqli_query($db, "SELECT * FROM users WHERE id=$member_id");

	while ( $row = mysqli_fetch_array($record) ) {


         $last_logged = $row['last_logged'];
	}
	?>
<?php
$id = 0;
if(isset($_GET['logout'])){
$id = $_GET['edit'];
echo $id;

$update = mysqli_query($db, "UPDATE users SET last_logged=NOW() WHERE id=$id");
 if ($update) {
    unset($member_id);
    $_SESSION = array();
    session_destroy();
    header("Location: ../signin.php");
 }
 }
?>
<?php
$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE id =$member_id";
$result = mysqli_query($db, $query);
       	while ($row = mysqli_fetch_array($result) ) {
                $member_count =  mysqli_num_rows($result);
                $fname = $row['fname'];
				$uname = $row['uname'];
                $lname = $row['lname'];
                $picture = $row['picture'];
                $imagepath = "photo/".$picture;
                $group_views = $row['group_views'];
        }
        $query = "SELECT * ";
$query .= "FROM posts ";
$query .= "WHERE status = '1' ";
$result = mysqli_query($db, $query);
	$posts_count = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $posts_count =  mysqli_num_rows($result);
				$new_message_count = $posts_count - $group_views;
  $update_my_posts = mysqli_query($db, "UPDATE users SET group_views='$posts_count' WHERE id=$member_id");
        }
        ?>
         <?php
         //include ("../connect.php");
         //session_start();
         $member_id = $_SESSION['id'];



                     $hour = date("H");
                 if($hour >= 20){
                     $greeting = "Good Night ". $fname . " ". $lname . " , Have a good night rest.";
                 }elseif ($hour > 17) {
                     $greeting = "Good Evening ". $fname ." ". $lname. ", Hope you enjoyed your day?";
                 }elseif ($hour > 11) {
                     $greeting = "Good Afternoon ". $fname . " ". $lname. ", How is your day coming?";
                 }elseif ($hour < 12) {
                     $greeting = "Good Morning ". $fname ." ".$lname . ", How was your night?";
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
         $query = "SELECT * ";
         $query .= "FROM users ";
         $query .= "WHERE id =$member_id";
                   $index = 0;
          $result = mysqli_query($db, $query);
          $counter=1;
                	while ( $row = mysqli_fetch_array($result) ) {
                     $fname = $row['fname'];
                     $lname = $row['lname'];
                     $email = $row['email'];
                     $password = $row['password'];
                     $phone = $row['phone'];
                     $level = $row['level'];
                     $gender = $row['gender'];
                     $date = $row['date'];
         			$id = $row['id'];
                 }

         ?>
         <?php
         if (isset($_POST['update'])) {
         	// receive all input values from the form. Call the e() function
             // defined below to escape form values
         			$fname = $_POST['fname'];
         			$lname = $_POST['lname'];
               $level = $_POST['level'];
         			$password = $_POST['password'];
         			$password1 = $_POST['password1'];
         			$email = $_POST['email'];
         			$phone = $_POST['phone'];
         			$gender = $_POST['gender'];
         			$id = $_POST['id'];

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

         	// update users details if there are no errors in the form
         	if (count($errors) == 0) {
         		$password = md5($password);//encrypt the password before saving in the database

         		$update = mysqli_query($db, "UPDATE users SET fname='$fname', lname='$lname', password='$password', email='$email', phone='$phone', gender='$gender', date= NOW() WHERE id=$id");
         		if($update) {	?>
         				<script>alert('Profile Updated Successfully');
         					window.location="profile.php";
         				</script>
         			<?php
         		}else{
         			?>
         				<script>alert('Profile Not Updated');
         					window.location="profile.php";
         				</script>
         			<?php

         		}
         	}
         	}

          ?>
         <!DOCTYPE html>
         <html>
         <head>
         <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <title>SDC | user</title>
         	<!-- BOOTSTRAP STYLES-->
         <link href="assets/css/bootstrap.css" rel="stylesheet" />
				 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
              <!-- FONTAWESOME STYLES-->
         <link href="assets/css/font-awesome.css" rel="stylesheet" />
              <!-- MORRIS CHART STYLES-->
         <!-- <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
                 <!-- CUSTOM STYLES-->
         <link href="assets/css/custom.css" rel="stylesheet" />
         <link rel="stylesheet" href="assets/css/animate.min.css">
         <link rel="stylesheet" href="assets/css/style.css"/>
              <!-- GOOGLE FONTS-->
         <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
         </head>
         <body id="Uboard">
         <div class="nav-fixed">
           <ul>
             <li class="sdc-text"><a>SDC |UNN</a></li>
             <li class="push_center sdc-text  animated fadeIn"><a>DASHBOARD</a></li>
             <li class="push_right">
               <a href="stafflogout.php?logout=<?php echo $member_id; ?>"><button  class="btn btn-danger">logout</button></a>
             </li>
             <a style="float:right;padding-top:20px">last access: <?php echo $last_logged; ?></a>
           </ul>
         </div>
