    <?php
    //Koneksi
    include 'koneksi.php';
    $id = 0;
    if($_GET){
        $id = $_GET['id'];
        $sql = "SELECT * FROM mahasiswa WHERE id='".$_GET['id']."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $oldNim = $row["nim"];
            $oldNama = $row["nama"];
            $oldKelamin = $row["jenis_kelamin"];
        }
        else {
            echo "Data yang hendak diedit tidak ada.";
        }
        mysqli_close($conn);
    }
    ?>
    <form action= "form-mhs.php" method= "POST">
        <input type="hidden" name="id" value="<?php if($id>0) {echo $id;}?>">
        nim: <input type="text" name="nim" max= "8" value="<?php if($id>0) {echo $oldNim;}?>"> <br>
        nama: <input type="text" name = "nama" max = "50" value="<?php if($id>0) {echo $oldNama;}?>"><br>
        kelamin: <br>
        <input type= "radio" value = "L" name = "jenis_kelamin" <?php if($id>0) {echo ($oldKelamin =='L')?'checked':"";}?>>Laki-laki <br>
        <input type= "radio" value = "P" name = "jenis_kelamin"<?php if($id>0) {echo ($oldKelamin =='P')?'checked':"";}?>>Perempuan <br>
        <input type= "submit"> 
    </form>
    <?php
    if($_POST){
        if($_POST["id"] != 0){
        //update
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $kelamin = $_POST["jenis_kelamin"];
        $sql = "UPDATE mahasiswa 
                set nim =\"$nim\", 
                nama= \"$nama\", 
                jenis_kelamin=\"$kelamin\"
                WHERE id=$id";
            if(mysqli_query($conn, $sql)){
                echo "Berhasil mengubah data.";
            } else {
                echo "Gagal megubah data.";
            }
        }
        else{
            //insert
            $nim = $_POST["nim"];
            $nama = $_POST["nama"];
            $kelamin = $_POST["jenis_kelamin"];
            $sql = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin) values ('".$nim."','".$nama."','".$kelamin."')";
                if(mysqli_query($conn, $sql)){
                    
                } else {
                    echo "Gagal mengisi data.";
                }
            }
            
        }
       
    // mysqli_close($conn);
    ?>
