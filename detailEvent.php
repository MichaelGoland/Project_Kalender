<?php
session_start();
if(strlen($_SESSION['email']) == 0){
    header("location: login.php");
 }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="./DESIGN/isi.css">
    <script src="script.js"></script>

</head>
    <div>
        <header class="head"><h1>CALENDER</h1></header>      
        <h1 class="button"><a href="januari.html"><img src="https://cdn-icons-png.flaticon.com/512/60/60817.png" alt="home" width="50"></a></h1>  
    </div>
<body>
    <form action="add.php" method= post>
        <div>
            <h3>To do List: Kerja</h3>
            <table>
                <tr>
                    <td><label for="tglMulaiID">Tanggal Mulai </label></td>
                    <td>: <input type="date" name="tglMulai" id="tglMulaiID"></td>
                    <td><input type="time" name="wktMulai" id="wktMulaiID"></td>
                </tr>
                <tr>
                    <td><label for="tglSlsID">Tanggal Selesai </label></td>
                    <td>: <input type="date" name="tglSelesai" id="tglSlsID"></td>
                    <td><input type="time" name="wktSelesai" id="wktSlsID"></td>
                </tr>
                <tr>
                    <td><label for="levelID">Level Kepentingan </label> </td>
                    <td>: <select name="level" id="levelID">
                        <option value="0">Biasa</option>
                        <option value="1">Penting</option>
                        <option value="2">Sangat Penting</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="">Durasi: </label></td>
                    <td>: <input type="time" name="durasi" id="durasiID"></td>
                </tr>
                <tr>
                    <td><label for="lokasiID">Lokasi </label></td>
                    <td colspan="2"><textarea name="lokasi" id="lokasiID" cols="25" rows="5"></textarea></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="gambarID">Gambar Kegiatan </label></td>
                    <td colspan="2">: <input type="file" name="gambar" id="gambarID" accept="image/.jpg"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan">
                        <input type="reset" value="Reset"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
<footer>
    <p><b>By: Kezia Trifena - Michael Fidef - Michael Goland</b></p>
</footer>
</html>