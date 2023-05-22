<?php
session_start();
if (isset($_COOKIE["sessionData"])) {
    $sessionDataEncoded = $_COOKIE["sessionData"];
    $sessionData = json_decode($sessionDataEncoded, true);

    // Set nilai sesi dari cookie
    $_SESSION["isLogin"] = $sessionData["isLogin"];
    $_SESSION["role"] = $sessionData["role"];
    $_SESSION["nrp"] = $sessionData["nrp"];
    $_SESSION["nama"] = $sessionData["nama"];
}
if (isset($_SESSION["isLogin"])) {
    echo "<script>
    alert('Anda sudah login');
    window.location.href='../';
</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="./controller.php" method="post">
                            <div class="form-group mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-primary w-100" name="submit" value="Login">
                                <a href="../../" class="btn btn-secondary w-100 mt-3">Back to Menu</a>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>