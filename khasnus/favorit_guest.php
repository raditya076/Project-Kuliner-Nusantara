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

        /* nav ul{
            margin-right: 15px;
        } */
        main {
            flex: 1;
            margin-top: 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            margin-bottom: 150px;
        }

        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 36px;
            margin-bottom: 35px;
        }

        .card-login {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(30px);
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.45);

            padding: 45px 35px;
            text-align: center;
        }

        .card-login h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            margin-bottom: 14px;
        }

        .card-login p {
            font-size: 15px;
            opacity: .9;
            line-height: 1.6;
            margin-bottom: 28px;
            font-family: 'Montserrat' sans-serif;
        }

        .btn-login {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 14px;
            font-weight: 800;
            text-decoration: none;
            background: wheat;
            color: #000;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.45);
            transition: .3s;
        }

        .btn-login:hover {
            transform: scale(1.06);
        }


        @media(max-width:576px) {
            main {
                margin-bottom: 165px;
            }
        }
    </style>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>
    <main>
        <h1>Favorit Saya</h1>

        <div class="card-login">
            <h3>Login terlebih dahulu</h3>
            <p>
                Silakan login untuk melihat dan menyimpan makanan favorit khas Nusantara.
            </p>
            <a href="login.php" class="btn-login">Login Sekarang</a>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
    <script>
        const menuToggle = document.querySelector('.menu-toggle input');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>

</body>

</html>