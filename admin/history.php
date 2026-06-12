<?php
require_once "../includes/db.php";

$sql = "
    SELECT r.id, r.user_name, p.name AS ps_name,
           r.duration, r.start_time, r.end_time,
           r.return_time, r.total_price, r.fine, r.status
    FROM rentals r
    LEFT JOIN playstations p ON r.playstation_id = p.id
    WHERE r.status = 'completed'
    ORDER BY r.id DESC
";

$stmt = $pdo->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Penyewaan</title>
</head>
<body>

<h2>Riwayat Penyewaan PlayStation</h2>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Penyewa</th>
    <th>PS</th>
    <th>Durasi</th>
    <th>Mulai</th>
    <th>Batas Selesai</th>
    <th>Dikembalikan</th>
    <th>Total</th>
    <th>Denda</th>
    <th>Status</th>
</tr>

<?php while ($r = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?= $r['user_name'] ?></td>
    <td><?= $r['ps_name'] ?></td>
    <td><?= $r['duration'] ?> Hari</td>
    <td><?= $r['start_time'] ?></td>
    <td><?= $r['end_time'] ?></td>
    <td><?= $r['return_time'] ?></td>
    <td>Rp <?= number_format($r['total_price'], 0, ',', '.') ?></td>
    <td>Rp <?= number_format($r['fine'], 0, ',', '.') ?></td>
    <td><?= $r['status'] ?></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
