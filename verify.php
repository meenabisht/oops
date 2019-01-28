<?php

use Meena\loginform\user;
use Meena\loginform\DbConnect;

require 'vendor/autoload.php';
$conn_obj = new DbConnect();
$connection = $conn_obj->getConnection();
//var_dump($connection);
$reg_obj = new user();
echo "hello ".$_GET['email']."and hash= ".$_GET['hash'];
if(isset($_GET['email']) && !empty($_GET['email'])AND isset($_GET['hash']) && !empty($_GET['hashh'])){
  $result1 = $reg_obj->userregister($GET['email'],$_GET['hashh']);
  $email = mysqli_escape_string($_GET['email']); 
  $hash = mysqli_escape_string($_GET['hashh']); 
  $sql="SELECT email,hashh,active FROM CandidateDB WHERE email = '$email' and hashh='$hash' and active='0'";
  $result=mysqli_query($connection,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  if(mysqli_num_rows($result)) {
    mysqli_query($connection,"UPDATE CandidateDB SET active='1' WHERE email='$email' and hashh='$hash' and active='0'") or die(mysqli_error());
    echo '<div class="alert alert-success">Account has been Activated, please  <a href="login.php">login</a></div>';    
  }
  else
  {
    echo '<div class="alert alert-danger">Please Check</div>';
  }
}

?>