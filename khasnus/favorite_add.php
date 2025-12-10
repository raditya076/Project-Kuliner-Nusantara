<?php
session_start();
require 'config.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    die("Anda harus login untuk menambahkan favorit.");
}

$user_id = $_SESSION['user_id'];
$food_id = intval($_POST['food_id']);

// Cek apakah sudah ada di favorit
$check = mysqli_query($conn, "SELECT * FROM favorites WHERE user_id=$user_id AND food_id=$food_id");

if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Sudah ada di daftar favorit!'); window.history.back();</script>";
    exit;
}

// Tambah ke favorit
$sql = "INSERT INTO favorites (user_id, food_id) VALUES ($user_id, $food_id)";
mysqli_query($conn, $sql);

echo "<script>alert('Berhasil ditambahkan ke favorit!'); window.history.back();</script>";
?>
