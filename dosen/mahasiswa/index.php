<?php
include("./controller.php");
if (!isDosen() && !isLogin()) {
    echo "<script>
                alert('Login terlebih dahulu sebagai dosen');
                window.location.href='../login/';
    </script>";
}
$nip = $_SESSION["nip"];
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
            /* Menambahkan margin left agar tidak terlindas oleh sidebar */
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
            margin-top: 250px;
        }

        .aktif {
            background-color: slategray;
            border-radius: var(--bs-border-radius-lg) !important;
            /* opacity: 0.1; */
        }

        .loading {
            background-color: grey;
            opacity: 0.2;
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
                        <li class="nav-item dropdown ms-4 ps-1">
                            <a class="nav-link dropdown-toggle" href="#" id="kelasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <span class="nav-item">Kelas</span>
                            </a>
                            <div class="dropdown-menu ms-3 pe-2" aria-labelledby="kelasDropdown">
                                <a class="dropdown-item ms-1 " href="../kelas/">Pemrograman Web</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-4 aktif ps-1">
                            <a class="nav-link dropdown-toggle" href="#" id="mahasiswaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-address-book"></i>
                                <span class="nav-item">Mahasiswa</span>
                            </a>
                            <div class="dropdown-menu ms-3 pe-2" aria-labelledby="mahasiswaDropdown">
                                <a class="dropdown-item ms-1" href="./add.php">Tambah Mahasiswa</a>
                                <a class="dropdown-item ms-1 aktif" href="#">List Mahasiswa</a>
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
                        <h1 class="col-2">Mahasiswa</h1>
                        <div class="col-10 d-flex">
                            <div class="ms-auto mt-2">
                                <h6><?php echo $nama; ?> (<?php echo $nip; ?>)
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
                            <table border="2" class="table table-rounded mt-2">
                                <thead>
                                    <tr>
                                        <th class=" bg-secondary">NRP</th>
                                        <th class=" bg-secondary">Nama</th>
                                        <th class=" bg-secondary">Jenis Kelamin</th>
                                        <th class=" bg-secondary">Prodi</th>
                                        <th class=" bg-secondary">Foto</th>
                                        <th class=" bg-secondary"></th>
                                    </tr>
                                </thead>
                                <?php
                                include '../../config/connect.php';
                                $data = mysqli_query($conn, 'SELECT * FROM `mhs` ORDER BY `nrp`');
                                $index = 0;
                                while ($d = mysqli_fetch_assoc($data)) {
                                    $filepath = "../../mahasiswa/images/" . $d["namaFile"];
                                    echo "<tr>";
                                    echo "<td>" . $d['nrp'] . "</td>";
                                    echo "<td>" . $d['nama'] . "</td>";
                                    echo "<td>" . $d['jenisKelamin'] . "</td>";
                                    echo "<td>" . $d['prodi'] . "</td>";
                                    echo "<td><a href='$filepath' class='btn btn-sm btn-primary me-2' target='blank'>View</a><a href='$filepath' class='btn btn-sm btn-primary' download>Download</a></td>";
                                    echo "<td> <button  class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal" . $index . "'>Delete</button>
                        <div class='modal fade' id='exampleModal" . $index . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Warning!!</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            <p>Apakah anda yakin menghapus $d[nama]?</p>
                            </div>
                            <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <a href='./controller.php?id=$d[id]&file=$d[namaFile]' class='btn btn-danger'>Delete</a>
                            </div>
                            </div>
                            </div>
                            </div>
                            </td>";
                                    echo "</tr>";;
                                    $index++;
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
</body>

</html>