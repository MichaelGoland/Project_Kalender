<?php 
    include "koneksi.php";

    if($_GET){
        $id = $_GET['id'];
        $sql = "SELECT * FROM isi WHERE id='".$_GET['id']."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $oldgambar_kegiatan = $row["gambar_kegiatan"];
        }
        else {
            echo "Data yang hendak diedit tidak ada.";
        }

        //mysqli_close($conn);
    }
    unlink($oldgambar_kegiatan); //biar ilang

     $sqlgetdata = "Delete from isi where id = ".$_GET['id'];
     $stmt = $conn->prepare($sqlgetdata);
     $stmt->execute();
     $result = $stmt->get_result();
     header("location: februari.php");
?>