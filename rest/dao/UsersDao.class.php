<?php

class UsersDao
{
    /* Methods that we want to support: */
    private $conn;

    /* constructor of dao class */
    public function __construct()
    {

        /*In our constructor method, we want to connect to the database */
        try {
            $servername = "localhost";
            $username = "root";
            $password = "mema2508";
            $schema = "skincare";

            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'Connected Successfully!';
        } catch (PDOException $e) {
            echo 'Coonection failed' . $e->getMessage();


        }



    }

}

?>