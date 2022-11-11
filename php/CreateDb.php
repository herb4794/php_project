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
  }

}


?>