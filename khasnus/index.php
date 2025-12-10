<?php
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Khas NUSANTARA</title>
        <link rel="icon" type="image/png" href="LOGO3.png">

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
                position: absolute;
                width: 100%;
                top: 0;
                left: 0;
                padding: 20px 0;
                text-align: center;
                z-index: 10;
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
            .hero {
                position: relative;
                height: 100vh;
                background: url("KHAS NUSANTARA (2).png") center/cover no-repeat;
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
                font-family: "Roboto", sans-serif;
                font-size: 55px;
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
                backdrop-filter: blur(10px);
                border-radius: 50px;
                padding: 9px 350px;
                max-width: 500px;
                margin: 0 auto;
                box-shadow: 1px 2px 2px #00000072;
            }
            .search-box input {
                flex: 1;
                /* background-color: #000; */
                padding: 6px;
                border: none;
                outline: none;
                margin-left: -310px;
                margin-right: 5px;
                background: transparent;
                font-size: 16px;
                color: #ffffff;
                padding-right: 370px;
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
                justify-content: center;
                gap: 8px;
            }
            .btn-text { 
                display: inline; 
            }
            .btn-icon { 
                display: none; 
            }
            .search-box button:hover {
                background: #ffcc00;
                color: #000;
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
            .menu-toggle{
                margin-left: 295px;
                display: flex;
                margin-top: 10px;
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
            .content h1 {
                font-size: 32px;
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
                text-align: center;
            }
            .btn-text { 
                display: none; 
            }
            .btn-icon { 
                display: inline-flex;
                width: 20px;
            }
        }
        
        </style>
    </head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php" class="active">Beranda</a></li>
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
                                        320 320-56 57-224-224v487h-80Z"/>
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

            menutoggle.addEventListener('click', function () {
                nav.classList.toggle('slide');
            });
        </script>
</html>
