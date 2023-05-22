<?php
session_start();
session_unset();
session_destroy();
setcookie("rememberMe", "", time() - 3600, "/");
setcookie("sessionData", "", time() - 3600, "/");
echo "<script>
            alert('Logout berhasil');
            window.location.href='../../';
        </script>";
