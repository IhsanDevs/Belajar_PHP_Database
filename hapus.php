<?php
require 'functions.php';
// Cek apakah terdapat parameter ID pada url
if (empty($_GET['id'])) {
    echo "<script>alert('Akses ditolak !'); window.location.replace('index.php');</script>";
}


$id = $_GET['id'];

if (isset($_GET['hapus'])) {
    echo '<script>alert("'.hapus($id).'"); document.location.href = "index.php"; </script>';
} else {
    echo "<script>alert('Akses ditolak !'); window.location.replace('index.php');</script>";
}

?>