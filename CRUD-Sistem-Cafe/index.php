<?php
require_once 'Database.php';
require_once 'Menu.php';
require_once 'MenuManager.php';

// Inisialisasi objek
$database = new Database();
$menuManager = new MenuManager($database);

// Ambil semua data menu
$menus = $menuManager->getAllMenu();
$totalMenu = $menuManager->getTotalMenu();

// Pesan notifikasi
$message = '';
$messageType = '';

if (isset($_GET['success'])) {
    $messageType = 'success';
    switch ($_GET['success']) {
        case 'add':
            $message = 'Menu berhasil ditambahkan!';
            break;
        case 'update':
            $message = 'Menu berhasil diupdate!';
            break;
        case 'delete':
            $message = 'Menu berhasil dihapus!';
            break;
    }
}

if (isset($_GET['error'])) {
    $messageType = 'error';
    $message = 'Terjadi kesalahan. Silakan coba lagi.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kafe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>☕ Sistem Kafe</h1>
        </div>

        <!-- Notifikasi -->
        <?php if ($message): ?>
            <div class="notification <?php echo $messageType; ?>" id="notification">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Statistik -->
        <div class="stats">
            <h3>📊 Total Menu Tersedia</h3>
            <div class="stats-number"><?php echo $totalMenu; ?></div>
            <a href="tambah.php" class="btn btn-primary">➕ Tambah Menu Baru</a>
        </div>

        <!-- Grid Menu -->
        <div class="menu-grid">
            <?php foreach ($menus as $menu): ?>
                <div class="menu-card">
                    <div class="menu-image">
                        <?php echo $menu->getIcon(); ?>
                    </div>
                    <div class="menu-content">
                        <div class="menu-name"><?php echo htmlspecialchars($menu->getNamaMenu()); ?></div>
                        <span class="menu-category"><?php echo htmlspecialchars($menu->getKategori()); ?></span>
                        <p class="menu-description"><?php echo htmlspecialchars($menu->getDeskripsi()); ?></p>
                        <div class="menu-price"><?php echo $menu->getHargaFormatted(); ?></div>
                        <p class="menu-stock">Stok: <?php echo $menu->getStok(); ?> tersedia</p>
                        
                        <div class="menu-actions">
                            <a href="ubah.php?id=<?php echo $menu->getId(); ?>" class="btn btn-edit">✏️ Ubah</a>
                            <button onclick="confirmDelete(<?php echo $menu->getId(); ?>, '<?php echo htmlspecialchars($menu->getNamaMenu(), ENT_QUOTES); ?>')" class="btn btn-delete">🗑️ Hapus</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h2>⚠️ Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus menu:</p>
            <p class="menu-to-delete" id="menuName"></p>
            <div class="modal-actions">
                <button onclick="closeModal()" class="btn btn-cancel">Batal</button>
                <button onclick="deleteMenu()" class="btn btn-confirm-delete">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        let menuIdToDelete = null;

        // Auto hide notification
        window.onload = function() {
            const notification = document.getElementById('notification');
            if (notification) {
                setTimeout(() => {
                    notification.style.opacity = '0';
                    setTimeout(() => {
                        notification.style.display = 'none';
                    }, 300);
                }, 3000);
            }
        }

        function confirmDelete(id, name) {
            menuIdToDelete = id;
            document.getElementById('menuName').textContent = name;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
            menuIdToDelete = null;
        }

        function deleteMenu() {
            if (menuIdToDelete) {
                window.location.href = 'hapus.php?id=' + menuIdToDelete;
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>