<?php
include "koneksi.php";
?>

<?php

session_start();
if(strlen($_SESSION['email']) == 0){
    header("location: login.php");
 }  

    $sqlgetdata = "SELECT tgl_mulai,lokasi,id  from isi ";
    $stmt = $conn->prepare($sqlgetdata);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }

   // NOTES TOLONG DIBACA YA ini bukan komentar soalnya ini penting lan sorry ya pake capslock soalnya penting
   
   // lan golan json tidak bisa mengirimkan data gambar jadi yang gambar jangan pake JSON pakenya php
   // lokasi kegiatanmu tak jadiin nama soalnya tempatmu gak ada nama di database;
   // sorry lan soalnya kalo tak rombak semua bisa hancur filemu yang lain

    header('Content-Type: application/json');
    echo json_encode($data);
    
    $conn->close();
?>
