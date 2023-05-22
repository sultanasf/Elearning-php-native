<?php
include("../../config/connect.php");
session_start();
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $rawPassword = $_POST["password"];
    $rememberMe = isset($_POST["remember"]) ? 1 : 0;
    $result = mysqli_query($conn, "SELECT * FROM mhs where username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_array($result);
        $password = $data["password"];
        if (password_verify($rawPassword, $password)) {
            $_SESSION["isLogin"] = 1;
            $_SESSION["role"] = 0;
            $_SESSION["nrp"] = $data["nrp"];
            $_SESSION["nama"] = $data["nama"];
            if ($rememberMe) {
                // Simpan semua variabel sesi dalam cookie
                $sessionData = array(
                    "isLogin" => $_SESSION["isLogin"],
                    "role" => $_SESSION["role"],
                    "nrp" => $_SESSION["nrp"],
                    "nama" => $_SESSION["nama"]
                );
                $sessionDataEncoded = json_encode($sessionData);
                setcookie("sessionData", $sessionDataEncoded, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
            }
            echo "<script>
                    alert('login sebagai Mahasiswa berhasil');
                    window.location.href='../';
                </script>";
            exit;
        }
    }

    echo "<script>
            alert('username/password salah');
            window.location.href='./';
        </script>";
}
