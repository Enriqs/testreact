<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Header:Content-Type');
    header('Content-Type:application/json');
    include "./config.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $datea = $_POST['datea'];
        $dateb = $_POST['dateb'];
        // print_r($dateb);
        // print_r(explode( ',', $dateb ) );
        $dateb=explode( ',', $dateb );
        $datea=explode( ',', $datea );
        print_r($dateb[0]);
        $datea= $datea[2].'-'.$datea[1].'-'.$datea[0];
        
        $dateb= $dateb[2].'-'.$dateb[1].'-'.$dateb[0];
        $uid = $_POST['uid'];
        $hid = $_POST['hid'];
        $dbcon = new mysqli($serverName,$dbUser,$dbpass,$dbName);
        // if($dbcon->connect_error){
        //     echo "connection failed ".$dbcon->connect_error;
        // }else{
        //     $sql = "INSERT INTO tbl_reservation2 (uid,sDate,eDate,hid) VALUES ('$uid','$datea','$dateb','$hid')";
        //     if($dbcon->query($sql)===TRUE){
        //         echo "You have been registered";
        //     }else{
        //         echo "Error in the registeration: ".$dbcon->error;
        //     }
        //     $dbcon->close();
        //  }
	}
?>