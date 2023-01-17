<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Header:Content-Type');
    header('Content-Type:application/json');
    include "./config.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $role = $_POST['role'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $introduction = 'some text';
        $home_id = 3999;
        // $sid = intval($_POST['schoolid']);
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);
        if($dbcon->connect_error){
            echo "connection failed ".$dbcon->connect_error;
        }else{
            switch($role) {
                case "0":
                    $sql = "INSERT INTO tbl_admin (pass, fname, lname) VALUES ('$pass', '$fname', '$lname')";
                    if ($dbcon -> query($sql) === TRUE) {echo "Admin is registered!";} else {echo "failed to register admin!";}
                    break;
                case "1":
                    $sql = "INSERT INTO tbl_owner (pass,fname,lname,introduction,cell_number,dob) VALUES ('$pass','$fname','$lname','$introduction','$phone','$dob')";
                    if ($dbcon -> query($sql) === TRUE) {echo "Owner is registered!";} else {echo "failed to register Owner! $pass, $fname, $lname, $phone, $dob, $introduction";}
                    break;
                case "2":
                    $sql = "INSERT INTO tbl_student (fname,lname,pass,cell_number,dob) VALUES ('$fname','$lname','$pass','$phone','$dob')";
                    if ($dbcon -> query($sql) === TRUE) {echo "Student is registered!";} else {echo "failed to register Student!";}
                    break;
                default: 
                    echo "illegal value";
            }
            // if($dbcon->query($sql)===TRUE){
            //     echo "You have been registered";
            // }else{
            //     echo "Error in the registeration: ".$dbcon->error;
            // }
            $dbcon->close();
        }
    }
?>