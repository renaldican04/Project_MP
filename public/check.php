<?php
require_once "../includes/db.php";

// Ambil semua data PS
$stmt = $pdo->query("SELECT * FROM playstations");
$playstations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Ketersediaan PS</title>
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

        h2 {
            text-align: center;
            margin-top: 40px;
            color: #D4AF37;
            text-shadow: 0 0 10px rgba(212,175,55,0.4);
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #1a1a1a;
            box-shadow: 0 0 20px rgba(212,175,55,0.25);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }

        th {
            background: #000;
            color: #D4AF37;
            border-bottom: 2px solid #D4AF37;
        }

        tr:nth-child(even) { background: #151515; }

        .green { color: #4CAF50; font-weight: bold; }
        .red { color: #ff4040; font-weight: bold; }

        .btn {
            padding: 10px 22px;
            background: #D4AF37;
            color: black;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(212,175,55,0.4);
        }
        .btn:hover {
            background: white;
            box-shadow: 0 0 20px rgba(255,255,255,0.5);
        }
        .btn.disabled {
            background: #444;
            color: #999;
            cursor: not-allowed;
            box-shadow: none;
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

<h2>Daftar PlayStation</h2>

<table>
    <tr>
        <th>Nama PS</th>
        <th>Ketersediaan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($playstations as $ps): ?>
    <?php 
        $available = $ps['available_units']; 
        $total = $ps['total_units'];
        $status = ($available > 0) ? "Tersedia" : "Penuh";
    ?>
    <tr>
        <td><?= htmlspecialchars($ps['name']) ?></td>
        
        <td>
            <span class="green"><?= $available ?></span> / <?= $total ?> unit
        </td>

        <td>
            <?= $available > 0 ? '<span class="green">Tersedia</span>' : '<span class="red">Tidak Tersedia</span>' ?>
        </td>

        <td>
            <?php if ($available > 0): ?>
                <a href="rent.php?id=<?= $ps['id'] ?>" class="btn">Sewa</a>
            <?php else: ?>
                <span class="btn disabled">Penuh</span>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<footer>
    &copy; 2025 PS Rental Alvaro - Sistem Penyewaan Premium
</footer>

</body>
</html>
