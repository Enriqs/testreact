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
  $id = $_POST['id'];
  $pass = $_POST['pass'];
  $role = $_POST['role'];
  // $type = intval($_POST['type']);
  $dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);
  if($dbcon->connect_error){
      echo "connection failed ".$dbcon->connect_error;
  }else{
    //   $sql = "SELECT * FROM tbl_student WHERE student_id='".$id."'";
    //   $result = $dbcon->query($sql);
    //   if ($result->num_rows > 0) {
    //   $row = $result->fetch_assoc();
      // output data of each row
     
      switch($role) {
        case "0":
            $sql = "SELECT * FROM tbl_admin WHERE id='".$id."'";
            $result = $dbcon->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "no users found";
            };
            if (password_verify($pass,$row['pass'])) {echo 123;} else {echo "failed to register admin!";}
            break;
        case "1":
            $sql = "SELECT * FROM tbl_owner WHERE owner_id='".$id."'";
            $result = $dbcon->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "no users found";
            };
            if (password_verify($pass,$row['pass'])) {echo 123;} else {echo "failed to register Owner! $pass, $fname, $lname, $phone, $dob, $introduction";}
            break;
        case "2":
            $sql = "SELECT * FROM tbl_student WHERE student_id='".$id."'";
            $result = $dbcon->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "no users found";
            };
            if (password_verify($pass,$row['pass'])) {echo 123;} else {echo "failed to register Student!";}
            break;
        default: 
            echo "illegal value";
      }
    //   if (password_verify($pass,$row['pass'])){ //($password,$hashedPassword)
    //                   echo '123';
    //               }else{
    //                   echo "You don't exist";
    //           }
    //   } else {
    //   echo "0 results";
    //   }

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