<?php
require_once "includes/db.php";

$ps = $pdo->query("SELECT * FROM playstations WHERE status='tersedia'")->fetchAll();
?>
<h2>Daftar PS Tersedia</h2>

<?php if (count($ps) == 0): ?>
    <p>Tidak ada PS yang tersedia.</p>
<?php else: ?>
    <ul>
        <?php foreach ($ps as $p): ?>
            <li>
                <?php echo $p['nama']; ?> 
                - <a href="form_sewa.php?id=<?php echo $p['id']; ?>">Sewa</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
