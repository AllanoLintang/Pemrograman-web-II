<?php
session_start();
?>

<h2>Data yang disimpan</h2>

<?php if (!empty($_SESSION['submissions'])): ?>
  <table border="1" cellpadding="8" cellspacing="0">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Gambar</th>
      </tr>
      <?php foreach ($_SESSION['submissions'] as $i => $entry): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= htmlspecialchars($entry['name']) ?></td>
          <td>
            <img src="<?= htmlspecialchars($entry['image']) ?>" style="max-height: 100px;">
          </td>
        </tr>
      <?php endforeach; ?>
  </table>
<?php else: ?>
  <p>Belum ada data.</p>
<?php endif; ?>

<a href="index.php">Kembali ke form</a>