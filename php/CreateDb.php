<?php
class CreateDb
{
    public $serverName;
    public $userName;
    public $password;
    public $dbName;
    public $tableName;
    public $con;

    // class constructor

    public function __construct(
        $dbName = "Newdb",
        $tableName = "Productdb",
        $serverName = "localhost",
        $userName = "root",
        $password = ""
    ) {
        $this->dbName = $dbName;
        $this->tableName = $tableName;
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->password = $password;

        // create connection

        $this->con = mysqli_connect($serverName, $userName, $password);

        // Check connection
        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // query

        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

        // execute query
        if (mysqli_query($this->con, $sql)) {
            $this->con = mysqli_connect($serverName, $userName, $password, $dbName);
            // sql to create new table
            $sql = "CREATE TABLE IF NOT EXISTS $tableName
                          (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          product_name VARCHAR(25)NOT NULL,
                          product_price FLOAT,
                          product_image VARCHAR(100));";

            if (!mysqli_query($this->con, $sql)) {
                echo "Error creating table: " . mysqli_error($this->con);
            }

        } else {
            return false;
        }
    }

    // get product from the DATABASE
    public function getData(){
      $sql="SELECT*FROM $this->tableName";

      $result=mysqli_query($this->con,$sql);

      if(mysqli_num_rows($result)>0){
        return $result;
    }
}
}