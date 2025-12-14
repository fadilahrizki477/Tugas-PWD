<?php
require_once 'Database.php';
require_once 'Menu.php';
require_once 'MenuManager.php';

$database = new Database();
$menuManager = new MenuManager($database);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaMenu = trim($_POST['nama_menu'] ?? '');
    $kategori = trim($_POST['kategori'] ?? '');
    $harga = trim($_POST['harga'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $stok = trim($_POST['stok'] ?? '');

    // Validasi
    if (empty($namaMenu)) {
        $errors[] = 'Nama menu harus diisi';
    }
    if (empty($kategori)) {
        $errors[] = 'Kategori harus dipilih';
    }
    if (empty($harga) || !is_numeric($harga) || $harga < 0) {
        $errors[] = 'Harga harus berupa angka positif';
    }
    if (empty($deskripsi)) {
        $errors[] = 'Deskripsi harus diisi';
    }
    if (empty($stok) || !is_numeric($stok) || $stok < 0) {
        $errors[] = 'Stok harus berupa angka positif';
    }

    if (empty($errors)) {
        if ($menuManager->addMenu($namaMenu, $kategori, $harga, $deskripsi, $stok)) {
            header('Location: index.php?success=add');
            exit;
        } else {
            $errors[] = 'Gagal menambahkan menu';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Sistem Manajemen Kafe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>➕ Tambah Menu Baru</h1>
            <p>Tambahkan menu baru ke dalam sistem</p>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="notification error">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <form method="POST" action="" class="menu-form">
                <div class="form-group">
                    <label for="nama_menu">Nama Menu *</label>
                    <input type="text" id="nama_menu" name="nama_menu" 
                           value="<?php echo htmlspecialchars($_POST['nama_menu'] ?? ''); ?>" 
                           required>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori *</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Minuman" <?php echo (isset($_POST['kategori']) && $_POST['kategori'] === 'Minuman') ? 'selected' : ''; ?>>Minuman</option>
                        <option value="Makanan" <?php echo (isset($_POST['kategori']) && $_POST['kategori'] === 'Makanan') ? 'selected' : ''; ?>>Makanan</option>
                        <option value="Snack" <?php echo (isset($_POST['kategori']) && $_POST['kategori'] === 'Snack') ? 'selected' : ''; ?>>Snack</option>
                        <option value="Dessert" <?php echo (isset($_POST['kategori']) && $_POST['kategori'] === 'Dessert') ? 'selected' : ''; ?>>Dessert</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp) *</label>
                    <input type="number" id="harga" name="harga" 
                           value="<?php echo htmlspecialchars($_POST['harga'] ?? ''); ?>" 
                           min="0" step="1000" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi *</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required><?php echo htmlspecialchars($_POST['deskripsi'] ?? ''); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="stok">Stok *</label>
                    <input type="number" id="stok" name="stok" 
                           value="<?php echo htmlspecialchars($_POST['stok'] ?? ''); ?>" 
                           min="0" required>
                </div>

                <div class="form-actions">
                    <a href="index.php" class="btn btn-cancel">Batal</a>
                    <button type="submit" class="btn btn-primary">💾 Simpan Menu</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>