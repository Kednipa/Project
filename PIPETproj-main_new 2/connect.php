<?php
    date_default_timezone_set("Asia/Bangkok");
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "pet_hospital";

    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Error: " . mysqli_error($con));
         mysqli_query($conn, "SET NAMES 'utf8' "); 
?>


