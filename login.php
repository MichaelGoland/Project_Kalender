<?php
session_start();
session_destroy();
// kode disini
$conn = mysqli_connect("localhost", "root", "", "kalender_fidef") or die("Koneksi ke DB gagal");

    if ($_POST) {
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
            session_start();
            setcookie("nama", $data["nama"], time()+60);
            $_SESSION["email"] = $email;
            header("location: februari.php");
        }
    }
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./DESIGN/login.css">

</head>
<body>

    <!-- <img src="ukdw-2.png" alt="ukdw"> -->
    <!-- <img src="ukdw-2.png" alt=""> -->
    <header class="calender"> <h1> WELCOME TO 2024 </h1> </header>
    <main>
        <div class="login-box">
            <h2>Login Here</h2>
            <form method="post" action="login.php">
                <label>Email</label>
                <input type="text" placeholder="Enter Email" name="email">
                <label>Password</label>
                <input type="password" placeholder="Enter Password" name="password">
                <input type="submit" name="submit" value="Login">
                <a href="#">Forgot Password</a>
                <!-- <p><?= $validasi_gagal ?></p> -->
            </form>
        </div>      

    </main>
 
    <footer>
        <p><b>FTI UKDW 2023 &#169;Copyright</b></p>
    </footer>
</body>
</html>