<?php
header('Access-Control-Allow-Origin: http://localhost:3002');
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
$type = $_POST['type'];

// $type = intval($_POST['type']);
$dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);
if($dbcon->connect_error){
echo "connection failed ".$dbcon->connect_error;
}else{
// $sql = "";
switch($type){//if it is successed, the things executed.
case 0:
$sql = "SELECT * FROM tbl_owner WHERE owner_id='".$id."'";//id that is already registered and id that is typed when users login are the same, jump to 0.
break;

case 1:
$sql = "SELECT * FROM tbl_student WHERE student_id='".$id."'";
break;

case 2:
$sql = "SELECT * FROM tbl_webadmin WHERE admin_id='".$id."'";
break;
}

$result = $dbcon->query($sql);
if ($result->num_rows > 0) {//if there are login user id, check the pass already register and pass that login user type. if there are not user's login id, jump to echo 0.  
$row = $result->fetch_assoc();//change to json to be read easily.

if (password_verify($pass,$row['pass'])){//
echo json_encode($row);

}else{
echo 1 ;
}
} else {
echo 0;
}


$dbcon->close();
}
}
?>