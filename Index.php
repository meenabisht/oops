<?php

use Meena\loginform\user;
use Meena\loginform\DbConnect;

if(isset($_SESSION['login_user'])){
  echo "You are already logged in ...";
}
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
      Name:<br><input type="text" name="cname" required><br>
      Address:<br><input type="text" name="addr"><br>
      E-mail id:<br><input type="text" name="email" required><br>
      Password:<br><input type="password" name="pass"><br>
      Mob. no:<br><input type="number" name="mobno" required><br>
      Highest Qualification:<br><input type="text" name="high_qual"><br>
      Roles:<br><select name="roles">
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
  // $roles = ($_POST["roles"]);
  if($_SERVER["REQUEST_METHOD"]=="POST"){  
  require 'vendor/autoload.php';
  $reg_obj = new user();
  $result1 = $reg_obj->userregister($_POST['cname'],$_POST['addr'],$_POST['email'],$_POST['pass'],$_POST['mobno'],$_POST['high_qual'],$_POST['roles']);
  if($result1)
  {
    echo"Inserted"; 
  }
  else
  {
    echo"not Inserted";
  }
}
  
?>



