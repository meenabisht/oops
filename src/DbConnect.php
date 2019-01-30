<?php

namespace Meena\loginform;

class DbConnect {
  public $host = 'localhost';
  public $user = 'root';
  public $pass = 'root';
  public $dbname = 'FirstDB';
  public $conn;

  public function __construct() {
    $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);        
      if(!$this->conn ) {
        die('Could not connect: ' . mysqli_error());
      }
  }

  public function getConnection() {
    return $this->conn;
  }
}
