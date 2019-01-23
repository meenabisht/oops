 <html>
<body>
<?php  

include("user.php");

$user_obj = new user();

  $name=$_POST["name"];
  $addr=$_POST["addr"];
  $email=$_POST["email"];
  $mobno=$_POST["mobno"];
  $high_qual=$_POST["high_qual"];  
  $user_obj->UserRegister($name, $addr, $email, $mobno, $high_qual);

  $db_object=new DbConnect(); 
  print_r($db_object);
?>

</body>
</html>