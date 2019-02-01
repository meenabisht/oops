<?php  
namespace Meena\loginform;

require 'vendor/autoload.php';

use Meena\loginform\DbConnect;
use Meena\loginform\mail;
use Meena\loginform\LoginRegistration;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

class user implements loginregistration{
  
  // public $data;
  // public function __construct(DbConnect $conn_obj){
  //   $this->data = $conn_obj;
  // }

  public function userlogin($emailusername, $pass) {
    require 'vendor/autoload.php';
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();
    if(!empty($_POST)) {
      $stmt = ("SELECT * FROM CandidateDB WHERE (cname = '$emailusername' or email = '$emailusername') AND pass = '$pass';");
      $result = mysqli_query($connection, $stmt);
      if(mysqli_num_rows($result) > 0) {
        $_SESSION['login_user'] = $emailusername;
        $_SESSION["pass"]= $_POST['pass'];
        if($this->checkadmin($emailusername,$pass)){
          //echo"here";
          header("location: WelcomeAdmin.php");
        }
        else{
          echo"here@";
          header("location: welcome.php?email=".$_POST['emailusername']."&pass=".$_POST['pass']);
        }
        //return TRUE;
      }
      return FALSE;
    }
  }

  public function userregister($name,$addr,$email,$pass,$mobno,$high_qual,$role){
    require 'vendor/autoload.php';
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();  

    $sql="SELECT * from CandidateDB WHERE cname = '$name' or email = '$email' AND pass = '$pass';";
    $register_user = mysqli_query($connection,$sql);
    $no_rows = mysqli_num_rows($register_user);


    if($no_rows == 0) {
      $hash = md5( rand(0,1000) );
      $sql2 = "INSERT INTO CandidateDB (cname,addr,email,hashh,active,pass,mobno,high_qual,role) VALUES ('$name','$addr','$email','$hash',0,'$pass','$mobno','$high_qual','$role')";
      // var_dump($sql2);
      $result1 = mysqli_query($connection, $sql2);
      // var_dump($result1);//WE ARE GETTING False VALUE HERE
      // $msg = 2;
      $this->verify($name, $pass, $email, $hash);
      // header("Location:Index.php?msg=$msg");
      echo"U R Registered";
      // return FALSE;
    } else {  
      // return TRUE;
      // $msg = 1;
      echo"please register";
      // header("Location:Index.php?msg=$msg");
    }
  }

  public function verify($name,$pass,$email, $hash){
    $mail_obj = new mail();
    $obj = $mail_obj->mailverify($name,$pass,$email, $hash);
  }


  public function checkactive($email){
    // require 'vendor/autoload.php';
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();
    $email = mysqli_real_escape_string($connection,$email);
    $sql="SELECT * FROM CandidateDB WHERE email = '$email' and active='0'";
    $register_user = mysqli_query($connection,$sql) or die(mysqli_error($sql));
    $no_rows = mysqli_num_rows($register_user);
    if($no_rows == 0){
      return TRUE;  
      }
    else{
      $msg="Unverified";
      header("Location:login.php?msg=$msg");
    }
  
  }

  public function checkadmin($emailusername,$pass){
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();
     $stmt= "SELECT * FROM CandidateDB where (cname = '$emailusername' or email = '$emailusername') and roles='admin'";
     $register_user = mysqli_query($connection,$stmt) or die(mysqli_error($stmt));
    //  getting false value
    //  var_dump($register_user);
     $rows = mysqli_fetch_array($register_user);
    //  var_dump($rows);
    //echo $rows['roles'];
     if($rows['roles']=='admin'){
       return TRUE;
     }
    }  
}
?> 
