<?php
require_once "../includes/db.php";

// Ambil semua data penyewaan
$stmt = $pdo->query("
    SELECT r.*, p.name AS ps_name 
    FROM rentals r 
    JOIN playstations p ON r.playstation_id = p.id 
    ORDER BY r.id DESC
");
$rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penyewaan</title>
    <style>
        body { font-family: Arial; background: #111; color: #eee; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td {
            padding: 10px;
            border: 1px solid #444;
            text-align: center;
        }
        th { background: #222; }
        h2 { color: gold; }
    </style>
</head>
<body>

<h2>Data Penyewaan PlayStation</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Penyewa</th>
        <th>PlayStation</th>
        <th>Durasi</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th>Total Harga</th>
        <th>Status</th>
    </tr>

    <?php foreach ($rentals as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['user_name']) ?></td>
            <td><?= htmlspecialchars($r['ps_name']) ?></td>
            <td><?= $r['duration'] ?> Hari</td>
            <td><?= $r['start_time'] ?></td>
            <td><?= $r['end_time'] ?></td>
            <td>Rp <?= number_format($r['total_price'], 0, ',', '.') ?></td>
            <td><?= $r['status'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
