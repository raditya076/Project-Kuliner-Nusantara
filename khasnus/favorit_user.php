<?php
require 'config.php';

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

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Favorit Saya - Khas Nusantara</title>
    <link rel="icon" type="image/png" href="logo/logo KN.png">

    <style>
        nav ul li a.active3 {
            border-bottom: 2px solid #ffffff43;
        }

        /*favorit*/
        h1 {
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 50px;
            margin-top: 30px;
            font-size: 36px;
        }

        main {
            margin-bottom: 360px;
        }

        .grid {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
            padding-bottom: 60px;
        }

        .card {
            backdrop-filter: blur(30px);
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.45);
            transition: .4s;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 45px rgba(150, 0, 0, .6);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 18px;
            text-align: center;
        }

        .card-body h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            margin: 5px;
            transition: .3s;
        }

        .btn-detail {
            background: rgba(255, 255, 255, .25);
            color: white;
            border: 1px solid rgba(255, 255, 255, .35);
        }

        .btn-remove {
            background: #ff3b3b;
            color: white;
        }

        /* MOBILE */
        @media(max-width:576px) {
            main {
                margin-bottom: 490px;
            }
        }
    </style>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <h1>Favorit Saya</h1>
    <main>
        <div class="grid">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="card">
                    <img src="foods/images/<?= $row['image'] ?: 'no-image.png'; ?>">
                    <div class="card-body">
                        <h3><?= htmlspecialchars($row['name']); ?></h3>
                        <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-detail">Detail</a>
                        <a href="favorite_delete.php?id=<?= $row['fav_id']; ?>" class="btn btn-remove">Hapus</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>
<script>
    const header = document.querySelector("header");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
</script>

</html>