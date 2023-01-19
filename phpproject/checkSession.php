<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Header:Content-Type');
    header('Content-Type:application/json');
    include "./config.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id = $_POST['id'];

        $dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);

        $select = "SELECT * FROM tbl_student WHERE student_id='".$id."'";
        if($dbcon->connect_error){
            echo "connection failed".$dbcon->connect_error;
        }else{
            $result = $dbcon->query($select);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "User Logged: ".$row['fname']." ". $row['lname'];
            }
            $dbcon->close();
        }
    }
?>