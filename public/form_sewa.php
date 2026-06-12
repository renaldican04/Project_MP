<?php
require_once "includes/db.php";

$id = $_GET['id'];
$ps = $pdo->prepare("SELECT * FROM playstations WHERE id=?");
$ps->execute([$id]);
$data = $ps->fetch();

if (!$data) {
    die("PS tidak ditemukan.");
}
?>

<h2>Sewa <?php echo $data['nama']; ?></h2>

<form method="post" action="proses_sewa.php">
    <input type="hidden" name="ps_id" value="<?php echo $data['id']; ?>">

    Nama Pelanggan:<br>
    <input type="text" name="nama_pelanggan" required><br><br>

    Jam Mulai:<br>
    <input type="datetime-local" name="jam_mulai" required><br><br>

    Jam Selesai:<br>
    <input type="datetime-local" name="jam_selesai" required><br><br>

    <button type="submit">Sewa Sekarang</button>
</form>
