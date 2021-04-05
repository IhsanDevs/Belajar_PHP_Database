<?php
session_start();
if (!isset($_SESSION['statusLogin'])) {
    header('location: login.php');
    exit;
}
// connect ke database
require 'functions.php';


// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
    htmlspecialchars(tambah($_POST));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Tambah Data Makahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                <label for="nrp">Masukkan NRP : </label>
                <input type="text" name="nrp" id="nrp" class="form-control" required>

                <label for="nama">Masukkan nama : </label>
                <input type="text" name="nama" id="nama" class="form-control" required>

                <label for="email">Masukkan email : </label>
                <input type="email" name="email" id="email" class="form-control" required>

                <label for="jurusan">Masukkan jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" required>

                <label for="formFile" class="form-label">Pilih foto profil : </label>
                <input class="form-control" type="file" id="formFile" name="gambar"><br>

                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Tambah Data!</button>
                </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>