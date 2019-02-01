<?php

 error_reporting(E_ALL);
 ini_set('display_errors', '1');
use Meena\loginform\user;
use Meena\loginform\DbConnect;

// if(isset($_SESSION['login_user'])){
//   echo "You are already logged in ...";
//   }else{
// ?>


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
      Roles:<br><select name="role">
        <option value="admin">admin</option>
        <option value="teachers">teachers</option>
        <option value="students">students</option>
      </select><br>
      <br><input type="submit"> 
     
      
            
      
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
  $result1 = $reg_obj->userregister($_POST['cname'],$_POST['addr'],$_POST['email'],$_POST['pass'],$_POST['mobno'],$_POST['high_qual'],$_POST['role']);
  var_dump($result1);//return boolean false  
  if($result1==1)
  {
    echo"Inserted"; 
  }
  else
  {
    echo"not Inserted";
    // header("location: welcome.php");
  }
}
  
?>



