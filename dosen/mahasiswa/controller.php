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
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $imageName = $_GET["file"];
    $imagePath = "../../mahasiswa/images/" . $imageName;

    if (unlink($imagePath)) {
        $sql2 = "DELETE FROM mhs WHERE id=$id";
        $result = mysqli_query($conn, $sql2);
        header('Location:./');
    }
}

if (isset($_POST["submit"]) && isDosen()) {
    $nama = $_POST["nama"];
    $nrp = $_POST["nrp"];
    $jenisKelamin = $_POST["jenisKelamin"];
    $prodi = $_POST["prodi"];
    $username = $_POST["username"];
    $rawPassword = $_POST["password"];
    $password = password_hash($rawPassword, PASSWORD_DEFAULT);

    $target_dir = "../../mahasiswa/images/";
    $uploadTimestamp = time();
    $filename = $uploadTimestamp . '_' . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES["image"]["size"] > 5 * 1024 * 1024) {
        echo "Sorry, the file is too large. It should be less than 5MB.";
        $uploadOk = 0;
    }

    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is fine, try to upload the file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO mhs (nama, nrp, jenisKelamin, prodi, namaFile, username, password) VALUES ('$nama','$nrp','$jenisKelamin','$prodi','$filename','$username','$password')";
            mysqli_query($conn, $sql);
            $result = mysqli_query($conn, "SELECT * FROM mhs WHERE nrp='$nrp'");
            $d = mysqli_fetch_assoc($result);
            $idMhs = $d["id"];
            $sql2 = "INSERT INTO nilai (idMahasiswa) VALUES ('$idMhs')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                echo "<script>
                    alert('Mahasiswa ditambahkan');
                    window.location.href='./';
                </script>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
