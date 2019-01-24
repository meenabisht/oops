<?php
// session_start();

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
      <input type="number" name="mobno"/><br/>
      <!-- <input type="checkbox" name="remember" <?php if(isset($_COOKIE['userName'])) {?> checked <?php }?> /><label>Remember Me</label><br> -->
      <input type="submit" value=" Submit "/><br />
    </form>
</body>
</html>
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
include("user.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
  $user_obj=new user();
  $result=$user_obj->userlogin($_POST['emailusername'],$_POST['mobno']);
  // if($remember == 'checked')
  // {   
  //   setcookie('persistID', $uid, time()+(30 * 24 * 60 * 60), '/'); // this sets cookie for 30 days.
  // }
  if($result==1)
  {
    $_SESSION["login_user"]= $_POST["emailusername"];
    // $_SESSION["mobno"]= $_POST["mobno"];
    header('Location: welcome.php');
  }
  else
  {
      echo"Invalid User";
  }
}
