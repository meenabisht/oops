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
include("user.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
  $user_obj=new user();
  $result=$user_obj->userlogin($_POST['emailusername'],$_POST['mobno']);
  if($result==1)
  {
    header('Location: welcome.php');
  }
  else
  {
      echo"Invalid User";
  }
}
