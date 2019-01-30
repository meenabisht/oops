<?php
namespace Meena\loginform;
error_reporting(E_ALL);
ini_set('display_errors', '1');
use Meena\loginform\user;
use Meena\loginform\DbConnect;

?>


<!DOCTYPE html>
<html>
<head>   
    <title>Application</title>
</head> 
	<body>
    <div class="maindiv">
		<form action="Index.php" method="POST">
      <h3>Register Form</h3>
      Name:<br><input type="text" name="cname"><br>
      Address:<br><input type="text" name="addr"><br>
      E-mail id:<br><input type="text" name="email"><br>
      Password:<br><input type="password" name="pass"><br>
      Mob. no:<br><input type="number" name="mobno"><br>
      Highest Qualification:<br><input type="text" name="high_qual"><br>
      <br><input type="submit"> 
      <!-- <?php
        // include("user.php"); 
        require 'vendor/autoload.php';
        if($_GET['msg'] == 1)
        echo '<div class="alert alert-success">Registered Successfully!! Please verify your email</div>';
        else if($_GET['msg'] == 2)
        echo '<div class="alert alert-danger">Registered Unsuccessfully!!</div>';
      ?> -->
      <p class="change_link">    
        Already a member ?  
      <button><a href="login.php" class="to_register"> Go and log in </a></button>
      </p> 
    </form>
    </div>
	</body>
</html>

<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){  
  require 'vendor/autoload.php';
  $reg_obj = new user();
  // var_dump($reg_obj);
  $result1 = $reg_obj->userregister($_POST['cname'],$_POST['addr'],$_POST['email'],$_POST['pass'],$_POST['mobno'],$_POST['high_qual']);
  var_dump($result1);//return boolean false  
  if(!$result1)
  {
    echo"not Inserted"; 
  }
  else
  {
    echo"Inserted";
    // header("location: verify.php");
  }
}
  
?>


