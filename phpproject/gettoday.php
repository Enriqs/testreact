<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Header:Content-Type');
    header('Content-Type:application/json');
    include "./config.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        date_default_timezone_set('America/Vancouver');
        $numday = date("d");
        $nummonth=date("m");
        $numyear=date("Y");
        $today=array(
            0 => $numyear, 
            1 => $nummonth-1, 
            2 => $numday, 
        );
        echo json_encode($today);
    }
?>