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
            $message = "Registrasi berhasil! Silakan login.";
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

        /* Background 3D gradient + pattern */
        background: linear-gradient(135deg, #b30000, #410000);
        background-size: cover;
        background-attachment: fixed;
        position: relative;
        overflow: hidden;
    }

    /* 3D floating circles */
    body::before, body::after {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        border-radius: 50%;
        filter: blur(90px);
        opacity: 0.5;
        z-index: 0;
        animation: float 6s infinite alternate ease-in-out;
    }
    body::before {
        background: #ff4d4d;
        top: 50px;
        left: 50px;
    }
    body::after {
        background: #800000;
        bottom: 50px;
        right: 50px;
    }

    @keyframes float {
        from { transform: translateY(0px); }
        to { transform: translateY(35px); }
    }

    /* Card blur (glassmorphism) */
    .card {
        width: 350px;
        padding: 35px;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(15px);
        border-radius: 18px;
        border: 1px solid rgba(255,255,255,0.25);
        box-shadow: 0 10px 35px rgba(0,0,0,0.25);
        color: white;
        position: relative;
        z-index: 2;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        margin-bottom: 20px;
        text-align: center;
        font-size: 26px;
        font-weight: 700;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0 18px;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.4);
        background: rgba(255,255,255,0.2);
        color: white;
        backdrop-filter: blur(5px);
        outline: none;
        font-size: 15px;
    }

    input::placeholder {
        color: #eeeeee;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #ff3333;
        border: none;
        border-radius: 10px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.25s ease;
    }

    button:hover {
        background: #cc0000;
        transform: translateY(-2px);
    }

    a {
        color: #ffdddd;
        text-decoration: none;
        display: block;
        margin-top: 15px;
        font-size: 14px;
        text-align: center;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Message */
    .alert {
        text-align: center;
        font-size: 14px;
        margin-bottom: 10px;
        background: rgba(255,255,255,0.2);
        padding: 8px;
        border-radius: 8px;
        border: 1px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(5px);
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
