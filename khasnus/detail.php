<?php
require 'config.php';

// untuk pastikan ada parameter id
if (!isset($_GET['id'])) {
    die("ID makanan tidak ditemukan.");
}

$food_id = intval($_GET['id']);

// untuk Query detail makanan
$query = "
    SELECT foods.*, provinces.name AS province_name
    FROM foods
    JOIN provinces ON foods.province_id = provinces.id
    WHERE foods.id = $food_id
";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Jika tidak ada data
if (!$data) {
    die("Data makanan tidak ditemukan di database.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['name']; ?> - Detail Makanan Khas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            padding: 40px;
        }
        .container {
            width: 800px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        .image-box {
            text-align: center;
            margin-bottom: 20px;
        }
        .image-box img {
            width: 350px;
            height: auto;
            border-radius: 10px;
        }
        .section {
            margin: 20px 0;
        }
        .section h3 {
            margin-bottom: 8px;
            color: #333;
        }
        a.back {
            display: inline-block;
            margin-top: 20px;
            background: #333;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
        }
        a.back:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
            <h1><?= $data['name']; ?></h1>
            <p style="text-align:center; font-size: 14px;">
            Asal Provinsi: <strong><?= $data['province_name']; ?></strong>
            </p>
        <div class="image-box">
            <?php if (!empty($data['image'])): ?>
                <img src="foods/images/<?= $data['image']; ?>" alt="<?= $data['name']; ?>">
            <?php else: ?>
                <img src="no-image.png" alt="No Image">
            <?php endif; ?>
        </div>
        <div class="section">
            <h3>Deskripsi</h3>
            <p><?= nl2br($data['description']); ?></p>
        </div>
        <div class="section">
            <h3>Bahan-bahan</h3>
            <p><?= nl2br($data['ingredients']); ?></p>
        </div>
        <div class="section">
            <h3>Resep / Cara Memasak</h3>
            <p><?= nl2br($data['recipe']); ?></p>
        </div>
        <a href="javascript:history.back()" class="back">Kembali</a>
    </div>
<?php session_start(); ?>
<?php if (isset($_SESSION['user_id'])): ?>
    <form action="favorite_add.php" method="POST">
        <input type="hidden" name="food_id" value="<?= $data['id']; ?>">
        <button type="submit" style="padding:10px 20px; border:none; background:#ff3b3b; color:white; border-radius:6px; cursor:pointer;">
            Tambahkan ke Favorit
        </button>
    </form>
<?php else: ?>
    <p><a href="login.php">Login</a> untuk menambahkan ke favorit.</p>
<?php endif; ?>

</body>
</html>
