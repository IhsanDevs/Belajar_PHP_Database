<?php
// connect ke database
require 'functions.php';

// Cek apakah terdapat parameter ID pada url
if (empty($_GET['id'])) {
    echo "<script>alert('Akses ditolak !'); window.location.replace('index.php');</script>";
} 

// Ambil data sesuai ID
$idTarget = $_GET['id'];
$idMahasiswa = query("SELECT * FROM mahasiswa WHERE id = $idTarget")[0];

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
    echo '<script>alert("'.update($_POST).'"); document.location.href = "index.php"; </script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Update Data Makahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $idMahasiswa['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?php echo $idMahasiswa['gambar']; ?>">

                <div class="form-group">
                <label for="nrp">Masukkan NRP : </label>
                <input type="text" name="nrp" id="nrp" class="form-control" value="<?php echo $idMahasiswa['nrp']; ?>">

                <label for="nama">Masukkan nama : </label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $idMahasiswa['nama']; ?>">

                <label for="email">Masukkan email : </label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $idMahasiswa['email']; ?>">

                <label for="jurusan">Masukkan jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?php echo $idMahasiswa['jurusan']; ?>">

                <label for="formFile" class="form-label">Pilih foto profil : </label><br>

                <img src="img/user/<?php echo $idMahasiswa['gambar']; ?>" alt="Foto Profil" width="100"><br><br>

                <input class="form-control" type="file" id="formFile" name="gambar"><br>

                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Update Data!</button>
                </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>