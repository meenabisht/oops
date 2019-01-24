<?php  
// include("DbConnect.php"); 
// error_reporting(E_ALL);
// ini_set('display_errors', '1'); 
include("DbConnect.php");

class user {             

  public function userlogin($emailusername, $mobno){
    $conn=new DbConnect();
    if(!empty($_POST)){
    $stmt =$conn->conn->prepare("SELECT * FROM CandidateDB WHERE (name = '$emailusername' or email = '$emailusername')AND mobno = '$mobno' ;");
    $result = mysqli_query($conn, $stmt);

    if(mysqli_num_rows($result) > 0){
      header("location: welcome.php");
    }else{
      echo"please register first";
    }
    }
    // $stmt->execute();
    // $ra=$stmt->rowCount();
    // return $ra;
  }

  public function userregister($name,$addr,$email,$mobno,$high_qual){
    $conn=new DbConnect();
    // $sql="INSERT INTO CandidateDB (name,addr,email,mobno,high_qual) VALUES ('$name', '$addr', '$email', '$mobno', '$high_qual')";
    // $qr = $conn->conn->prepare($sql);
    // $qr->execute();
    // echo"Registration Successful";
    // return true;

    $sql ="SELECT * from CandidateDB WHERE name = '$name' or email = '$email'";
    $register_user = mysqli_query($conn,$sql) or die(mysqli_error($sql));
    $no_rows = mysqli_num_rows($register_user);

    if($no_rows == 0)
    {
      $sql2 = "INSERT INTO CandidateDB (name,addr,email,mobno,high_qual) VALUES ('$name', '$addr', '$email', '$mobno', '$high_qual')";
      $result = mysqli_query($conn, $sql2) or die(mysqli_error($sql2));
      echo "Registration Successfull!";
    }
    else{
      echo "Registration Failed.";
    }
  }
}
?> 
