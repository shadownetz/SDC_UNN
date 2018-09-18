<?php
session_start();
$id = 0;
	if (isset($_GET['logout'])){
$id = $_GET['logout'];

	$host = "localhost";
    $user = "root";
    $pass = "";
    $database = "sdc";

    $db = mysqli_connect($host, $user, $pass, $database);


$update = mysqli_query($db, "UPDATE users SET last_logged=NOW() WHERE id=$id");
 if ($update) {
    unset($_SESSION['id']);
    session_destroy();
    header("Location: ../login.php");
		exit();
	}
 }
?>
