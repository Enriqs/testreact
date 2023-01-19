<?php
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Header:Content-Type');
    $sid = $_POST['sid'];
    // $data = file_get_contents("php://input");
    // $data = json_decode($data,true);
    session_id($sid);
    // session_id($data['sid']);
    session_start();
    echo ($_SESSION['favcolor']);
?>