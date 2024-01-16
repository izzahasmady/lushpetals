<?php
    //set database connection configuration
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "lushpetals";

    //create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname) or die('Error connecting to database');
    

    //check connection
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>