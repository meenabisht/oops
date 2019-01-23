<?php  
  class dbConnect {  
    function __construct() {   
      $conn = mysqli_connect('localhost','root','root','FirstDB');   
      if(!$conn)// testing the connection  
      {  
          die ("Cannot connect to the database");  
      }   
      return $conn;  
    }  
    public function Close(){  
      mysqli_close();  
    }  
  }  
?> 
