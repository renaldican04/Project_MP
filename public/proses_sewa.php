<?php
require_once "includes/db.php";

$ps_id = $_POST['ps_id'];
$nama = $_POST['nama_pelanggan'];
$mulai = $_POST['jam_mulai'];
$selesai = $_POST['jam_selesai'];

$sql = $pdo->prepare("INSERT INTO rentals (ps_id, nama_pelanggan, jam_mulai, jam_selesai)
                      VALUES (?, ?, ?, ?)");
$sql->execute([$ps_id, $nama, $mulai, $selesai]);

// ubah status PS jadi disewa
$update = $pdo->prepare("UPDATE playstations SET status='disewa' WHERE id=?");
$update->execute([$ps_id]);

echo "<h3>Sewa berhasil!</h3>";
echo "<a href='sewa.php'>Kembali ke daftar PS</a>";
