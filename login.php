<?php
session_start();

if (isset($_SESSION['statusLogin'])) {
    header('location: index.php');
    exit;
}
require 'functions.php';
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) === 1) {
        // Cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'] )){
            // Set session
            $_SESSION['statusLogin'] = true;
            header ("location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        label {
            display: block;
        }

        li {
            list-style: none;
            margin: 10px;
        }
    </style>
</head>
<body class="p-3 mb-2 bg-primary text-white">
<h1 class="text-center">Log In Administrator</h1>
    <form action="" method="post">

    
    <?php if (isset($error)) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> Username/Password yang kamu masukkan salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>


        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" placeholder="username" size="50" class="form-control" required>
            </li>

            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" placeholder="password" size="50" class="form-control" required>
            </li>

            <li>Belum daftar? silahkan<a href="http://localhost/belajar_db/signup.php" class="badge badge-light">klik disini</a>.</li>

            <li><button type="submit" class="btn btn-light" name="login">Log In</button></li>
        </ul>
    </form>
    
    <script src="assets/js/jquery.js"></script> 
	<script src="assets/js/popper.js"></script> 
	<script src="assets/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>