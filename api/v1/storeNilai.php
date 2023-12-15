<?php
    include '../../core.php';
if (@$_POST["x-id"]) {
    $nilai = $_POST['x-nilai'];
    $bab = $_POST["x-bab"];
    $id = $_POST['x-id'];
    $qry = "UPDATE nilai SET $bab='$nilai' WHERE id_siswa ='$id'";

    mysqli_query($conn, $qry);

    sendResponse(200, "Nilai Berhasil Di Update");
    
} else {
    sendResponse(400, "Data Tidak Lengkap");
}