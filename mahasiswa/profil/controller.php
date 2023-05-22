<?php
session_start();
function isLogin()
{
    if ($_SESSION["isLogin"] != 1) {
        return 0;
    }
    return 1;
}
include("../../config/connect.php");
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $nrp = $_POST["nrp"];
    $nama = $_POST["nama"];
    $jenisKelamin = $_POST["jenisKelamin"];
    $prodi = $_POST["prodi"];
    $username = $_POST["username"];
    $rawPassword = $_POST["password"];
    $password = password_hash($rawPassword, PASSWORD_DEFAULT);

    if (strlen($_FILES["new-image"]["name"]) > 0) {
        $oldImagePath = "../images/" . $_POST['old-image'];
        unlink($oldImagePath);

        $newImageFilename = $_FILES["new-image"]["name"];
        $newImageTmpPath = $_FILES["new-image"]["tmp_name"];
        $newImageFileType = strtolower(pathinfo($newImageFilename, PATHINFO_EXTENSION));
        $targetDir = "../images/";
        $targetFile = $targetDir . $newImageFilename;

        if (move_uploaded_file($newImageTmpPath, $targetFile)) {
            $sql = "UPDATE mhs SET nrp='$nrp', nama='$nama', jenisKelamin='$jenisKelamin', prodi='$prodi', username='$username', password='$password', namaFile='$newImageFilename' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                alert('Data telah diupdate');
                window.location.href='./';
                </script>";
            } else {
                echo "Error updating image filename in the database: " . mysqli_error($conn);
            }
        }
    } else {
        $sql = "UPDATE mhs SET nrp='$nrp', nama='$nama', jenisKelamin='$jenisKelamin', prodi='$prodi', username='$username', password='$password' WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>
            alert('Data telah diupdate');
            window.location.href='./';
            </script>";
        }
    }
    $_SESSION["nrp"] = $nrp;
    $_SESSION["nama"] = $nama;
}
