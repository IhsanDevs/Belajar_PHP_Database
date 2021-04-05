<?php
require 'functions.php';
if (isset($_POST['signup'])) {
    
    if (register($_POST) > 0) {
        echo "<script>alert('Selamat! Anda berhasil terdaftar!');</script>";
    } else {
        echo mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
    <h1 class="text-center">Sign Up</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" placeholder="username" size="50" class="form-control" required>
            </li>

            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" placeholder="email" size="50" class="form-control" required>
            </li>

            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" placeholder="password" size="50" class="form-control" required>
            </li>

            <li>
                <label for="confirm">Confirm Password :</label>
                <input type="password" name="confirm" id="confirm" placeholder="password" size="50" class="form-control" required>
            </li>

            <li><button type="submit" class="btn btn-light" name="signup">Sign Up</button></li>
        </ul>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>