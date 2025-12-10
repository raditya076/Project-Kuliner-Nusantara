<?php
session_start();
require 'config.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: index.php");
            exit;
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Khas Nusantara</title>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Roboto", sans-serif;
    }

    body {
        height: 100vh;
        background: linear-gradient(135deg, #6a00ff, #b000ff, #7200c4);
        background-size: 300% 300%;
        animation: gradientMove 10s ease infinite;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .card {
        width: 380px;
        padding: 35px;
        border-radius: 20px;
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        text-align: center;

        opacity: 0;
        transform: translateY(40px);
        animation: fadeInUp 1s forwards;
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    h2 {
        color: #fff;
        margin-bottom: 20px;
        font-weight: 700;
        letter-spacing: .5px;
    }

    .message {
        color: yellow;
        margin-bottom: 10px;
        font-size: 14px;
        font-weight: bold;
        backdrop-filter: blur(5px);
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: none;
        outline: none;
        font-size: 15px;
        background: rgba(255,255,255,0.2);
        color: #fff;
        letter-spacing: .3px;
        backdrop-filter: blur(4px);
        transition: 0.3s;
    }

    input::placeholder {
        color: rgba(255,255,255,0.7);
    }

    input:focus {
        background: rgba(255,255,255,0.35);
        box-shadow: 0 0 8px rgba(255,255,255,0.7);
    }

    button {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: none;
        margin-top: 10px;
        cursor: pointer;
        background: #ffffff;
        color: #6a00ff;
        font-size: 16px;
        font-weight: bold;
        transition: 0.3s;
    }

    button:hover {
        background: #ddd;
        letter-spacing: 1px;
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
    <h2>Login</h2>
    <?php if($message) echo "<p class='message'>$message</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>

        <button type="submit">Masuk</button>
    </form>

    <a href="register.php">Belum punya akun? Daftar</a>
</div>

</body>
</html>
