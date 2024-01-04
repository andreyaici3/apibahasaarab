<?php


include "conn.php";

$mode = 1;

//1 => development
//2 => release

if ($mode == 1){
    $base_url = "/aplikasibahasa/";
    
} else {
    $base_url = "/";
    error_reporting(0);
}

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

function resetNilai($idSiswa, $qry){
    global $conn;
    $query = "UPDATE nilai SET $qry WHERE id_siswa='$idSiswa'";

    mysqli_query($conn, $query );

    return mysqli_affected_rows($conn);
}

function alert($message, $url){
    return "
            <script type=text/javascript> 
                alert ('". $message ."');
                window.location.href = '".$url ."';
            </script>
        ";
}