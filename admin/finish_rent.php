<?php
require_once "../includes/db.php";

if(!isset($_GET['id'])) {
    die("ID sewa tidak dikirim.");
}

$id = $_GET['id'];

// Ambil data penyewaan
$stmt = $pdo->prepare("SELECT * FROM rentals WHERE id = ?");
$stmt->execute([$id]);
$rental = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$rental) {
    die("ID sewa tidak ditemukan.");
}

if($rental['status'] !== 'active') {
    die("Sewa sudah selesai.");
}

// Hitung waktu selesai
$start = new DateTime($rental['start_time']);
$duration = (int)$rental['duration']; // hari
$end = clone $start;
$end->modify("+$duration days");

// Waktu saat ini
$now = new DateTime();

// Hitung denda jika keterlambatan (misal: 10% dari total per hari keterlambatan)
$late_days = max(0, $now->diff($end)->days);
$denda = 0;
if($now > $end) {
    $denda = ($rental['total_price'] / $duration) * 0.1 * $late_days;
}

// Update rental
$update = $pdo->prepare("UPDATE rentals SET status='completed', end_time=?, total_price=total_price+? WHERE id=?");
$update->execute([$now->format('Y-m-d H:i:s'), $denda, $id]);

// Kembalikan unit PS
$pdo->prepare("UPDATE playstations SET available_units = available_units + 1 WHERE id=?")->execute([$rental['playstation_id']]);

echo "<script>alert('Sewa selesai. Denda: Rp ".number_format($denda)."'); window.location='rentals.php';</script>";
exit;
