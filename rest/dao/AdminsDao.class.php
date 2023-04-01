<?php

class AdminsDao
{
    /* Methods that we want to support: */
    /* Just for the definition of the methods, they will be used by some other files */
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
            // set the PDO error mode to exception

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    /* Read all admins from database */
    /* We don't need the parameter for this because it is a select method*/

    public function get_all()
    {
        $stmt = $this->conn->prepare("SELECT * FROM admins");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /*Get admins by id */
    public function get_by_id($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    /* Method to add something in the database, in our exmple - username; Method requires parameter */
    /*We are adding new admin to the database with the values we want */
    public function add($admin)
    /* This will be for taking the data from input forms where we have different informations */
    /* We pass here array, the array will collent all info from the frontend, we don't need to write them separatelly*/
    {
        $stmt = $this->conn->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
        $stmt->execute($admin);
        /*Bind or assign values: this is assigning (this id is placeholder for id) */
        $admin['id'] = $this->conn->lastInsertId();
        /*It will return us the id of the last inserted record in the table */
        return $admin;
    }

    /* Method used to get update admin from database     */
    public function update($admin, $id)
    {
        $admin['id'] = $id;
        $stmt = $this->conn->prepare("UPDATE admins SET username = :username, password = :password WHERE id = :id");
        $stmt->execute($admin);
        return $admin;
    }

    /*Method for deleting the record (admin from db): */
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM admins WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
/*BaseDao.class will be the parent class and other classes will inherit from it, since there are a 
lot of same/similar methods, all of them will be in the BaseDao */
?>