<?php
session_start();
function isLogin()
{
    if ($_SESSION["isLogin"] != 1) {
        return 0;
    }
    return 1;
}
