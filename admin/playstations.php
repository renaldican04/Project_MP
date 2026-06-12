<?php
require "../includes/db.php";

// Tambah PS
if (isset($_POST['add'])) {
    $name  = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare("INSERT INTO playstations (name, status, price) VALUES (?, 'available', ?)");
    $stmt->execute([$name, $price]);
}

// Update Status (ketersediaan)
if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE playstations SET status=? WHERE id=?");
    $stmt->execute([$status, $id]);
}

// Hapus PS
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $pdo->prepare("DELETE FROM playstations WHERE id=?")->execute([$id]);
}

$ps = $pdo->query("SELECT * FROM playstations")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Kelola PlayStation</h2>

<h3>Tambah Unit PS</h3>
<form method="post">
    Nama PS : <input type="text" name="name" required>
    Harga/Hari : <input type="number" name="price" required>
    <button name="add">Tambah</button>
</form>

<hr>

<h3>Daftar Semua PS</h3>
<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Harga/Hari</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($ps as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['name'] ?></td>
        <td><?= $p['status'] ?></td>
        <td><?= $p['price'] ?></td>
        <td>
            <!-- Form Ganti Status -->
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <select name="status">
                    <option value="available" <?= $p['status']=='available'?'selected':'' ?>>Tersedia</option>
                    <option value="rented" <?= $p['status']=='rented'?'selected':'' ?>>Disewa</option>
                </select>
                <button name="update_status">Ubah</button>
            </form>

            <a href="?delete=<?= $p['id'] ?>" onclick="return confirm('Hapus unit ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
