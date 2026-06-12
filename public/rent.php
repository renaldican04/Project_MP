<?php
require_once "../includes/db.php";

if (!isset($_GET['id'])) {
    die("PS tidak ditemukan.");
}

$id = $_GET['id'];

// Ambil data PS
$stmt = $pdo->prepare("SELECT * FROM playstations WHERE id = ?");
$stmt->execute([$id]);
$ps = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$ps) {
    die("Data PS tidak ditemukan.");
}

// Jika stok habis
if ($ps['available_units'] <= 0) {
    die("PS ini sedang penuh / tidak tersedia.");
}

$harga = $ps['price']; // harga per hari

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $durasi = $_POST['durasi']; // dalam hari

    // Hitung total harga
    $total = $durasi * $harga;

    // Hitung waktu sewa
    $start_time = date("Y-m-d H:i:s");
    $end_time = date("Y-m-d H:i:s", strtotime("+$durasi days"));

    // Simpan penyewaan dengan waktu
    $insert = $pdo->prepare("
        INSERT INTO rentals (playstation_id, user_name, duration, start_time, end_time, total_price, status)
        VALUES (?, ?, ?, ?, ?, ?, 'active')
    ");
    $insert->execute([$id, $nama, $durasi, $start_time, $end_time, $total]);

    // Kurangi stok
    $pdo->prepare("UPDATE playstations SET available_units = available_units - 1 WHERE id = ?")
        ->execute([$id]);

    echo "<script>alert('Berhasil menyewa!'); window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sewa PlayStation</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #0e0e0e;
            color: #e3e3e3;
        }

        header {
            background: #000;
            color: #D4AF37;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #D4AF37;
        }
        header h2 { margin: 0; }
        nav a {
            color: #D4AF37;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        nav a:hover { color: white; }

        .container {
            width: 450px;
            margin: 40px auto;
            padding: 25px;
            background: #1a1a1a;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(212,175,55,0.25);
        }

        h2 {
            text-align: center;
            color: #D4AF37;
            text-shadow: 0 0 10px rgba(212,175,55,0.4);
        }

        label { font-weight: bold; }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: none;
        }

        .btn {
            padding: 12px;
            width: 100%;
            background: #D4AF37;
            color: black;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: white;
            box-shadow: 0 0 15px rgba(255,255,255,0.5);
        }

        footer {
            margin-top: 50px;
            background: #000;
            padding: 25px;
            color: #D4AF37;
            text-align: center;
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

<div class="container">
    <h2>Sewa PlayStation</h2>

    <p>Unit: <b><?= htmlspecialchars($ps['name']) ?></b></p>
    <p>Harga per hari: <b>Rp <?= number_format($ps['price']) ?></b></p>
    <p>Sisa unit tersedia: <b><?= $ps['available_units'] ?></b></p>

    <form method="POST">
        <label>Nama Penyewa:</label>
        <input type="text" name="nama" required>

        <label>Durasi Sewa (Hari):</label>
        <input type="number" name="durasi" min="1" required>

        <button class="btn">Mulai Sewa</button>
    </form>
</div>

<footer>
    &copy; 2025 PS Rental Alvaro - Sistem Penyewaan Premium
</footer>

</body>
</html>
