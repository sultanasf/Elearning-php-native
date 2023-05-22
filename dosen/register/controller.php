<?php
include("../../config/connect.php");
if (isset($_POST["submit"])) {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $rawPassword = $_POST["password"];

    $password = password_hash($rawPassword, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "INSERT INTO dosen (username, password, nip, nama) VALUES (?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $nip, $nama);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    // header("location:../index.php");
}
