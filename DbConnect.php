<?php
class DbConnect {
  private $host = 'localhost';
  private $user = 'root';
  private $pass = 'root';
  private $dbname = 'FirstDB';
  

  public $db_connection = false;
  public $logs = array();
 
  public function __construct($host, $user, $pass, $dbname) {
    $this->logs[] = "Attempting to connect to the database.";
    
    $conn = mysqli_connect($host, $user, $pass);        
      if(! $conn ) {
        die('Could not connect: ' . mysql_error());
      }
      echo 'Connected successfully';
      mysqli_close($conn);
  }
}
