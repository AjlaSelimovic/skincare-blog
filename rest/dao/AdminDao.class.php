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
<<<<<<< HEAD
   // $sql = "INSERT INTO admin(id_admin, username, password)
    //VALUES('6','firstAdmin','tryingInsert')";
    $sql= "DELETE FROM admin WHERE id_admin=6";
    $conn->exec($sql);
   // echo "New record has been created, check the db to see";
    echo "New record has been deleted";
=======
    $sql = "INSERT INTO admin(id_admin, username, password)
    VALUES('7','Sumeja','password')";
    $conn->exec($sql);
    echo "Sumeja is added, check the db to see";
>>>>>>> d330a03a7f67a092330f26637062c9baa26a7985

   // echo "Connected successfully";

    //sql to delete record
   // $sql="DELETE FROM admin WHERE id_admin=6"
}    catch (PDOException $e) {
    echo $sql ."<br>" .$e->getMessage();
    //echo "Connection failed:" .$e -> getMessage();
}

$conn = null;

?>