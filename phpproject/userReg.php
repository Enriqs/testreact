<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Header:Content-Type');
    header('Content-Type:application/json');
    include "./config.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        // $sid = intval($_POST['schoolid']);
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        // $type = intval($_POST['type']);
        $dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);
        if($dbcon->connect_error){
            echo "connection failed ".$dbcon->connect_error;
        }else{
            $sql = "INSERT INTO tbl_student (fname,lname,pass,cell_number,dob) VALUES ('$fname','$lname','$pass','$phone','$dob')";
            if($dbcon->query($sql)===TRUE){
                echo "You have been registered";
            }else{
                echo "Error in the registeration: ".$dbcon->error;
            }
            $dbcon->close();
        }
    }
?>