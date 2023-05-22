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
                                <a class="dropdown-item ms-1 aktif" href="#">Tambah Mahasiswa</a>
                                <a class="dropdown-item ms-1" href="./">List Mahasiswa</a>
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
                <div class="container-fluid mb-5">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-8">
                            <form method="post" class="bg-light p-3 rounded-3" action="./controller.php" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <h5 class="text-center">Biodata Mahasiswa</h5>
                                </div>
                                <div class="row g-3 mb-2">
                                    <div class="col-4">
                                        <label for="exampleInputEmail1" class="form-label">Nrp</label>
                                        <input type="text" class="form-control" name="nrp" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-8">
                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="row g-0 mb-2">
                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="form-label d-flex">Jenis Kelamin</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="" value="Laki-laki">
                                            <label class="form-check-label" for="">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="" value="Perempuan">
                                            <label class="form-check-label" for="">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputEmail1" class="form-label">Prodi</label>
                                        <input type="text" class="form-control" name="prodi" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="container p-3 rounded-3" style="background-color: #abdbe3;">
                                    <div class="mb-2">
                                        <h5 class="text-center">Login Information</h5>
                                    </div>
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <input type="submit" value="Submit" name="submit" class="mt-3 btn btn-success"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>