<?php 
namespace Meena\loginform;

use Meena\loginform\user;
use Meena\loginform\DbConnect;

require 'vendor/autoload.php';

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
      <input type="pass" name="pass" value="<?php isset($_COOKIE['pass']) ? $_COOKIE['pass'] : ''; ?>"><br>
      <input type="checkbox" name="rememberme" value="checked"> Remember Me<br><br>
      <input type="submit" value="Submit"/><br />
    </form>
    <?php if(isset($_GET['msg']) && $_GET['msg']== "invalid")
      echo '<div class="alert alert-danger">Wrong username or password </div>';
      else if(isset($_GET['msg']) && $_GET['msg']== "Unverified")
      echo '<div class="alert alert-danger">Please verify your email </div>';
    ?>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $user_obj=new user();
  $msg = $user_obj->userlogin($_POST['emailusername'],$_POST['pass']);
  
  if($msg) {
    $_SESSION["login_user"]= $_POST["emailusername"];

    if (isset($_POST['rememberme'])) {
      setcookie('emailusername',$_POST['emailusername']);
      setcookie('pass',$_POST['pass']);
    }

    $msg=$check_obj->checkactive($emailusername);
    if($msg){
        $_SESSION['login_user'] = $msg;
        header("location: welcome.php");
    }
  }
  else{  
    $msg="invalid";
    header("Location:http://localhost:8888/loginform/login.php?msg=$msg");     
  }
}
?>

