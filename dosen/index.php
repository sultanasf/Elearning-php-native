<?php
include("./controller.php");
if (!isDosen() && !isLogin()) {
    echo "<script>
                alert('Login terlebih dahulu sebagai dosen');
                window.location.href='./login/';
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
                                <img src="./assets/logo.jpg" alt="">
                                <span class="fw-bold">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item ms-4 aktif ps-1">
                            <a class="nav-link" href="#">
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
                                <a class="dropdown-item ms-1 " href="./kelas/">Pemrograman Web</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-4 ps-1">
                            <a class="nav-link dropdown-toggle" href="#" id="mahasiswaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-address-book"></i>
                                <span class="nav-item">Mahasiswa</span>
                            </a>
                            <div class="dropdown-menu ms-3 pe-2" aria-labelledby="mahasiswaDropdown">
                                <a class="dropdown-item ms-1" href="./mahasiswa/add.php">Tambah Mahasiswa</a>
                                <a class="dropdown-item ms-1" href="./mahasiswa/">List Mahasiswa</a>
                            </div>
                        </li>
                        <li class="nav-item ms-4 ps-1">
                            <a class="nav-link" href="./profil/">
                                <i class="fas fa-user"></i>
                                <span class="nav-item">Profil</span>
                            </a>
                        </li>
                        <li class="nav-item keluar ms-2">
                            <a class="nav-link" href="./logout/controller.php">
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
                        <h1 class="col-2">Kelas</h1>
                        <div class="col-10 d-flex">
                            <div class="ms-auto mt-2">
                                <h6><?php echo $nama; ?> (<?php echo $nip; ?>)
                                    <a href="./profil/">
                                        <i class="fas fa-user-cog"></i>
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container d-flex row">
                    <div class="card col-md-3 mx-1 rounded-4">
                        <i class="fas fa-laptop-code text-center mt-2"></i>
                        <div class="card-body">
                            <h6 class="card-title text-center">Pemrograman Web</h6>
                            <p class="card-text text-center">1 D4 IT A 2022</p>
                            <a href="./kelas/" class="btn btn-primary mx-5">Masuk</a>
                        </div>
                    </div>
                    <div class="card col-md-3 mx-1 rounded-4 loading">
                        <i class="fas fa-laptop-code text-center mt-2"></i>
                    </div>
                    <div class="card col-md-3 mx-1 rounded-4 loading">
                        <i class="fas fa-laptop-code text-center mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>