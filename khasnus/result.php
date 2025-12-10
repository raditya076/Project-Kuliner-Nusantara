<?php
require 'config.php';

// jika user belum input keyword
if (!isset($_GET['keyword']) || empty($_GET['keyword'])) {
    die("Keyword tidak boleh kosong!");
}

$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);

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
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        nav {
            background: #890303ff;
            display: flex;
            justify-content: center;
            box-shadow: 5px 3px 2px 2px rgba(185, 185, 185, 1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .bungkus {
            padding-left: 10px;
            max-width: 1100px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
        }

        .judul h3 {
            margin: 2px;
            padding: 0;
            font-weight: 900;
            font-size: 18px;
            color: #ffffffff;
            font-family: 'Roboto', sans-serif;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: #ffffffff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        nav ul li a:hover {
            background: #404040ff;
        }

        nav ul li:last-child a{
            color: white;
            background: transparent;
            box-shadow: 0px 1px 2px 1px #000000ff;
            border-radius: 6px;
            padding: 6px 14px;
            font-weight: 500;
        }

        nav ul li:last-child a:hover{
            background: #ffffffff;
            color: #000000ff;
        }

            .menu-toggle{
                display: none;
                flex-direction: column;
                height: 20px;
                justify-content:space-between;
                position: relative;
            }
            .menu-toggle input{
                position: absolute;
                width: 40px;
                height: 28px;
                left: -5px;
                top: -3px;
                cursor: pointer;
                opacity: 0;
                z-index: 1;
            }
            .menu-toggle span{
                display: block;
                width: 28px;
                height: 3px;
                background-color: #ffffffff;
                border-radius: 3px;
                transition: all 0.4s;
            }
            .menu-toggle span:nth-child(2){
                transform-origin: 0 0;
            }
            .menu-toggle span:nth-child(4){
                transform-origin: 0 100%;
            }
            .menu-toggle input:checked ~ span:nth-child(2){
                transform: rotate(45deg) translate(-2px, 1px);
            }
            .menu-toggle input:checked ~ span:nth-child(4){
                transform: rotate(-45deg) translate(-2px, 0);
            }
            .menu-toggle input:checked ~ span:nth-child(3){
                transform: scale(0);
                opacity: 0;
            }
        .back {
            font-size: 12px;
            background: #890303ff;
            color: #ffffffff;
            border: 2px solid #1f1f1f;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
            box-shadow: 2px 2px 0 #1f1f1f;
            margin-top: 20px;
            margin-left: 15px;
            font-family: 'Roboto', sans-serif;
        }
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            padding: 20px 15px;
        }
        .card {
            background: #ffffffff;
            border-radius: 14px;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }
        .card h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #222;
        }
        .card small {
            display: block;
            margin-top: 6px;
            font-size: 14px;
            color: #555;
        }
        .card p {
            margin: 10px 0;
            font-size: 14px;
            color: #444;
            flex-grow: 1;
        }
        .card a {
            margin-top: auto;
            text-decoration: none;
            color: #890303;
            font-weight: bold;
        }
        .card a:hover {
            text-decoration: underline;
        }
        main h2 {
            padding: 0 15px;
            font-size: 20px;
            text-align: center;
            color: #393939ff;
        }

        .no-data {
            font-size: 18px;
            font-weight: bold;
            color: red;
            text-align: center;
            margin-top: 50px;
        }
        @media (max-width: 576px) {
            .judul h3{
                font-size: 20px;
                margin-top: 7px;
                margin-bottom: 7px;
            }
            .menu-toggle{
                margin-left: 100px;
                display: flex;
                margin-top: 7px;
                margin-bottom: 7px;
            }
            nav ul{
                position: absolute;
                backdrop-filter: blur(10px);
                background: rgba(0, 0, 0, 0.17); 
                height: 100vh;
                width: 50%;
                margin-top: -2px;
                top: 0;
                flex-direction: column;
                align-items: center;
                right: 0;
                justify-content: flex-start;
                padding-top: 130px;
                z-index: -1;
                transform: translateX(100%);
                transition: all 0.7s;
            }
            nav ul li a{
                font-size: 16px;
                margin-bottom: 40px;
            }
            nav ul.slide{
                transform: translateX(0);
            }
            nav ul li:last-child a {
                color: black;
                font-weight: bold;
                /* background-color: #fff; */
                padding:3px;
                width: 150px;
                padding-bottom: 4px;
                border-radius: 3px;
                font-size: 12px;
                background: yellow;
                box-shadow: 2px 2px 2px 1px #000000ff;
                margin-top: 180px;
            }
            nav ul li:last-child a:hover {
                background: transparent;
                color: #ffffffff;
            }
            main h2{
                margin-top: 35px;
                margin-bottom: 10px;
            }
            .cards-container {
                grid-template-columns: 1fr;
                padding: 0 20px;   
            }
            .card img {
                height: 150px;
            }
        
            .card img {
                height: 140px;
            }
            .card h3 {
                font-size: 16px;
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
    <header>
        <nav>
            <div class="bungkus">
                <div class="judul">
                    <h3>KHAS NUSANTARA</h3>
                </div>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="provinsi.php">Daftar Provinsi</a></li>
                    <li><a href="favorit.php">Favorit</a></li>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
                <div class="menu-toggle">
                    <input type="checkbox"/>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>
<main>
    <a class="back" href="index.php">Kembali</a>
    <h2>Makanan Khas dari provinsi <i><b><?= $keyword ?></b></i></h2>

    <div class="cards-container">
    <?php if (mysqli_num_rows($result) === 0): ?>
        <p class="no-data">Tidak ada data ditemukan!</p>
    <?php else: ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <img src="foods/images/<?= $row['image'] ? $row['image'] : 'no-image.png' ?>" alt="">
                <h3><?= $row['name'] ?></h3>
                <small><b>Provinsi:</b> <?= $row['province_name'] ?></small>
                <p><?= substr($row['description'], 0, 80) ?>...</p>  
                <a href="detail.php?id=<?= $row['id'] ?>">Lihat Detail</a>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

</body>
        <script>
            const menutoggle = document.querySelector('.menu-toggle input');
            const nav = document.querySelector('nav ul');

            menutoggle.addEventListener('click', function () {
                nav.classList.toggle('slide');
            });
        </script>
</html>
