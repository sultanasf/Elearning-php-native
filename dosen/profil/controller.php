<?php
session_start();
function isLogin()
{
    if ($_SESSION["isLogin"] != 1) {
        return 0;
    }
    return 1;
}
function isDosen()
{
    if (($_SESSION["role"] != 1)) {
        return 0;
    }
    return 1;
}
include("../../config/connect.php");
if (isset($_POST["submit"])) {
    $nip = $_SESSION["nip"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $rawPassword = $_POST["password"];
    $password = password_hash($rawPassword, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "UPDATE dosen SET nama=?, username=?, password=? WHERE nip=?");
    mysqli_stmt_bind_param($stmt, "ssss", $nama, $username, $password, $nip);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        mysqli_stmt_close($stmt);
        $_SESSION["nip"] = $nip;
        $_SESSION["nama"] = $nama;
        echo "<script>
        alert('Data sudah diubah!!');
        window.location.href='../';
    </script>";
    }
} else {
    $nama = $_SESSION["nama"];
    $nip = $_SESSION["nip"];

    $sql = "SELECT * FROM dosen WHERE nip='$nip'";
    $result = mysqli_query($conn, $sql);
    $d = mysqli_fetch_assoc($result);
    $username = $d["username"];
}
