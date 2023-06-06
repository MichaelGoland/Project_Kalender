<?php
// kode disini
// $conn = mysqli_connect("localhost", "root", "", "kalender_fidef") or die("Koneksi ke DB gagal");
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="./DESIGN/isi.css">


</head>
    <div>
        <header class="head"><h1>CALENDER</h1></header>      
        <h1 class="button"><a href="februari.php"><img src="https://cdn-icons-png.flaticon.com/512/60/60817.png" alt="home" width="50"></a></h1>  
    </div>
<body>
    <form action="add.php" method= "post" enctype="multipart/form-data">
        <div>
            <h3>To do List: Kerja</h3>
            <table>
                <tr>
                    <td><label for="tglMulaiID">Tanggal Mulai </label></td>
                    <td>: <input type="date" name="tgl_mulai" id="tglMulaiID"></td>
                    <td><input type="time" name="wkt_mulai" id="wktMulaiID"></td>
                </tr>
                <tr>
                    <td><label for="tglSlsID">Tanggal Selesai </label></td>
                    <td>: <input type="date" name="tgl_selesai" id="tglSlsID"></td>
                    <td><input type="time" name="wkt_selesai" id="wktSlsID"></td>
                </tr>
                <tr>
                    <td><label for="levelID">Level Kepentingan </label> </td>
                    <td>: <select name="level" id="levelID">
                        <option value="0">Biasa</option>
                        <option value="1">Penting</option>
                        <option value="2">Sangat Penting</option>
                    </select></td>
                </tr>
                <!-- <tr>
                    <td><label for="">Durasi: </label></td>
                    <td>: <input type="time" name="durasi" id="durasiID"></td>
                </tr> -->
                <tr>
                    <td><label for="lokasiID">Lokasi </label></td>
                    <td colspan="2"><textarea name="lokasi" id="lokasiID" cols="25" rows="5"></textarea></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="gambarID">Gambar Kegiatan </label></td>
                    <td colspan="2">: <input type="file" name="gambar_kegiatan" id="gambarID" ></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SimpanAA" name="GOLAND">
                        <input type="reset" value="Reset"></td>
                </tr>
            </table>
        </div>
    </form>
    <?php
     session_start();  
     if(strlen($_SESSION['email']) == 0){
        header("location: login.php");
     }


if(isset($_POST["GOLAND"])){
    $tglMulai = $_POST['tgl_mulai'];
    $wktMulai = $_POST['wkt_mulai'];
    $tglSelesai = $_POST['tgl_selesai'];
    $wktSelesai = $_POST['wkt_selesai'];
    $levelKepentingan = $_POST['level'];
    $lokasi = $_POST['lokasi'];

    $uploadGambar = "images/" .$_FILES['gambar_kegiatan']['name'];
    move_uploaded_file($_FILES['gambar_kegiatan']['tmp_name'], $uploadGambar);

    $waktu_1 = strtotime($wktMulai);
    $waktu_2 = strtotime($wktSelesai);

    $durasi = ($waktu_2-$waktu_1)-1;
    $real_durasi = date("H", $durasi);

    $sql = "INSERT INTO isi (tgl_mulai, wkt_mulai, tgl_selesai, wkt_selesai, level_kepentingan, durasi, lokasi, gambar_kegiatan) 
            VALUES ('$tglMulai', '$wktMulai', '$tglSelesai', '$wktSelesai', '$levelKepentingan', '$real_durasi', '$lokasi', '$uploadGambar')";

    $uhuy = mysqli_query($conn, $sql);
    if($uhuy){
        echo "berhasil";
    } else {
        echo "error message: " . mysqli_error($conn);
    }
}

?>


</body>
<footer>
    <p><b>By: Kezia Trifena - Michael Fidef - Michael Goland</b></p>
</footer>
</html>