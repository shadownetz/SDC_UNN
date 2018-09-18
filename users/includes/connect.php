<?php

//creating database connection
//define("DB_SERVER", "localhost");
//define("DB_USER", "dubesoft");
//define("DB_PASS", "dubesoft");
//define("DB_NAME", "birthreg");



//$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

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
