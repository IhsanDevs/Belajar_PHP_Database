<?php
require 'functions.php';
$id = $_GET['id'];

if (isset($_GET['id'])) {
    echo '<script>alert("'.hapus($id).'"); document.location.href = "index.php"; </script>';
}

?>