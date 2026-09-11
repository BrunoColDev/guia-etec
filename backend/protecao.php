<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../backend/login.php");
    exit();
}
?>
