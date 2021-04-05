<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'belajar_database';
$conn = mysqli_connect($server, $username, $password, $db_name);

// Membuat functions query mysqli
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// Membuat functions tambah data ke database
function tambah($dataTambah){
    $nama = HTMLSPECIALCHARS($dataTambah['nama']);
    $nrp = HTMLSPECIALCHARS($dataTambah['nrp']);
    $email = HTMLSPECIALCHARS($dataTambah['email']); 
    $jurusan = HTMLSPECIALCHARS($dataTambah['jurusan']);
    global $conn;

        // Upload gambar terlebih dahulu
        $gambar = upload();
        if (!$gambar) {
            return false;
        } else {
            $query = "INSERT INTO mahasiswa
                 VALUE
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data berhasil ditambahkan !'); window.location.replace('index.php');</script>";
    } else {
        return 'error : '.mysqli_error($conn);
        }
    }
}

        // Membuat function upload
        function upload(){
            global $conn;
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $pathFile = $_FILES['gambar']['tmp_name'];

            
            if ($error === 4) {
                echo "<script>alert('masukkan foto profil!');</script>";
                return false;
            }

            // Check  apakah yang diupload adalah gambar
            $ekstentionValid = ['jpg', 'png', 'jpeg'];
            $ekstentionImage = explode('.', $namaFile);
            $ekstentionImage = strtolower(end($ekstentionImage));
            if (!in_array($ekstentionImage, $ekstentionValid)) {
                echo "<script>alert('Format file tidak di izinkan !');</script>";
                return false;
            }

    
        // Check ukuran file
        if ($ukuranFile > 1000000) {
            echo "<script>alert('Ukuran gambar terlalu besar !');</script>";
            return false;
        }

        // Lolos pengecekan
        // Membuat random nama file
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstentionImage;
        move_uploaded_file($pathFile, 'img/user/' . $namaFileBaru);
        return $namaFileBaru;
    }

// Membuat functions hapus data
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    if (mysqli_affected_rows($conn) > 0) {
        return 'Data berhasil dihapus!';
    } else {
        return 'error : '.mysqli_error($conn);
    }
}

// Membuat functions update data ke database
function update($dataUpdate){

    $id = $dataUpdate['id'];
    $nrp = HTMLSPECIALCHARS($dataUpdate['nrp']);
    $nama = HTMLSPECIALCHARS($dataUpdate['nama']);
    $email = HTMLSPECIALCHARS($dataUpdate['email']); 
    $jurusan = HTMLSPECIALCHARS($dataUpdate['jurusan']);
    $gambarLama = HTMLSPECIALCHARS($dataUpdate['gambarLama']);
    global $conn;

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload(); 
    }
   

    $query = "UPDATE mahasiswa SET
            nrp = '$nrp',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return 'Data berhasil diubah!';
    } else {
        return 'error : '.mysqli_error($conn);
        }
    }

// Membuat functions cari
function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%'  OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'
    ";
    return query($query);
}
?>