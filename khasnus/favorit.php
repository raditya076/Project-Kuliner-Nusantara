<?php
session_start();
require 'config.php';
if (!isset($_SESSION['user_id'])) die("Login dulu!");

$user_id = $_SESSION['user_id'];
$sql = "SELECT foods.*, favorites.id AS fav_id
        FROM favorites
        JOIN foods ON favorites.food_id = foods.id
        WHERE favorites.user_id = $user_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Favorit Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        h2 { text-align:center; margin-bottom:30px; }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background:white;
            border-radius:15px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            overflow:hidden;
            transition: transform 0.2s;
        }
        .card:hover { transform: scale(1.05); }
        .card img { width:100%; height:180px; object-fit:cover; }
        .card-body { padding:15px; }
        .card-body h3 { margin:0 0 10px 0; }
        .card-body a {
            text-decoration:none;
            color:white;
            background:#007bff;
            padding:8px 12px;
            border-radius:6px;
            display:inline-block;
        }
        .card-body a:hover { background:#0056d6; }
        .remove { background:#ff3b3b !important; margin-left:5px;}
    </style>
</head>
<body>
    <h2>Favorit Saya</h2>
    <div class="grid">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="card">
            <img src="foods/images/<?= $row['image'] ? $row['image'] : 'no-image.png' ?>" alt="">
            <div class="card-body">
                <h3><?= $row['name']; ?></h3>
                <a href="detail.php?id=<?= $row['id']; ?>">Lihat Detail</a>
                <a class="remove" href="favorite_delete.php?id=<?= $row['fav_id']; ?>">Hapus</a>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</body>
</html>
