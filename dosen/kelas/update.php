<?php
include("./controller.php");
if (!isDosen() && !isLogin()) {
    echo "<script>
                alert('Login terlebih dahulu sebagai dosen');
                window.location.href='../login/';
    </script>";
}

include("../../config/connect.php");
if (isset($_POST['submit'])) {
    $idMahasiswa = $_POST['idMahasiswa'];
    $nilaiTugas = $_POST['nilaiTugas'];
    $nilaiUts = $_POST['nilaiUts'];
    $nilaiUas = $_POST['nilaiUas'];

    // Menghitung rata-rata dan mengubahnya menjadi indeks
    $rataNilai = ($nilaiTugas + $nilaiUts + $nilaiUas) / 3;
    if ($rataNilai >= 81 && $rataNilai <= 100) {
        $indeks = 'A';
    } elseif ($rataNilai >= 76 && $rataNilai <= 80) {
        $indeks = 'B';
    } elseif ($rataNilai >= 61 && $rataNilai <= 75) {
        $indeks = 'C';
    } elseif ($rataNilai >= 56 && $rataNilai <= 60) {
        $indeks = 'D';
    } else {
        $indeks = 'E';
    }

    // Update nilai ke dalam tabel
    $query = "UPDATE nilai SET nilaiTugas = $nilaiTugas, nilaiUts = $nilaiUts, nilaiUas = $nilaiUas, indeks = '$indeks' WHERE idMahasiswa = $idMahasiswa";
    // Lakukan eksekusi query dengan menggunakan fungsi yang sesuai dengan library atau framework yang digunakan (contoh: mysqli_query, PDO, dll.)
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message = "Update successful.";
        echo "<script>
                    alert('Nilai berhasil diupdate');
                    window.location.href='./';
            </script>";
        die;
    } else {
        $error = "Update failed.";
    }
    // Setelah berhasil melakukan update, arahkan pengguna ke halaman index.php atau halaman yang sesuai
}
