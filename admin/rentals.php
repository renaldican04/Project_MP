<?php
require_once "../includes/db.php";

// Ambil semua penyewaan beserta nama PS
$sql = "
SELECT r.id, r.user_name, r.duration, r.start_time, r.end_time, r.total_price, r.status, p.name AS ps_name
FROM rentals r
JOIN playstations p ON r.playstation_id = p.id
ORDER BY r.id DESC
";
$rentals = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penyewaan PlayStation</title>
</head>
<body>
<h2>Data Penyewaan PlayStation</h2>
<table border="1" cellpadding="8" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Nama Penyewa</th>
    <th>PS</th>
    <th>Durasi</th>
    <th>Mulai</th>
    <th>Selesai</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
<?php foreach($rentals as $r): ?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?= htmlspecialchars($r['user_name']) ?></td>
    <td><?= htmlspecialchars($r['ps_name']) ?></td>
    <td><?= $r['duration'] ?> Hari</td>
    <td><?= $r['start_time'] ?></td>
    <td><?= $r['end_time'] ?></td>
    <td>Rp <?= number_format($r['total_price']) ?></td>
    <td><?= $r['status'] ?></td>
    <td>
        <?php if($r['status'] === 'active'): ?>
            <a href="finish_rent.php?id=<?= $r['id'] ?>">Selesaikan Sewa</a>
        <?php else: ?>
            Selesai
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
