<?php
session_start();
require 'config.php';

$sql = "SELECT * FROM provinces ORDER BY name ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Provinsi - Khas Nusantara</title>
    <link rel="icon" type="image/png" href="logo/indo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        /* GRID 3 KOLOM */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            padding: 10px;
            margin-top: 30px;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        /* CARD */
        .card {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding-bottom: 20px;
            overflow: hidden;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.35);

            opacity: 0;
            transform: translateY(40px);
            animation: fadeUp 0.9s ease forwards;
        }

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Efek hover pada card */
        .card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 15px 35px rgba(150, 0, 0, 0.5);
            transition: 0.3s;
        }

        /* Delay tiap card agar terlihat satu-per-satu */
        .card:nth-child(1) {
            animation-delay: .1s;
        }

        .card:nth-child(2) {
            animation-delay: .2s;
        }

        .card:nth-child(3) {
            animation-delay: .3s;
        }

        .card:nth-child(4) {
            animation-delay: .4s;
        }

        .card:nth-child(5) {
            animation-delay: .5s;
        }

        .card:nth-child(6) {
            animation-delay: .6s;
        }

        .card:nth-child(7) {
            animation-delay: .7s;
        }

        .card:nth-child(8) {
            animation-delay: .8s;
        }

        .card:nth-child(9) {
            animation-delay: .9s;
        }

        /* IMAGE CARD */
        .card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-bottom: 2px solid rgba(255, 255, 255, 0.25);
            transition: 0.4s ease;
        }

        /* Zoom gambar saat hover card */
        .card:hover img {
            transform: scale(1.07);
        }

        /* Text */
        .card h3 {
            font-weight: 700;
            margin-top: 22px;
            margin-bottom: 15px;
            font-size: 20px;
            color: #ffe0e0ff;
            letter-spacing: .5px;
        }

        /* Button */
        .card a {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            background: #b30000;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            transition: .3s ease;
        }

        .card a:hover {
            background: #d60000;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <div class="grid">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>

            <div class="card">
                <img src="image/provinces/<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['name']); ?>">
                <h3><?= htmlspecialchars($row['name']); ?></h3>
                <div class="btn"><a href="result.php?keyword=<?= urlencode($row['name']); ?>">
                        Lihat Makanan Khas
                    </a></div>
            </div>
        <?php endwhile; ?>
    </div>
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