<?php
class DbConnect {
  public $host = 'localhost';
  public $user = 'root';
  public $pass = 'root';
  public $dbname = 'FirstDB';
  public $conn;

  
  public function __construct(){
       
    $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db,$this->Cusername,$this->Cpassword);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
