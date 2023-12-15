<?php


$conn = mysqli_connect("localhost", "root", "", "b_arab");


function sendResponse($status_code, $message, $data = []){
    header('Content-Type: application/json; charset=utf-8');

    $arr["result"] = [
        "status" => $status_code,
        "message" => $message,
        "data" => ($data != []) ? $data : null
    ];

    echo json_encode($arr);
    http_response_code($status_code);
    exit;
}

function login($username = '', $password = ''){
    global $conn;
    $qry = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$username' AND password = '$password'");

    return $qry;
}