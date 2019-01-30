<?php

namespace Meena\loginform;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require 'vendor/autoload.php';
class mail{
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

//Load Composer's autoloader
public function mailverify($name,$pass,$email, $hash){
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
  $mail->setFrom('meena.bisht@qed42.com', 'Mailer');
  $mail->addAddress('meena.bisht@qed42.com', ' ');     // Add a recipient
  
  
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
  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}

}
?>