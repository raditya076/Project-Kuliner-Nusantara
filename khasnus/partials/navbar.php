<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        color: white;
        background: linear-gradient(135deg, #8a0000, #3a0000, #8a0000);
        background-size: 300% 300%;
        animation: bgMove 12s ease infinite;
        padding-top: 90px;
    }

    @keyframes bgMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
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

        background: transparent;
        backdrop-filter: none;
        border-bottom: none;

        z-index: 1000;
        transition: all 0.4s ease;
    }

    header.scrolled {
        background: rgba(0, 0, 0, 0.25);
        backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.25);
    }

    header img {
        width: 160px;
    }

    nav {
        display: flex;
        gap: 35px;
    }

    nav ul {
        list-style: none;
        display: flex;
        gap: 35px;
        margin-right: 15px;
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

    /*= MOBILE =*/
    @media (max-width: 576px) {
        header img {
            width: 150px;
        }

        .menu-toggle {
            display: flex;
            z-index: 1;
            margin-right: 15px;
        }

        nav ul {
            margin-right: 0;
            position: fixed;
            top: 89px;
            right: 0;
            height: 100vh;
            width: 60%;

            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 40px;

            background: rgba(0, 0, 0, 0.57);
            border: 1px solid rgba(255, 255, 255, .30);
            backdrop-filter: blur(30px);
            box-shadow: 0 10px 28px rgba(0, 0, 0, .35);

            transform: translateX(100%);
            transition: .5s;
            z-index: 999;
        }

        nav ul.slide {
            transform: translateX(0);
        }

        nav ul li a {
            font-size: 16px;
            font-weight: 900;
            margin-bottom: 40px;
        }

        nav ul li:last-child a {
            padding: 2px 50px;
            margin-top: 150px;
            background: wheat;
            box-shadow: 2px 2px 2px #000;
        }
    }
</style>

<header>
    <a href="index.php">
        <img src="logo/logokhasnus.png" alt="logo">
    </a>
    <nav>
        <ul>
            <li><a href="index.php" class="active1">Beranda</a></li>
            <li><a href="provinsi.php" class="active2">Daftar Provinsi</a></li>
            <li><a href="favorit.php" class="active3">Favorit</a></li>
            <li><a href="tentang.php" class="active4">Tentang</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">Log out</a></li>
            <?php else: ?>
                <li><a href="login.php">Log in</a></li>
            <?php endif; ?>
        </ul>

        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>

<script>
    const menutoggle = document.querySelector('.menu-toggle input');
    const nav = document.querySelector('nav ul');

    menutoggle.addEventListener('click', function() {
        nav.classList.toggle('slide');
    });
</script>