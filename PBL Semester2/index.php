<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FoodVana Bandung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      padding-top: 80px;
    }

    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: white;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 999;
    }

    .navbar-brand {
      font-weight: bold;
    }

    .welcome-section {
      padding: 60px 20px;
    }

    .welcome-text h1 {
      font-size: 2rem;
      font-weight: bold;
    }

    .food-image {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .footer-contact {
      border: 2px solid #007bff;
      padding: 20px;
      margin: 40px auto;
      width: 80%;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      font-size: 14px;
    }

    @media(max-width: 768px) {
      .footer-contact {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <div class="bg-warning rounded-circle me-2" style="width: 30px; height: 30px;"></div>
      FoodVana Bandung
    </a>
    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Lokasi</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
      </ul>
    </div>
    <form class="d-flex" role="search">
      <input class="form-control form-control-sm" type="search" placeholder="Search in site" />
    </form>
  </nav>

  <!-- Welcome Section -->
  <section class="welcome-section container">
    <div class="row align-items-center">
      <div class="col-md-6 welcome-text">
        <h1>Welcome to FoodVana Bandung</h1>
      </div>
      <div class="col-md-6 text-center">
        <img src="img/seblak.jpg" alt="Food Image" class="food-image"/>
      </div>
    </div>
  </section>

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

  <script>
    feather.replace();
  </script>
</body>
</html>
