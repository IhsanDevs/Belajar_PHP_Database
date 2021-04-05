<?php
session_start();
if (!isset($_SESSION['statusLogin'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';

$id = $_GET['id'];

if (isset($_GET['id'])) {
    echo '<script>alert("'.hapus($id).'"); window.location.replace("index.php"); </script>';
} else {
    echo "<script>alert('Akses ditolak !'); window.location.replace('index.php'); </script>";
}

?>