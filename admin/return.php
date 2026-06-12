<?php
require_once "../includes/db.php";

if (!isset($_GET['id'])) {
    die("ID sewa tidak ditemukan.");
}

$id = $_GET['id'];

// Ambil data penyewaan
$stmt = $pdo->prepare("SELECT * FROM rentals WHERE id = ?");
$stmt->execute([$id]);
$rental = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$rental) {
    die("Data sewa tidak ditemukan.");
}

$now = date("Y-m-d H:i:s");
$deadline = $rental['end_time'];

$fine_per_day = 10000; // denda per hari

// Hitung keterlambatan
$telat = 0;
$denda = 0;

if ($now > $deadline) {
    $deadline_time = strtotime($deadline);
    $return_time = strtotime($now);
    $telat = ceil(($return_time - $deadline_time) / 86400); // hitung hari
    $denda = $telat * $fine_per_day;
}

// Update status
$update = $pdo->prepare("
    UPDATE rentals 
    SET return_time = ?, fine = ?, status = 'completed'
    WHERE id = ?
");
$update->execute([$now, $denda, $id]);

// Balikin stok PS
$pdo->prepare("
    UPDATE playstations 
    SET available_units = available_units + 1 
    WHERE id = ?
")->execute([$rental['playstation_id']]);

echo "<script>
alert('Sewa diselesaikan. Denda: Rp " . number_format($denda, 0, ',', '.') . "');
window.location='rentals.php';
</script>";
?>
