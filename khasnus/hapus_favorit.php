<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Anda harus login!");
}

$fav_id = intval($_GET['id']);

// Hapus
mysqli_query($conn, "DELETE FROM favorites WHERE id = $fav_id");

header("Location: favorit.php");
exit;
?>
