<?php  
header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Header:Content-Type');
header('Content-Type:application/json');
include "./config.php";
session_start();//session starts here 
// $dbcon=mysqli_connect("localhost","root","");  
// mysqli_select_db($dbcon,"crud_homestay");  
  
if($_SERVER['REQUEST_METHOD']=="POST"){
  $email = $_POST['id'];
  $pass = $_POST['pass'];
  // $type = intval($_POST['type']);
  $dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);
  if($dbcon->connect_error){
      echo "connection failed ".$dbcon->connect_error;
  }else{
      
      // $sql = "SELECT fname FROM user_tb WHERE email='Doe@mil.com'";
      $sql = "SELECT * FROM tbl_student WHERE student_id='".$email."'";
      // $sql = "INSERT INTO user_tb (fname,lname,email,pass,type) VALUES ('$fname','$lname','$email','$pass',$type)";
      $result = $dbcon->query($sql);
      if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      // output data of each row
      // print_r($pass);
      // print_r($row['pass']);
      //if (password_verify($pass,$row['pass'])){ //($password,$hashedPassword)
        if ($email==$row['student_id'] && $pass==$row['pass']){
                      echo '123';
                      // header("Location: ".'http://localhost:3000/nopage');
                  }else{
                      echo "You don't exist";
              }
      } else {
      echo "0 results";
      }

      // $sql = "SELECT * FROM user_tb";
      // print_r($sql);
      // $result = $conn->query($sql);

      // if($dbcon->query($sql)===TRUE){
      // if ($result->num_rows > 0) {
      //     $row = $result->fetch_assoc();
      //         if (password_verify($row['pass'], $pass)){
      //             echo "You exist";
      //         }
      //         echo "You don't exist";
      //     }
      // }else{
      //     echo "Error in the login: ".$dbcon->error;
      // }
      $dbcon->close();
  }
}
?>  