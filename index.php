<?php
session_start();
if (!isset($_SESSION['statusLogin'])) {
    header('location: login.php');
    exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM `mahasiswa` ORDER BY id DESC");

// Tombol cari di klik
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<title>Halaman Admin</title>
</head>

<body class="text-center p-3 mb-2 bg-info text-dark">
    <h1>Daftar Mahasiswa</h1>
   
    <form action="" method="post">
        <input type="search" name="keyword" id="" required class="form-control" placeholder="Cari data NRP ..." autocomplete="off"><br>
        <button type="submit" name="cari" class="btn btn-primary">Search</button>
    </form>

    <a href="tambah.php" class="text-decoration-none"><button class="btn btn-primary">Tambah data mahasiswa</button></a><br><br>

    <a href="logout.php"><button type="button" class="btn btn-outline-light">Log Out</button></a><br><br>

    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-hover table-striped text-center p-3 mb-2 bg-light text-dark">
    <thead>
    <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nrp</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Jurusan</th>
    </tr>
    </thead>
    <?php $count = 1; ?>
    <?php foreach ($mahasiswa as $row ) : ?>
    <tr class="table-light">
    <td><?php echo $count; ?></td>
    <td>
    <a href="update.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">Ubah</a> |
    <a href="hapus.php?id=<?php echo $row['id']; ?>" class="text-decoration-none" name="hapus" onclick="return confirm('Oups.. Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
    </td>

    <td><img src="img/user/<?php echo $row['gambar']; ?>" alt="Foto Profil" width="70" class="img-fluid rounded mx-auto d-block"></td>
    <td><?php echo $row['nrp']; ?> </td>
    <td><?php echo $row['nama']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['jurusan']; ?></td>

    </tr>
    <?php $count++; ?>
    <?php endforeach; ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>