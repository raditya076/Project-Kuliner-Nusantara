<?php
require 'config.php';

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $message = "Username atau Email sudah digunakan!";
    } else {
        $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit;
        } else {
            $message = "Gagal mendaftar.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="icon" type="image/png" href="logo/logo KN.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #651010ff, #ff0d00ff, #8b1111ff);
            background-size: 300% 300%;
            animation: gradientMove 10s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* ANIMASI GRADIENT 3D */
        @keyframes gradientMove {
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

        /* EFEK CARD GLASSMORPHISM */
        .card {
            width: 380px;
            padding: 35px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;

            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 1s forwards;
        }

        /* ANIMASI CARD MASUK */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #fff;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .alert {
            color: white;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            letter-spacing: .3px;
            backdrop-filter: blur(4px);
            transition: 0.3s;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input:focus {
            background: rgba(255, 255, 255, 0.35);
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
        }

        button {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            margin-top: 10px;
            cursor: pointer;
            background: #d61515ff;
            color: #ffffffff;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background: #cc0000;
            transform: translateY(-2px);
        }

        a {
            margin-top: 15px;
            display: block;
            color: #fff;
            font-size: 14px;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Daftar Akun</h2>

        <?php if ($message) : ?>
            <div class="alert"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Daftar</button>
        </form>

        <a href="login.php">Sudah punya akun? Login</a>
    </div>

</body>

</html>