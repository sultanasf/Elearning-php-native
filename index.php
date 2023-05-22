<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Landing Page</title>
    <script src="https://kit.fontawesome.com/957a0225e8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #F2F5F8;
            color: #2C3E50;
        }

        .navbar {
            background-color: #2980B9;
        }

        .navbar .navbar-brand {
            color: #ECF0F1;
        }

        .navbar .nav-link {
            color: #ECF0F1;
        }

        .header {
            padding-top: 10rem;
            padding-bottom: 10rem;
            background-image: url('./assets/index-image.jpg');
            background-size: cover;
            background-position: center;
        }

        .header h1 {
            color: #ffffff;
            font-weight: bolder;
        }

        .header p {
            color: #ffffff;
            font-weight: bolder;
        }

        .cool .btn-secondary {
            background-color: #3498DB;
            border-color: #3498DB;
        }

        .cool .btn-primary:hover,
        .cool .btn-primary:focus {
            background-color: #117A65;
            border-color: #117A65;
        }

        .cool .btn-secondary:hover,
        .cool .btn-secondary:focus {
            background-color: #1F618D;
            border-color: #1F618D;
        }

        footer {
            background-color: #2980B9;
            color: #ECF0F1;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">E-LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./dosen/login/">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./mahasiswa/login/">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="text-center header cool">
        <div class="container">
            <h1>E - Learning Management System</h1>
            <p class="lead">A simple and effective way to Manage your Learning System.</p>
            <div class="d-flex justify-content-center">
                <a class="btn btn-secondary" href="./mahasiswa/login/" role="button">Login Mahasiswa <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </header>

    <footer class="py-3">
        <div class="container text-center">
            <p>&copy; Sultan. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>