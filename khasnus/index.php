<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Khas NUSANTARA</title>
    <link rel="icon" type="image/png" href="logo/logo KN.png">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            color: white;
            overflow-x: hidden;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            /* padding: 12px 30px; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* backdrop-filter: blur(10px);
            background: rgba(0, 0, 0, 0.25);
            border-bottom: 1px solid rgba(255, 255, 255, 0.25); */
            z-index: 1000;
        }

        header img {
            width: 160px;
        }

        nav {
            display: flex;
            gap: 35px;
            margin-right: 30px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 35px;
        }

        nav ul li {
            position: relative;
            font-family: 'open sans' sans-serif;
            font-size: 14px;
        }

        nav ul li:last-child a {
            color: black;
            font-weight: bold;
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 12px;
            background: wheat;
            box-shadow: 1px 1px 1px #000;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            position: relative;
        }

        nav a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 0%;
            height: 2px;
            background: #ffd700;
            transition: 0.4s;
        }

        nav a:hover::after {
            width: 100%;
        }

        nav ul li a.active {
            border-bottom: 2px solid #ffffff43;
        }

        .hero {
            position: relative;
            height: 100vh;
            background: url("logo/KHAS\ NUSANTARA\ \(2\).png") center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.36);
            backdrop-filter: blur(6px);
            top: 0;
            left: 0;
        }

        .content {
            position: relative;
            z-index: 2;
        }

        .content h1 {
            font-family: 'montserrat', sans-serif;
            font-size: 70px;
            font-weight: 900;
            margin-bottom: 0;
            margin-top: -30px;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .search-box {
            margin-top: -100px;
            display: flex;
            align-items: center;
            backdrop-filter: blur(35px);
            border-radius: 50px;
            padding: 9px 430px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 1px 2px 2px #00000072;
            justify-content: space-between;
        }

        .search-box input {
            flex: 1;
            /* background-color: #000; */
            padding: 6px;
            border: none;
            outline: none;
            margin-left: -400px;
            margin-right: 7px;
            background: transparent;
            font-size: 16px;
            color: #ffffff;
            padding-right: 540px;
        }

        input.search::placeholder {
            color: #ffffffa1;
            font-size: 14px;
        }

        .search-box button {
            background: #fff;
            border: none;
            color: #000000;
            font-weight: bold;
            padding: 8px 28px;
            border-radius: 25px;
            cursor: pointer;
            margin-left: -9px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            /* justify-content: center; */
            gap: 8px;
        }

        .btn-text {
            display: inline;
        }

        .btn-icon {
            display: none;
        }

        .search-box button:hover {
            background: wheat;
            color: #000;
        }

        /* hamburger menu */
        .menu-toggle {
            display: none;
            flex-direction: column;
            height: 20px;
            justify-content: space-between;
            position: relative;
        }

        .menu-toggle input {
            position: absolute;
            width: 40px;
            height: 28px;
            left: -5px;
            top: -3px;
            cursor: pointer;
            opacity: 0;
            z-index: 1;
        }

        .menu-toggle span {
            display: block;
            width: 28px;
            height: 3px;
            background-color: #ffffffff;
            border-radius: 3px;
            transition: all 0.4s;
        }

        .menu-toggle span:nth-child(2) {
            transform-origin: 0 0;
        }

        .menu-toggle span:nth-child(4) {
            transform-origin: 0 100%;
        }

        .menu-toggle input:checked~span:nth-child(2) {
            transform: rotate(45deg) translate(-2px, 1px);
        }

        .menu-toggle input:checked~span:nth-child(4) {
            transform: rotate(-45deg) translate(-2px, 0);
        }

        .menu-toggle input:checked~span:nth-child(3) {
            transform: scale(0);
            opacity: 0;
        }

        /* hp */
        @media (max-width: 576px) {
            header img {
                width: 150px;
                margin-left: -10px;
                margin-top: -10px;
            }

            .menu-toggle {
                margin-left: 0px;
                display: flex;
                margin-top: 0px;
                margin-bottom: 4px;
            }

            nav ul {
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

            nav ul li a {
                font-size: 16px;
                font-weight: 900;
                margin-bottom: 40px;
            }

            nav ul.slide {
                transform: translateX(0);
            }

            nav ul li:last-child a {
                color: black;
                font-weight: bold;
                /* background-color: #fff; */
                padding: 2px 50px;
                width: 150px;
                padding-bottom: 4px;
                border-radius: 3px;
                font-size: 12px;
                background: wheat;
                box-shadow: 2px 2px 2px 1px #000000ff;
                margin-top: 180px;
                text-align: center;
            }

            nav ul li:last-child a:hover {
                background: transparent;
                color: #ffffffff;
            }

            .content h1 {
                font-size: 39px;
                margin-top: -70px;
            }

            .search-box {
                gap: 10px;
                border-radius: 25px;
                padding: 5px;
            }

            .search-box button {
                width: 30px;
                height: 30px;
                padding: 0;
                border-radius: 50%;
                margin-right: 5px;
                margin-left: 0;
            }

            .search-box input {
                padding: 5px;
                margin-left: 5px;
                text-align: start;
            }

            .btn-text {
                display: none;
            }

            .btn-icon {
                display: inline-flex;
                margin-left: 5px;
                width: 20px;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php"><img src="logo/logo KN.png" alt=""></a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Beranda</a></li>
                <li><a href="provinsi.php">Daftar Provinsi</a></li>
                <li><a href="favorit.php">Favorit</a></li>
                <li><a href="tentang.php">Tentang</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Log out</a></li>
                <?php else: ?>
                    <li><a href="login.php">Log in</a></li>
                <?php endif; ?>
            </ul>

            <div class="menu-toggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
    <section class="hero">
        <div class="overlay"></div>
        <div class="content">
            <h1>Khas Nusantara</h1>
            <!-- Form pencarian nyata yang terhubung ke database -->
            <form action="result.php" method="GET">
                <div class="search-box">
                    <input type="text" class="search" name="keyword" placeholder="Cari makanan / provinsi..." required>
                    <button type="submit">
                        <span class="btn-text">Cari</span>
                        <span class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M440-160v-487L216-423l-56-57 320-320 
                                        320 320-56 57-224-224v487h-80Z" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>
<script>
    const menutoggle = document.querySelector('.menu-toggle input');
    const nav = document.querySelector('nav ul');

    menutoggle.addEventListener('click', function() {
        nav.classList.toggle('slide');
    });
</script>

</html>