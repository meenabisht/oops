<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1'); 
// session_start(); 
include("user.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
      <h3>Login Form</h3>
      <label>Name or Email:</label>
      <input type="text" name="emailusername" value="<?php echo isset($_COOKIE['emailusername']) ? $_COOKIE['emailusername'] : ''; ?>"><br>
      <label>Mob. no:</label>
      <input type="text" name="mobno" value="<?php isset($_COOKIE['mobno']) ? $_COOKIE['mobno'] : ''; ?>"><br>
      <input type="checkbox" name="rememberme" value="checked"> Remember Me<br><br>
      <input type="submit" value="Submit"/><br />
    </form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $user_obj=new user();
  $result = $user_obj->userlogin($_POST['emailusername'],$_POST['mobno']);
  if($result) {
    $_SESSION["login_user"]= $_POST["emailusername"];
    if (isset($_POST['rememberme'])) {
      setcookie('emailusername',$_POST['emailusername']);
      setcookie('mobno',$_POST['mobno']);
    }
  }
  else
  {  echo"Invalid User";   
    
  }
}
