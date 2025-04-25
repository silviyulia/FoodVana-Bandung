<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak Kami - FoodVana Bandung</title>
  <link rel="stylesheet" href="style4.css">
</head>
<body>

<header class="header">
<div class="logo">
  <img src="img/logo fvb.png" alt="Logo FoodVana" class="circle-logo-img">
  <strong>FoodVana Bandung</strong>
</div>

  <nav class="nav">
    <a href="#">Home</a>
    <a href="#">Menu</a>
    <a href="#">Kontak Kami</a>
    <a href="#">Login</a>
    <input type="text" placeholder="Search in site">
  </nav>
</header>

<main class="contact-section">
  <h2>Kontak Kami</h2>
  <div class="contact-container">
    <form class="contact-form" method="POST" action="">
      <label>Nama :</label>
      <input type="text" name="nama" placeholder="Masukkan nama..." required>

      <label>Email :</label>
      <input type="email" name="email" placeholder="Masukkan email..." required>

      <label>Kirim pesan :</label>
      <textarea name="pesan" placeholder="Ketikkan pesan..." required></textarea>

      <button type="submit" name="submit">Kirim</button>
    </form>

   
  <?php
  if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    echo "<div class='response-box'>
            <h3>Terima kasih, $nama!</h3>
            <p>Pesanmu telah diterima:</p>
            <blockquote>$pesan</blockquote>
          </div>";
  }
  ?>
</main>

<!-- Footer Contact -->
<div class="footer-contact">
  <div>
    <strong>Contact Us:</strong><br/>
    FoodVana@example.com<br/>
    <s>Phone: +62-739-469696 Ext.1017</s>
  </div>
  <div>
    <strong>Instagram:</strong> FoodVana_Bandung<br/>
    <strong>Facebook:</strong> FoodVana Bandung
  </div>
</div>

</body>
</html>
