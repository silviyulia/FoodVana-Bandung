<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = htmlspecialchars($_POST['role']);

    $checkUser = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
        alert('Username sudah terdaftar! Silakan pilih username lain.');
        window.history.back();
        </script>";
    } else {
        $stmt = $koneksi->prepare("INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $role);

        if ($stmt->execute()) {
            echo "<script>
            alert('Registrasi berhasil! Silakan login.');
            window.location.href = 'login.php';
            </script>";
        } else {
            echo "<script>
            alert('Terjadi kesalahan, coba lagi nanti.');
            window.history.back();
            </script>";
        }
        $stmt->close();
    }
    $checkUser->close();
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Akun - FoodVana</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

  <!-- My CSS -->
  <link rel="stylesheet" href="style2.css">

  <!-- Inline Navbar CSS -->
  <style>
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

  <!-- Register Form -->
  <div class="register-container" id="registerContainer">
    <div class="register-form">
      <h2>Daftar Akun</h2>
      <form action="register.php" method="POST">
        <label for="register-username">Username</label>
        <input type="text" id="register-username" name="username" placeholder="Enter Username" required>

        <label for="register-email">Email</label>
        <input type="email" id="register-email" name="email" placeholder="Enter Email" required>

        <label for="register-password">Password</label>
        <input type="password" id="register-password" name="password" placeholder="Enter Password" required>

        <label for="register-role">Role</label>
        <select id="register-role" name="role" required>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>

        <button type="submit" id="register-submit">Daftar</button>
      </form>
      <p class="login">Sudah punya akun? <a href="login.php" id="showLogin">Login di sini</a></p>
    </div>
  </div>

  <script>
    feather.replace();
  </script>
</body>
</html>
