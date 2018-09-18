<?php
session_start();
include("includes/connect.php");
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
	 	$uname = mysqli_real_escape_string($db,$_POST['uname']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
    $epassword = md5($password);

$sql1=mysqli_query($db,"SELECT * FROM users  WHERE  uname = '$uname' " );
$sql2=mysqli_query($db,"SELECT * FROM users  WHERE  password = '$epassword' " );
   if(empty($uname) || empty($password)){
     array_push($errors, "Please fill in all required details");
   }elseif(mysqli_num_rows($sql1)== 0){
       array_push($errors, "username does not exist");
   }elseif(mysqli_num_rows($sql2)== 0){
       array_push($errors, "invalid password");
   }else{

$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE uname = '$uname' ";
$query .= "AND password = '$epassword' ";
$query .= "AND status = '1' ";
$result = mysqli_query($db, $query);

while ( $row = mysqli_fetch_array($result) ) {


    $_SESSION['id']= $row['id'];

session_start();
header ("location: users/dashboard.php");
die();
}
 }
        }

?>
