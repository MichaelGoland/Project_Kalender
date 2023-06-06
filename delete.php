<?php 
    include "koneksi.php";
    if (isset($_GET)){
        echo $_GET['id'];
        $sqlgetdata = "Delete from isi where id = ".$_GET['id'];
        $stmt = $conn->prepare($sqlgetdata);
        $stmt->execute();
        $result = $stmt->get_result();


    
        
        
    }



?>