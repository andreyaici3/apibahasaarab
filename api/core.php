<?php


$conn = mysqli_connect("localhost", "drea3825_andrey4307", "ITClub430724", "drea3825_bahasaarab");


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