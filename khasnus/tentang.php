<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo/logo KN.png">
    <title>Tentang kita</title>

    <style>
        nav ul li a.active4 {
            border-bottom: 2px solid #ffffff43;
        }

        .card {
            width: 90%;
            max-width: 1000px;
            margin: 90px auto 60px auto;
            /* background: rgba(255, 255, 255, 0.09);
            border: 1px solid rgba(133, 1, 1, 0.3);
            backdrop-filter: blur(25px);
            box-shadow: 0 15px 35px rgba(255, 0, 0, 0.4);
            border-radius: 28px; */
            padding: 50px 60px;
            display: flex;
            gap: 35px;
            align-items: center;
            position: relative;
            z-index: 5;

            opacity: 0;
            transform: translateY(60px);
            transition: 1s ease;
        }

        .card.show {
            opacity: 1;
            transform: translateY(0);
        }

        .card img {
            width: 330px;
            border-radius: 14px;
            background-color: #3a0000;
        }

        .card-text p {
            font-family: 'Roboto', sans-serif;
            font-size: 16.5px;
            font-weight: 400;
            line-height: 1.85;
            text-align: justify;
            color: #ffebd4ff;
        }


        /*ABOUT SECTION */
        .about-section {
            width: 80%;
            max-width: 900px;
            margin: 0 auto 80px auto;
            /* background: rgba(255, 255, 255, 0.16);
            padding: 40px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, .25);
            backdrop-filter: blur(18px); */
            text-align: justify;
            position: relative;
            z-index: 5;

            opacity: 0;
            transform: translateY(60px);
            transition: 3s ease;
        }

        .about-section.show {
            opacity: 1;
            transform: translateY(0);
        }

        .about-section h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 30px;
            font-family: 'Montserrat', sans-serif;
        }

        .about-section {
            padding: 60px 20px;
            max-width: 1100px;
            margin: auto;
        }

        .about-section h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 40px;
        }



        /* tim */
        .team-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .team-row {
            display: flex;
            align-items: center;
            gap: 25px;
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 18px;
            padding: 25px;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .team-info h3 {
            font-size: 20px;
            margin-bottom: 6px;
        }

        .team-info p {
            font-size: 14px;
            margin: 3px 0;
            color: #ffe7d6;
        }

        .team-info .desc {
            margin-top: 8px;
            font-size: 14px;
            line-height: 1.6;
            color: #ffffff;
        }




        /* update */
        .team-left {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: wheat;
            /* background-color: rgba(0, 0, 0, 0.39); */
            border-radius: 20px;
            padding-top: 5px;
            padding-left: 7px;
            padding-right: 7px;
        }

        .team-left img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 16px;
            border: 3px solid rgba(255, 255, 255, 0.57);

        }

        .team-social {
            display: flex;
            gap: 12px;
            margin-top: 5px;
        }

        .team-social img {
            width: 22px;
            height: 22px;
            opacity: 0.8;
            transition: 0.2s;
        }

        .team-social img:hover {
            opacity: 1;
            transform: scale(1.1);
        }


        @media (max-width: 768px) {
            .team-row {
                flex-direction: column;
                text-align: center;
            }

            .team-row img {
                width: 100px;
                height: 100px;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 576px) {

            .card {
                flex-direction: column;
                text-align: center;
                margin-top: 30px;
            }

            .card img {
                width: 180px;
            }

            .card-text p {
                font-size: 14px;
            }

            .team-social img {
                width: 22px;
                height: 22px;
                opacity: 0.8;
                transition: 0.2s;
            }
        }
    </style>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <main>
        <div class="card fade">
            <img src="logo/logo KN.png" alt="Logo Khas Nusantara">
            <div class="card-text">
                <p><b style="font-size: 30px;">Khas Nusantara</b> merupakan sebuah platform berbasis web yang bertujuan untuk memperkenalkan kekayaan budaya Indonesia, khususnya kuliner dan kain batik khas dari seluruh provinsi di Indonesia.

                    Melalui Khas Nusantara, masyarakat lokal maupun wisatawan mancanegara dapat memperoleh informasi mengenai makanan khas daerah, mulai dari asal provinsi, bahan-bahan, hingga resep pengolahan yang dapat disesuaikan dengan selera masing-masing.

                    Platform ini diharapkan dapat menjadi sarana edukasi, pelestarian budaya, serta referensi kuliner bagi siapa pun yang ingin mengenal lebih dekat identitas budaya Indonesia.
                </p>
            </div>
        </div>
    </main>

    <section class="about-section fade">
        <h2>Tentang Kami</h2>

        <div class="team-list">


            <!-- 1 -->
            <div class="team-row">
                <div class="team-left">
                    <img src="tim/radit1.jpeg" alt="radit">
                    <div class="team-social">
                        <a href="https://www.instagram.com/fadlyyy_15/" target="_blank">
                            <img src="logo/ig..png" alt="IG">
                        </a>
                        <a href="https://github.com/raditya076" target="_blank">
                            <img src="logo/github.png" alt="GitHub">
                        </a>
                        <a href="https://www.linkedin.com/in/fadly-92024738a/" target="_blank">
                            <img src="logo/lkin.png" alt="LinkedIn">
                        </a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Nurfadly Raditya</h3>
                    <p><b>NIM:</b> 60200124076</p>
                    <p><b>Peran:</b> Project Manager / PM</p>
                    <p class="desc">
                        bertanggung jawab atas perencanaan, koordinasi, dan pengawasan seluruh tahapan pengembangan website Khas Nusantara, agar proyek berjalan sesuai tujuan, waktu, dan kualitas yang telah ditetapkan.
                    </p>
                </div>
            </div>


            <!-- 2 -->
            <div class="team-row">
                <div class="team-left">
                    <img src="tim/alisa.jpeg" alt="alisa">
                    <div class="team-social">
                        <a href="https://www.instagram.com/andialisarthy/" target="_blank">
                            <img src="logo/ig..png" alt="IG">
                        </a>
                        <a href="https://github.com/alisa" target="_blank">
                            <img src="logo/github.png" alt="GitHub">
                        </a>
                        <a href="https://www.linkedin.com/in/alisa-92024738a/" target="_blank">
                            <img src="logo/lkin.png" alt="LinkedIn">
                        </a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Andi Alisa Rianti </h3>
                    <p><b>NIM:</b> 60200124091</p>
                    <p><b>Peran:</b> UI/UX</p>
                    <p class="desc">
                        Bertanggung jawab atas desain antarmuka dan pengalaman pengguna agar website
                        mudah digunakan dan nyaman diakses.
                    </p>
                </div>
            </div>

            <!-- 3 -->
            <div class="team-row">
                <div class="team-left">
                    <img src="tim/dirham.jpeg" alt="Dirham">
                    <div class="team-social">
                        <a href="https://instagram.com/dirhamrhn" target="_blank">
                            <img src="logo/ig..png" alt="IG">
                        </a>
                        <a href="https://github.com/dirhamrhn" target="_blank">
                            <img src="logo/github.png" alt="GitHub">
                        </a>
                        <a href="https://www.linkedin.com/in/dirham-raihan-92024738a/" target="_blank">
                            <img src="logo/lkin.png" alt="LinkedIn">
                        </a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Dirham Raihan</h3>
                    <p><b>NIM:</b> 60200124045</p>
                    <p><b>Peran:</b> Frontend Dev / FE</p>
                    <p class="desc">
                        Bertanggung jawab dalam merancang dan mengimplementasikan tampilan antarmuka website.
                    </p>
                </div>
            </div>
            <!-- 4 -->
            <div class="team-row">
                <div class="team-left">
                    <img src="tim/" alt="kaizp">
                    <div class="team-social">
                        <a href="https://instagram.com/faiz" target="_blank">
                            <img src="logo/ig..png" alt="IG">
                        </a>
                        <a href="https://github.com/faiz" target="_blank">
                            <img src="logo/github.png" alt="GitHub">
                        </a>
                        <a href="https://www.linkedin.com/in/faiz-92024738a/" target="_blank">
                            <img src="logo/lkin.png" alt="LinkedIn">
                        </a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Andi Faiz Trinanda</h3>
                    <p><b>NIM:</b> 60200124062</p>
                    <p><b>Peran:</b>Riset Data</p>
                    <p class="desc">
                        Bertanggung jawab dalam melakukan pencarian, pengumpulan, dan verifikasi data untuk kebutuhan database.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <?php include 'partials/footer.php'; ?>

    <script>
        // fade animation
        const animated = document.querySelectorAll('.fade');

        function showOnScroll() {
            animated.forEach(el => {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("show");
                }
            });
        }
        window.addEventListener("scroll", showOnScroll);
        window.addEventListener("load", showOnScroll);


        const header = document.querySelector("header");
        window.addEventListener("scroll", function() {
            if (window.scrollY > 50) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    </script>

</body>

</html>