<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Username atau password tidak boleh kosong.";
    } else {
        $username = mysqli_real_escape_string($koneksi, $username);
        $password = mysqli_real_escape_string($koneksi, $password);

        $query = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($koneksi, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                if ($row['role'] == 'admin') {
                    header("Location: ./dashboard/dashboard.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Username tidak ditemukan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FoodVana Bandung</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style1.css">

    <!-- Custom Inline Style untuk Navbar -->
    <style>
        
        /* Navbar Style */
        login-form input[type="text"],
.login-form input[type="password"] {
    background-color: #ffffff;
    color: #000;
}



        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 100;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 1.2rem;
            color: #000;
        }

        .navbar .logo .circle {
            width: 20px;
            height: 20px;
            background-color: #aaa;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar .menu a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-size: 0.95rem;
        }

        .navbar .menu a:hover {
            color: #0099ff;
        }

        .navbar .search-container {
            position: relative;
        }

        .navbar .search-container input {
            padding: 6px 30px 6px 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
            font-size: 0.9rem;
        }

        .navbar .search-container i {
            position: absolute;
            right: 10px;
            top: 7px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <div class="circle"></div>
            FoodVana Bandung
        </div>
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="kontak.php">Kontak Kami</a>
            <a href="login.php">Login</a>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search in site">
            <i data-feather="search"></i>
        </div>
    </div>

    <!-- Tombol Back to Home -->
    <a href="index.php" class="back-to-home">
        <i class="fa fa-home"></i> Back to Home
    </a>

    <!-- Login Container -->
    <div class="login-container" id="Login">
        <div class="login-form">
            <h2>Login</h2>
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>

                <button type="submit">Login</button>
            </form>

            <p class="register">Belum punya akun? <a href="register.php" id="showRegister">Daftar di sini</a></p>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
