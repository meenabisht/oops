<?php  
// include("DbConnect.php"); 
// error_reporting(E_ALL);
// ini_set('display_errors', '1'); 
session_start();
spl_autoload_register(function ($class_name){    
  include_once($class_name.".php"); 
});
class user{

  public function userlogin($emailusername, $password) {
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();
    if(!empty($_POST)) {
      $stmt = ("SELECT * FROM CandidateDB WHERE (name = '$emailusername' or email = '$emailusername') AND password = '$password';");
      $result = mysqli_query($connection, $stmt);
      if(mysqli_num_rows($result) > 0) {
        $_SESSION['login_user'] = $emailusername;
        $_SESSION["password"]= $_POST['password'];
        header("location: welcome.php");
        return TRUE;
      }
      return FALSE;
    }
  }

  public function userregister($name,$addr,$email,$password,$mobno,$high_qual){
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();  
    $sql="SELECT * from CandidateDB WHERE name = '$name' or email = '$email' AND password = '$password';";
    $register_user = mysqli_query($connection,$sql);
    $no_rows = mysqli_num_rows($register_user);

    if($no_rows == 0) {
      $sql2 = "INSERT INTO CandidateDB (name,addr,email,password,mobno,high_qual) VALUES ('$name','$addr','$email','$password','$mobno','$high_qual')";
      // var_dump($sql2);
      $result1 = mysqli_query($connection, $sql2);
      return TRUE;
    } else {  
      return FALSE;
    }
  }
}
?> 
