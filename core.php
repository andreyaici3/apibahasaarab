<?php


include "conn.php";
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

function getDetailNilai($idSiswa){
    global $conn;
    $str = "SELECT nilai.*, siswa.*, nilai.id AS id_nilai, siswa.id AS id_siswa FROM siswa, nilai WHERE nilai.id_siswa = siswa.id AND siswa.id = $idSiswa";
    $query = mysqli_query($conn, $str);
    $data = mysqli_fetch_assoc($query);

    return $data;
}