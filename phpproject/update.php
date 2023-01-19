<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Header:Content-Type');
    header('Content-Type:application/json');
    include "./config.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id= $_POST['id'];
        $id=intval($id);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        // $sid = intval($_POST['schoolid']);
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        echo $pass;
        // $type = intval($_POST['type']);
        $dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);
        if($dbcon->connect_error){
            echo "connection failed ".$dbcon->connect_error;
        }else{
            // UPDATE `tbl_student` SET `pass`='[value-2]',`fname`='[value-3]',`lname`='[value-4]',`cell_number`='[value-5]',`dob`='[value-6]',`school_id`='[value-7]' WHERE `student_id`='[value-1]'
            $sql = "UPDATE tbl_student SET fname='$fname',lname='$lname',pass='$pass',cell_number='$phone',dob='$dob' WHERE student_id='$id'";
            if($dbcon->query($sql)===TRUE){
                echo "You have been updated";
            }else{
                echo "Error in the registeration: ".$dbcon->error;
            }
            $dbcon->close();
        }
    }
?>