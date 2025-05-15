<?php
session_start();
 $error = '';
if (isset($_POST['num_rows'])) {
    $num_rows = (int)$_POST['num_rows'];
} else {
    $num_rows = 1;
}

if (isset($_POST['add_row'])) {
    $num_rows++;
}

if (isset($_POST['clear'])){
    unset($_SESSION['submissions']);
    $num_rows = 1;
}

if (isset($_POST['remove_row'])){
    $remove_index = (int)$_POST['remove_row'];
    $users = $_POST['users'] ?? [];
    unset($users[$remove_index]);
    $_POST['users'] = array_values($users);
    $num_rows = count($_POST['users']);
}

if (isset($_POST['submit'])) {
    for ($i = 0; $i < $num_rows; $i++) {
        $name = $_POST['users'][$i]['name'] ?? '';
        $hasFile = isset($_FILES['users']['tmp_name'][$i]['image']) && is_uploaded_file($_FILES['users']['tmp_name'][$i]['image']);

        if (!empty($name) && $hasFile) {
            $type = $_FILES['users']['type'][$i]['image'];
            if (!in_array($type, ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/webp'])) {
                $error = "Hanya file gambar yang diperbolehkan (jpg, jpeg, png, gif, webp).";
                continue;
            }
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) mkdir($upload_dir);

            $original_name = basename($_FILES['users']['name'][$i]['image']);
            $target_path = $upload_dir . uniqid() . "_" . $original_name;

            if (move_uploaded_file($_FILES['users']['tmp_name'][$i]['image'], $target_path)) {
                $_SESSION['submissions'][] = [
                    'name' => $name,
                    'image' => $target_path
                ];
            }
        }
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
  <h3>Form Dinamis: Nama & Gambar</h3>
  <input type="hidden" name="num_rows" value="<?= $num_rows ?>">

  <?php for ($i = 0; $i < $num_rows; $i++): ?>
    <div>
      <?php if(!empty($error)): ?>
        <b><p style="color: red;"><?= $error ?></p></b>
      <?php endif; ?>
      <label>Nama: <input type="text" name="users[<?= $i ?>][name]" required></label>
      <label>Gambar: <input type="file" name="users[<?= $i ?>][image]" accept="image/*" required></label>
      <?php if($num_rows > 1) {
        echo "<button type='submit' name='remove_row' value='$i' formnovalidate>Hapus</button>";
      }?>
    </div>
    <br>
  <?php endfor; ?>
  <br>
  <button type="submit" name="add_row" formnovalidate>Tambah input</button>
  <br>
  <br>
  <button type="submit" name="submit">Submit</button>
  <br>
  <br>
  <button type="submit" name="clear" formnovalidate>Reset data</button>
</form>

<a href="process.php">Lihat tabel data</a>
