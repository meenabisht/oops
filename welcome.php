<?php
require 'vendor/autoload.php';
use Meena\loginform\user;
use Meena\loginform\DbConnect;
use Meena\loginform\Delete;
session_start();
if( isset($_SESSION['login_user']))
{
  echo "welcome".$_SESSION['login_user']."!";
  echo"<br>";
}

$conn_obj = new DbConnect();
$connection = $conn_obj->getConnection();
$stmt = "SELECT * FROM CandidateDB";
$query = mysqli_query($connection,$stmt);

// fetch the result / convert result in to array 

while ($rows = mysqli_fetch_array($query)):

  $id = $rows['user_id'];
  $name = $rows['cname'];
  $addr = $rows['addr'];
  $email = $rows['email'];
  $pass = $rows['pass'];

  echo "$id<br>$name<br>$addr<br>$email<br>$pass<br><br>";

endwhile;

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $del_obj=new Delete();
  // echo "id=".$_POST['id']."<br>";
  $obj = $del_obj->deleteuser($_POST['id']);
  if(!$obj)
  {
    echo"deleted"; 
  }
  else
  {
    echo"not deleted";
  }
}
?>
<html>
  <head></head>
  <body>
      <form action="" method="POST">
     <button type="submit"><a href="logout.php">Logout</a></button><br>
     <a href="Index.php">Register</a><br>
     enter id for delete user<br>
     id:<input type="text" name="id"><br>   
     Delete:<input type="submit">
     <a href="Update.php">Update</a><br>

     </form>
  </body>
</html>


