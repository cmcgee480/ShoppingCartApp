<?php


class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $conn;


    public function __construct(
        $dbname = "cmcgee17",
        $tablename = "Productdb",
        $servername = "cmcgee17.lampt.eeecs.qub.ac.uk",
        $username = "cmcgee17",
        $password = "khKmkBtMF430tPfs"
    ) {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "CREATE TABLE IF NOT EXISTS $tablename
                (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                product_name VARCHAR(25)NOT NULL,
                product_price FLOAT,
                product_image VARCHAR(100));";

        if (!mysqli_query($this->conn, $sql)) {
            echo "Error creating table: " . mysqli_error($this->conn);
        }
    }


    public function getData()
    {
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}
