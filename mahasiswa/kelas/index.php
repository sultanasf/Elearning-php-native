<?php
include("./controller.php");
if (!isLogin()) {
    echo "<script>
                alert('Login terlebih dahulu sebagai mahasiswa');
                window.location.href='../login/';
    </script>";
}
$nrp = $_SESSION["nrp"];
$nama = $_SESSION["nama"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <title>Dashboard</title>
    <style>
        body {
            background: #dfe9f5;
        }

        .sidebar {
            background: #333;
            height: 100vh;
        }

        .main {
            padding: 20px;
            margin-left: 280px;
        }

        .logo img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }

        .fixed-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background: #333;
            z-index: 999;
            overflow-y: auto;
            padding: 20px;
        }

        .fixed-sidebar .nav-link {
            margin-left: -15px;
            color: #fff;
        }

        .fixed-sidebar .nav-item:not(:last-child) {
            margin-bottom: 10px;
        }

        .keluar {
            margin-top: 300px;
        }

        .aktif {
            background-color: slategray;
            border-radius: var(--bs-border-radius-lg) !important;
        }

        .loading {
            background-color: grey;
            opacity: 0.2;
        }

        .small-input {
            max-width: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 fixed-sidebar">
                <nav class="">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link logo" href="#">
                                <img src="../assets/logo.jpg" alt="">
                                <span class="fw-bold">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item ms-4 ps-1">
                            <a class="nav-link" href="../">
                                <i class="fas fa-home"></i>
                                <span class="nav-item">Home</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown ms-4 ps-1 aktif">
                            <a class="nav-link dropdown-toggle" href="#" id="kelasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <span class="nav-item">Kelas</span>
                            </a>
                            <div class="dropdown-menu ms-3 pe-2" aria-labelledby="kelasDropdown">
                                <a class="dropdown-item ms-1 aktif" href="../kelas/">Pemrograman Web</a>
                            </div>
                        </li>
                        <li class="nav-item ms-4 ps-1">
                            <a class="nav-link" href="../profil/">
                                <i class="fas fa-user"></i>
                                <span class="nav-item">Profil</span>
                            </a>
                        </li>
                        <li class="nav-item keluar ms-2">
                            <a class="nav-link" href="../logout/controller.php">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-item">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9 main">
                <div class="container">
                    <div class="row mb-4">
                        <h2 class="col-4">Pemrograman Web</h2>
                        <div class="col-8 d-flex">
                            <div class="ms-auto mt-2">
                                <h6><?php echo $nama; ?> (<?php echo $nrp; ?>)
                                    <a href="../profil/">
                                        <i class="fas fa-user-cog"></i>
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-12">
                            <form method="POST" action="./controller.php">
                                <table border="2" class="table table-rounded mt-2">
                                    <thead>
                                        <tr>
                                            <th class="bg-secondary">Nrp</th>
                                            <th class="bg-secondary">Nama</th>
                                            <th class="bg-secondary">Nilai Tugas</th>
                                            <th class="bg-secondary">Nilai UTS</th>
                                            <th class="bg-secondary">Nilai UAS</th>
                                            <th class="bg-secondary">Indeks</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $data = mysqli_query($conn, "SELECT nilai.idMahasiswa, nilai.nilaiTugas, nilai.nilaiUts, nilai.nilaiUas, nilai.indeks, mhs.nama, mhs.nrp
                                FROM nilai, mhs
                                WHERE nilai.idMahasiswa = mhs.id AND nrp=$nrp
                                ORDER BY nrp");
                                    while ($d = mysqli_fetch_assoc($data)) {
                                        echo "<tr>";
                                        echo "<td>" . $d['nrp'] . "</td>";
                                        echo "<td>" . $d['nama'] . "</td>";
                                        echo "<td>";
                                        echo "<input type='text' class='small-input' name='nilaiTugas' value='" . $d['nilaiTugas'] . "' disabled>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<input type='text' class='small-input' name='nilaiUts' value='" . $d['nilaiUts'] . "' disabled>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<input type='text' class='small-input' name='nilaiUas' value='" . $d['nilaiUas'] . "' disabled>";
                                        echo "</td>";
                                        echo "<td>" . $d['indeks'] . "</td>";
                                        echo "<input type='hidden' name='idMahasiswa' value='" . $d['idMahasiswa'] . "'>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function enableEdit(element) {
            // Get the parent row of the clicked button
            var row = element.closest('tr');

            // Find the input fields in the row
            var inputs = row.getElementsByTagName('input');

            // Enable the input fields
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].removeAttribute('disabled');
            }

            // Show the submit button
            var submitButton = row.querySelector('.submit-btn');
            submitButton.classList.remove('d-none');
        }
    </script>
</body>

</html>