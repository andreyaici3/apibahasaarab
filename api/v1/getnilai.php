<?php
include '../core.php';
$str = "SELECT nilai.*, siswa.*, nilai.id AS id_nilai, siswa.id AS id_siswa FROM siswa, nilai WHERE nilai.id_siswa = siswa.id ORDER BY siswa.nama ASC;";

$query = mysqli_query($conn, $str);

while($data = mysqli_fetch_assoc($query)){
    $row[] = $data;
}
sendResponse(200, "Data Berhasil Di ambil", $row);