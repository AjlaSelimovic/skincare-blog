<?php

$servername = "localhost";
$username = "root";
$password = "mema2508";
$scheme = "skincare";

//INSERT INTO DB
try {
    $conn = new PDO("mysql:host=$servername;dbname=$scheme", $username, $password);
    
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO admin(id_admin, username, password)
    VALUES('4','tryAdmin','tryingInsert')";
    $conn->exec($sql);
    echo "New record has been created, check the db to see";

   // echo "Connected successfully";

    //sql to delete record
   // $sql="DELETE FROM admin WHERE id_admin=3"
} catch (PDOException $e) {
    echo $sql ."<br>" .$e->getMessage();
    //echo "Connection failed:" .$e -> getMessage();
}

$conn = null;

?>