<?php
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

<!-- FONT ROBOTO -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: "Roboto", sans-serif;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            background: linear-gradient(135deg, #4a0000, #6b0000, #450000);
            background-size: 300% 300%;
            animation: gradientMove 12s ease infinite;
            color: white;
            margin-top: 60px;
        }
        header {
            position: fixed;    
            top: 0;
            left: 0;
            width: 100%;
            padding: 12px 30px;
            display: flex;        
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            background: rgba(0,0,0,0.25);
            z-index: 1000;
            border-bottom: 1px solid rgba(255,255,255,0.25);
        }
        header h2 {
            margin: 0;
            padding: 0;
            font-size: 24px;
            opacity: 1;
            animation: none; /* hilangkan animasi awal */
        }
            nav {
                display: flex;
                justify-content: center;
                gap: 35px;
                margin-top: 7px;
            }
            nav ul {
                list-style: none;
                display: flex;
                justify-content: center;
                gap: 35px;
                margin-top: 7px;
            }
            nav ul li {
                position: relative;
                font-family: 'open sans' sans-serif;
                font-size: 15px;
            }
            nav ul li:last-child a {
                color: black;
                font-weight: bold;
                /* background-color: #fff; */
                padding:3px;
                padding-bottom: 4px;
                border-radius: 3px;
                font-size: 12px;
                background: yellow;
                box-shadow: 1px 1px 1px 1px #000000ff;
            }
            nav ul li:last-child a:hover {
                background: transparent;
                color: #ffffffff;
            }
            nav a {
                text-decoration: none;
                color: #fff;
                font-weight: 500;
                padding-bottom: 3px;
                position: relative;
                display: inline-block;
            }
            nav a::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: -3px;
                width: 0%;
                height: 2px;
                background-color: #ffd700;
                transition: width 0.4s ease;
            }
            nav a:hover::after {
                width: 100%;
            }
            nav ul li a.active {
                margin-top: 0px;
                border-bottom: 2px solid #ffffff43; 
                padding-bottom: 2px;
                font-weight: 400;          
                /* font-weight: 600; */
                /* text-shadow: 1px 1px 1px #ffd700; */
            }

        /* Animasi background gradient */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 32px;
            animation: fadeDown 1s ease forwards;
            opacity: 0;
        }

        @keyframes fadeDown {
            0% { opacity: 0; transform: translateY(-25px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* GRID 3 KOLOM */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            padding: 10px;
        }

        @media (max-width: 900px) {
            .grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 600px) {
            .grid { grid-template-columns: repeat(1, 1fr); }
        }

        /* CARD GLASS + MAROON */
        .card {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding-bottom: 20px;
            overflow: hidden;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 22px rgba(0,0,0,0.35);

            opacity: 0;
            transform: translateY(40px);
            animation: fadeUp 0.9s ease forwards;
        }

        /* Animasi muncul satu per satu */
        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Efek hover pada card */
        .card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 15px 35px rgba(150,0,0,0.5);
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
                    /* hamburger menu */
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

        /* hp */
        @media (max-width: 576px) {
            header h2{
                font-size: 15px;
                margin-top: 8px;
            }
            .menu-toggle{
                display: flex;
                margin-top: 1px;
                z-index: 1;
            }
            nav ul{
                position: absolute;
                backdrop-filter: blur(5px);
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
        }
    </style>
</head>
    <body>
        <header>
            <h2>Daftar Provinsi Indonesia</h2>
            <nav>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="provinsi.php" class="active">Daftar Provinsi</a></li>
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
            </nav>
        </header>
        <div class="grid">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                
            <div class="card">
                <img src="image/provinces/<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['name']); ?>">
                <h3><?= htmlspecialchars($row['name']); ?></h3>
                <div class="btn"><a href="result.php?keyword=<?= urlencode($row['name']); ?>">
                    Lihat Makanan Khas
                </a></div>
            </div>
            <?php endwhile; ?>
        </div>
    </body>
            <script>
            const menutoggle = document.querySelector('.menu-toggle input');
            const nav = document.querySelector('nav ul');

            menutoggle.addEventListener('click', function () {
                nav.classList.toggle('slide');
            });
        </script>
</html>
