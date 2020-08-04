<?php
    session_start();
    unset($_SESSION['login_id']);
    session_destroy();

    header("Location: pages_staff_login.php");
    exit;