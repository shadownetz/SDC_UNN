<?php
session_start();
include('includes/connect.php');
$uname = "";
$errors = array();
function displayError(){
    global $errors;
    if(count($errors) > 0){
    foreach($errors as $error){
        echo $error . '<br>';
    }}}

if(isset($_POST['submit'])){
    validate();
}

function validate(){
        global $errors,$db,$uname;
	 	$uname = $_POST['uname'];
		$password = $_POST['password'];
    $epassword = md5($password);

$sql1=mysqli_query($db,"SELECT * FROM admin WHERE  uname = '$uname' " );
$sql2=mysqli_query($db,"SELECT * FROM admin  WHERE  password = '$epassword' " );

   if(empty($uname) || empty($password)){
     array_push($errors, "Please fill in all required details");
   }elseif(mysqli_num_rows($sql1)== 0){
       array_push($errors, "username does not exist");
   }elseif(mysqli_num_rows($sql2)== 0){
       array_push($errors, "invalid password");
   }else{
	// $epassword = md5($password);
	//$epassword = $_POST ['password'];


$query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE uname = '$uname' ";
$query .= "AND password = '$epassword' ";
$query .= "AND status = '1' ";
$result = mysqli_query($db, $query);


       	while ( $row = mysqli_fetch_array($result) ) {


            $_SESSION['id']= $row['id'];


// setcookie("uname", $uname, time() + (86400 * 30));

   session_start();
header ("location: admins/dashboard.php");
die();
} }
        }
?>
