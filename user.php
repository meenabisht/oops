<?php  
include("DbConnect.php"); 
error_reporting(E_ALL);
ini_set('display_errors', '1'); 
session_start();  
  class user {  
          
    function __construct() {   
      $user = "root";
      $pass = "root";
      $dbh = new PDO('mysql:host=localhost;dbname=FirstDB', $user, $pass);           
      // connecting to database  
      $db = new dbConnect(); 
            
    }    
    public function UserRegister($name, $addr, $email, $mobno, $high_qual){  
      $db= new DbConnect();
      $conn= $db->conn;  
      $name=$_POST["name"];
      $addr=$_POST["addr"];
      $email=$_POST["email"];
      $mobno=$_POST["mobno"];
      $high_qual=$_POST["high_qual"];  
      $qr = mysql_query("INSERT INTO CandidateDB(name, addr, email, mobno, password) values('".$name."',".$addr."',".$email."','".$mobno."','".$high_qual."')") or die(mysql_error());  
      $stmt = $mysqli->prepare($qr);
      echo"Registration Successful";
            
    }  
    public function Login($emailusername, $mobno){  
      $db= new DbConnect();
      $conn= $db->conn;  
      $res = mysqli_query("SELECT * FROM CandidateDB WHERE (name = '".$emailusername."'or email = '".$emailusername."') AND mobno = '".$mobno."'");  
      $user_data = mysqli_fetch_array($res);  
      //print_r($user_data);  
      $no_rows = mysqli_num_rows($res);  
      if ($no_rows == 1)   
      {       
        $_SESSION['login_user'] = $emailusername;
        header("location: welcome.php");
        return TRUE;  
      }  
      else  
      {  
        return FALSE;  
      }                  
    }   
  }  
?>  
