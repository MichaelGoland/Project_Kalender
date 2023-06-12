<?php
session_start();
// session_destroy();
// kode disini
$conn = mysqli_connect("localhost", "root", "", "kalender") or die("Koneksi ke DB gagal");

    if ($_POST) {
        if(isset($_POST["email"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // $res = $conn->query("SELECT * FROM users_login WHERE email = '$email'");
        // $hash_pass = $res->fetch_assoc()['password'];

        // if (password_verify($password, $hash_pass)) {
        //     header("location: januari.html");

        $login = mysqli_query($conn, " SELECT * FROM users_login WHERE email = '$email' AND password = '$password'");
        $cek = mysqli_num_rows($login);
        $data = mysqli_fetch_array($login);

        if ($cek > 0) {
            // session_start();
            setcookie("nama", $data["nama"], time()+60*10);
            $_SESSION["email"] = $email;
            header("location: februari.php");
            }
        }else{
            header("location: login.php");
        }
    }
mysqli_close($conn);
?>