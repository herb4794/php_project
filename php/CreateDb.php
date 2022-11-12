<?php 
class CreateDb{
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

    $this->con= mysqli_connect($serveName, $userName, $password);

    // Check connection
    if(!$this->con){
      die("Connection failed: ".mysqli_connect_error());
    }

    // query

    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

    // execute query
    if(mysqli_query($this->con, $sql)){
      $this->con = mysqli_connect($serveName, $userName, $password, $dbName)
    }

  }

}

?>
