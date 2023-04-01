<?php

$servername = "localhost:3306";
$username = "root";
$password = "obozavamportu";
$scheme = "skincare";

//INSERT INTO DB
try {
    $conn = new PDO("mysql:host=$servername;dbname=$scheme", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM skincare WHERE id_admin=6";
    $conn->exec($sql);
    echo "New record has been deleted";


    // echo "Connected successfully";



} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    //echo "Connection failed:" .$e -> getMessage();
}

$conn = null;

?>