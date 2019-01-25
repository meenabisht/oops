<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1'); 

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
      <label>Password:</label>
      <input type="password" name="password" value="<?php isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>"><br>
      <input type="checkbox" name="rememberme" value="checked"> Remember Me<br><br>
      <input type="submit" value="Submit"/><br />
    </form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $user_obj=new user();
  $result = $user_obj->userlogin($_POST['emailusername'],$_POST['password']);
  if($result) {
    $_SESSION["login_user"]= $_POST["emailusername"];
    if (isset($_POST['rememberme'])) {
      setcookie('emailusername',$_POST['emailusername']);
      setcookie('password',$_POST['password']);
    }
  }
  else
  {  echo"Invalid User";   
    
  }
}
