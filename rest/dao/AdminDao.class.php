<?php

$servername = "localhost";
$username = "root";
$password = "mema2508";
$scheme = "skincare";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$scheme", $username, $password);
    
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

} catch (PDOException $e) {

    echo "Connection failed:" .$e -> getMessage();
}

?>