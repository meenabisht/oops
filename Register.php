 <html>
<body>
<?php  

session_start();
if(isset($_SESSION['name']))
  {
    echo "Welcome  <a href='welcome.php'>Go to Home</a>";
  }
else{
echo"Please Register first";  
}


include_once('DbConnect.php');
  $name=$_POST["name"];
  $addr=$_POST["addr"];
  $email=$_POST["email"];
  $mobno=$_POST["mobno"];
  $high_qual=$_POST["high_qual"];       

  $db_object=new DbConnect('localhost','root','root','FirstDB');
  $conn = mysqli_connect('localhost', 'root', 'root');

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  try {
    $user = "root";
    $pass = "root";
    $dbh = new PDO('mysql:host=localhost;dbname=FirstDB', $user, $pass);
    // echo "i am in db";
    foreach($dbh->query('SELECT * from CandidateDB') as $row) {
        print_r($row);
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $que="INSERT INTO CandidateDB (name, addr, email, mobno, high_qual) VALUES ('$name', '$addr', '$email', $mobno, '$high_qual')";
    // print_r($que);exit();
    $stmt=$dbh->prepare($que);
    $stmt->execute();
    echo"Registration Successful";
    } 
  catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    }
    $dbh = null; 

?>

</body>
</html>