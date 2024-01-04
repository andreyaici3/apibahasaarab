<?php
require_once "conn.php";
require_once "core.php";
$id = @$_GET["id"];
$bab = @$_GET["bab"];
if (isset($id) && isset($bab) ){
    $result = resetNilai($id, "bab$bab = '0'");
    if ($result) {
        echo alert("Data Berhasil Direset",  $base_url . "/detailnilai.php?id=". $id  );
    } else {
        echo alert("Data Gagal Direset",  $base_url . "/detailnilai.php?id=". $id  );
    }

}else{
   echo alert("Data Gagal Direset", $base_url );
}