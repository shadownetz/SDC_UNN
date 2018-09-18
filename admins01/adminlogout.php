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


$update = mysqli_query($db, "UPDATE admin SET last_logged=NOW() WHERE id=$id");
 if ($update) {
    unset($_SESSION['id']);
    session_destroy();
    header("Location: ../login.php");
	exit();
	}
 }
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
