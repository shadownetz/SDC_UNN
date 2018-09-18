<?php

	$host = "localhost";
    $user = "root";
    $pass = "";
    $database = "sdc";

    $db = mysqli_connect($host, $user, $pass, $database);


if(mysqli_connect_errno()){
    die("Database connection failed: ".
    mysqli_connect_error().
            "(".mysqli_connect_errno().")"
        );
}




?>
