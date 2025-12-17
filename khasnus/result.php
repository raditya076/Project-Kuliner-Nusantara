<?php
require 'config.php';
session_start();
// jika user belum input keyword
if (!isset($_GET['keyword']) || empty($_GET['keyword'])) {
    die("Keyword tidak boleh kosong!");
}

// hapus spasinya user
$keyword = trim($_GET['keyword']);
$keyword = preg_replace('/\s+/', ' ', $keyword);
$keyword = mysqli_real_escape_string($conn, $keyword);

// Query: cari berdasarkan nama provinsi ATAU nama makanan
$sql = "
    SELECT foods.*, provinces.name AS province_name 
    FROM foods
    INNER JOIN provinces ON foods.province_id = provinces.id
    WHERE provinces.name LIKE '%$keyword%'
        OR provinces.alternate_name LIKE '%$keyword%'
        OR foods.name LIKE '%$keyword%'
        OR foods.ingredients LIKE '%$keyword%'
";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="logo/logo KN.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        .result-header {
            margin: 40px auto 30px;
            padding: 0 20px;
            display: flex;
            gap: 5px;
        }

        .result-header h2 {
            font-size: 14px;
            font-weight: 800;

            padding: 8px 14px;
            border-radius: 20px;
            background: rgba(113, 3, 3, 0.35);
            border: 1px solid rgba(255, 255, 255, .3);
            backdrop-filter: blur(10px);

        }

        .btn-back {
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            text-decoration: none;
            font-size: 14px;
            padding: 8px 14px;
            border-radius: 20px;
            background: rgba(169, 24, 24, 0.5);
            border: 1px solid rgba(255, 255, 255, .3);
            backdrop-filter: blur(10px);
            transition: .3s;
        }

        .btn-back:hover {
            background: rgba(255, 0, 0, 1);
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.35);
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(4, minmax(260px, 3fr));
            gap: 30px;
            padding: 20px 15px;
        }

        .card {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.35);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            display: flex;
            flex-direction: column;
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .card h3 {
            text-align: center;
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #ffefe1ff;
        }

        .card small {
            display: block;
            margin-top: 6px;
            font-size: 14px;
            color: wheat;
        }

        .card p {
            margin: 10px 0;
            font-size: 14px;
            color: wheat;
            /* flex-grow: 1; */
        }

        .card a {
            backdrop-filter: blur;
            padding: 5px;
            border-radius: 10px;
            text-align: center;
            background-color: #ff0000ff;
            margin-top: auto;
            text-decoration: none;
            color: #000000ff;
            font-weight: bold;
        }

        .card a:hover {
            background-color: #4a0000;
            color: white;
            box-shadow: 2px 2px 30px rgba(255, 0, 0, 1);
        }

        .no-data {
            font-size: 18px;
            font-weight: bold;
            color: red;
            text-align: center;
            margin-top: 50px;
        }

        main {
            margin-bottom: 5px;
        }

        @media (max-width: 576px) {
            main {
                margin-bottom: 230px;
            }

            .result-header {
                margin-bottom: 10px;
            }

            .result-header h2 {
                margin-top: 10px;
            }

            .result-header .btn-back {
                margin-top: 10px;
                margin-left: 5px;

            }

            .cards-container {
                margin-top: 10px;
                grid-template-columns: 1fr;
                padding: 0 50px;
            }

            .card img {
                height: 150px;
            }

            .card img {
                height: 140px;
            }

            .card h3 {
                font-size: 18px;
            }

            .card small {
                font-size: 12px;
            }

            .card p {
                font-size: 12px;
            }

            .card a {
                font-size: 13px;
            }
        }
    </style>

</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <main>
        <div class="result-header">
            <a href="javascript:history.back()" class="btn-back">
                ← Kembali
            </a>
            <h2><svg xmlns="http://www.w3.org/2000/svg" height="12px" viewBox="0 -960 960 960" width="25px" fill="#ffffffff">
                    <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>Hasil Pencarian "<b><?= $keyword ?></b>"</h2>
        </div>

        <div class="cards-container">
            <?php if (mysqli_num_rows($result) === 0): ?>
                <p class="no-data">Tidak ada data ditemukan!</p>
            <?php else: ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="card">
                        <img src="foods/images/<?= $row['image'] ? $row['image'] : 'no-image.png' ?>" alt="">
                        <h3><?= $row['name'] ?></h3>
                        <br>
                        <small><b>Provinsi:</b> <?= $row['province_name'] ?></small>
                        <p><?= substr($row['description'], 0, 80) ?>...</p>
                        <br>
                        <a href="detail.php?id=<?= $row['id'] ?>">Lihat Detail</a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>
<script>
    const menutoggle = document.querySelector('.menu-toggle input');
    const nav = document.querySelector('nav ul');

    menutoggle.addEventListener('click', function() {
        nav.classList.toggle('slide');
    });
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