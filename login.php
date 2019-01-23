<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
      <h3>Login Form</h3>
      <label>Name or Email:</label>
      <input type="text" name="emailusername"/><br />
      <label>Mob. no:</label>
      <input type="text" name="mobno"/><br/>
      <input type="submit" value=" Submit "/><br />
    </form>
</body>
</html>


<?php
include("DbConnect.php");
include("user.php");
session_start();

  if(!empty($_POST))
  {
    $emailusername = mysqli_real_escape_string($conn, $_POST['emailusername']); 
    $mobno = mysqli_real_escape_string($conn, $_POST['mobno']);

    $sql = "SELECT * FROM CandidateDB WHERE email = '$emailusername' and mobno='$mobno'";
    $result = mysqli_query($conn, $sql);
    $user_obj = new user();
    $us = $user_obj->login();
    if($us){
      $_SESSION['login_user'] = $emailusername;
      header("location: welcome.php");
    }else{
      echo"please register first";
    }
  }


?>


