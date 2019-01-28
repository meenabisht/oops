<?php  
namespace Meena\loginform;

use Meena\loginform\DbConnect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

class user{

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
        header("location: welcome.php");
        return TRUE;
      }
      return FALSE;
    }
  }

  public function userregister($name,$addr,$email,$pass,$mobno,$high_qual){
    require 'vendor/autoload.php';
    $conn_obj = new DbConnect();
    $connection = $conn_obj->getConnection();  
    $sql="SELECT * from CandidateDB WHERE cname = '$name' or email = '$email' AND pass = '$pass';";
    $register_user = mysqli_query($connection,$sql);
    $no_rows = mysqli_num_rows($register_user);

    if($no_rows == 0) {
      $hash = md5( rand(0,1000) );
      $sql2 = "INSERT INTO CandidateDB (cname,addr,email,hashh,active,pass,mobno,high_qual) VALUES ('$name','$addr','$email','$hash',0,'$pass','$mobno','$high_qual')";
      // var_dump($sql2);
      $result1 = mysqli_query($connection, $sql2);
      // var_dump($result1);//WE ARE GETTING FLASE VALUE HERE
      $msg = 2;
      $this->verify($name, $pass, $email, $hash);
      header("Location:http://localhost:8888/loginform/Register.php?msg=$msg");
      // return FALSE;
    } else {  
      // return TRUE;
      $msg = 1;
      header("Location:http://localhost:8888/loginform/Register.php?msg=$msg");
    }
  }

  public function verify($name,$pass,$email, $hash){
   require 'vendor/autoload.php';
   
   $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
   try {
      //Server settings
      $mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'alshayakapoor@gmail.com';                 // SMTP username
      $mail->Password = 'Vrushali@123';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to
   
      //Recipients
      $mail->setFrom('meena.bisht@qed42.com', 'never reply back');
      $mail->addAddress($email);     // Add a recipient
   
      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Signup | Verification';
      $mail->Body    = 'Thanks for signing up!
      Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
   
       ------------------------
        Username: '.$name.'
        Password: '.$pass.'
       ------------------------
   
       Please click this link to activate your account:
       http://localhost:8888/loginform/verify.php?email='.$email.'&hash='.$hash.'
   
       '; // Our message above including the link';
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   
      $mail->send();
      echo 'Message has been sent';
   } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
   }
   }
    function checkactive($email){
      require 'vendor/autoload.php';
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
        header("Location:http://localhost:8888/loginform/login.php?msg=$msg");
      }
   
    }
}


?> 
