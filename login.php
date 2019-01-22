<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

include('DbConnect.php');

if(!empty($_POST))
{

  $conn = mysqli_connect('localhost', 'root', 'root', 'FirstDB');

  $emailusername = mysqli_real_escape_string($conn, $_POST['emailusername']); 
  $mobno = mysqli_real_escape_string($conn, $_POST['mobno']);

  $sql = "SELECT * FROM CandidateDB WHERE (name='$emailusername' or email = '$emailusername') and mobno='$mobno'";

  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    header("location: welcome.php");
  }else{
    echo"Login Details Invalid";
  }

  // $active=$row['active'];
  // $count=mysqli_num_rows($result);

  // if($count==1)
  // {
  // $_SESSION['login_user'] = $emailusername;
  // header("location: welcome.php");
  // }
  // else 
  // {
  // $error="Your Login Name or Password is invalid";
  // }
}

?>
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