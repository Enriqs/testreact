<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    session_start();
    $sid = session_id();
    $_SESSION['favcolor'] = "green";
    echo json_encode(["sid"=>$sid]);
?>