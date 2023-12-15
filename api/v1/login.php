<?php
include '../../core.php';
if ($_POST) {
    $result = login(@$_POST["x-uname"], $_POST['x-pass']);
    if (mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);

        sendResponse(200, "Login Berhasil", $data);
    }else {
        sendResponse(400, "Login Gagal");
    }
    
    
} else {
    sendResponse(400, "Login Gagal");
}
