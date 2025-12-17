<?php
session_start();
require 'config.php';

// pastikan ada id
if (!isset($_GET['id'])) {
    die("ID makanan tidak ditemukan.");
}

$food_id = intval($_GET['id']);

// Query detail makanan
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
    die("Data makanan tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title><?= $data['name']; ?> - Detail Makanan Khas</title>
    <link rel="icon" type="image/png" href="logo/logo KN.png">

    <style>
        body {
            font-family: 'roboto', sans-serif;
            margin: 0;
            padding: 40px 0;
            background: linear-gradient(135deg, #8a0000, #300000);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            color: white;
        }

        /* ===== CARD GLASS ===== */
        .container {
            width: 85%;
            max-width: 900px;
            background: rgba(255, 255, 255, 0.15);
            padding: 35px;
            border-radius: 25px;
            backdrop-filter: blur(35px);
            -webkit-backdrop-filter: blur(35px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
            animation: fadeIn 0.9s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .province {
            text-align: center;
            font-size: 14px;
            opacity: 0.9;
        }

        /* ===== IMAGE BOX ===== */
        .image-box {
            text-align: center;
            margin: 25px 0;
        }

        .image-box img {
            width: 370px;
            max-width: 90%;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
        }

        /* ===== DETAIL SECTION ===== */
        .section {
            margin: 20px 0;
        }

        .section h3 {
            margin-bottom: 10px;
            font-size: 20px;
            border-left: 4px solid #ffaaaa;
            padding-left: 10px;
        }

        .section p {
            font-size: 16px;
            line-height: 1.6;
            white-space: pre-line;
        }

        /*BUTTON GROUP*/
        .button-row {
            margin-top: 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Tombol */
        .btn {
            padding: 12px 22px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.35);
        }

        .btn-back:hover {
            background: rgba(6, 6, 6, 0.35);
        }

        .btn-fav {
            background: #ff0000ff;
            color: white;
            border: none;
        }

        .btn-fav:hover {
            background: #7e0c0cff;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width: 768px) {
            .container {
                padding: 25px;
                width: 90%;
            }

            .button-row {

                gap: 15px;
            }

            .btn {
                width: 100%;

            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1><?= $data['name']; ?></h1>

        <div class="image-box">
            <?php if (!empty($data['image'])): ?>
                <img src="foods/images/<?= $data['image']; ?>" alt="<?= $data['name']; ?>">
            <?php else: ?>
                <img src="no-image.png" alt="Tidak ada gambar">
            <?php endif; ?>
        </div>

        <p class="province">Asal Provinsi: <strong><?= $data['province_name']; ?></strong></p>
        <hr>
        <div class="section">
            <h3>Deskripsi</h3>
            <p><?= $data['description']; ?></p>
        </div>

        <div class="section">
            <h3>Bahan-bahan</h3>
            <p><?= $data['ingredients']; ?></p>
        </div>

        <div class="section">
            <h3>Resep / Cara Memasak</h3>
            <p><?= $data['recipe']; ?></p>
        </div>


        <div class="button-row">
            <a href="javascript:history.back()">
                <button class="btn btn-back">Kembali</button>
            </a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <form action="favorite_add.php" method="POST" style="margin:0;">
                    <input type="hidden" name="food_id" value="<?= $data['id']; ?>">
                    <button type="submit" class="btn btn-fav">Tambah Favorit</button>
                </form>
            <?php else: ?>
                <a href="login.php">
                    <button class="btn btn-fav">Login untuk Favorit</button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>