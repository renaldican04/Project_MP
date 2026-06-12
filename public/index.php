<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penyewaan PlayStation</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #0e0e0e;
            color: #e3e3e3;
        }

        /* Header */
        header {
            background: #000;
            color: #D4AF37;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #D4AF37;
            box-shadow: 0 2px 10px rgba(212,175,55,0.2);
        }
        header h2 {
            margin: 0;
            font-size: 26px;
            letter-spacing: 1px;
        }
        nav a {
            color: #D4AF37;
            margin-left: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        nav a:hover {
            color: white;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(
                        rgba(0,0,0,0.6),
                        rgba(0,0,0,0.8)
                     ),
                     url('https://i.imgur.com/2M7ZP6W.jpeg') center/cover no-repeat;
            padding: 150px 30px;
            text-align: center;
            color: #D4AF37;
        }
        .hero h1 {
            font-size: 52px;
            margin-bottom: 10px;
            text-shadow: 0 0 10px rgba(212,175,55,0.5);
        }
        .hero p {
            font-size: 20px;
            color: #f0f0f0;
        }
        .hero a {
            margin-top: 25px;
            display: inline-block;
            background: #D4AF37;
            padding: 14px 32px;
            border-radius: 8px;
            color: black;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 0 15px rgba(212,175,55,0.6);
        }
        .hero a:hover {
            background: #fff;
            color: #000;
            box-shadow: 0 0 25px rgba(255,255,255,0.7);
        }

        /* Cards */
        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 50px auto;
            max-width: 1200px;
        }
        .card {
            background: #1a1a1a;
            width: 280px;
            margin: 15px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #2a2a2a;
            transition: 0.3s;
            box-shadow: 0 0 12px rgba(0,0,0,0.4);
        }
        .card:hover {
            transform: translateY(-7px);
            box-shadow: 0 0 25px rgba(212,175,55,0.4);
        }
        .card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }
        .card .info {
            padding: 15px;
        }
        .card .info h3 {
            color: #D4AF37;
            margin: 0;
        }

        /* Footer */
        footer {
            background: #000;
            color: #D4AF37;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            border-top: 2px solid #D4AF37;
        }
    </style>
</head>
<body>

<header>
    <h2>PS Rental Alvaro</h2>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="check.php">Cek PS</a>
        <a href="../admin/login.php">Admin</a>
    </nav>
</header>

<div class="hero">
    <h1>Sewa PlayStation</h1>
    <p>Tersedia PS3, PS4, hingga PS5.</p>
    <a href="check.php">Mulai Sewa</a>
</div>

<section class="card-container">
    <div class="card">
        <img src="https://i.imgur.com/k5R4v8k.jpeg" alt="">
        <div class="info">
            <h3>PlayStation 3</h3>
            <p>Harga mulai Rp 40.000/hari</p>
        </div>
    </div>

    <div class="card">
        <img src="https://i.imgur.com/DPs34Kl.jpeg" alt="">
        <div class="info">
            <h3>PlayStation 4</h3>
            <p>Harga mulai Rp 100.000/hari</p>
        </div>
    </div>

    <div class="card">
        <img src="https://i.imgur.com/gH0vG4a.jpeg" alt="">
        <div class="info">
            <h3>PlayStation 5</h3>
            <p>Harga mulai Rp 250.000/hari</p>
        </div>
    </div>
</section>

<footer>
    &copy; 2025 PS Rental Alvaro - Penyewaan Premium Terpercaya
</footer>

</body>
</html>
