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

        <!-- Statistik -->
        <div class="stats">
            <h3>📊 Total Menu Tersedia</h3>
            <div class="stats-number"><?php echo $totalMenu; ?></div>
        </div>

        <!-- Grid Menu -->
        <div class="menu-grid">
            <?php foreach ($menus as $menu): ?>
                <div class="menu-card">
                    <div class="menu-image">
                        <?php echo $menu->getIcon(); ?>
                    </div>
                    <div class="menu-content">
                        <div class="menu-name"><?php echo $menu->getNamaMenu(); ?></div>
                        <span class="menu-category"><?php echo $menu->getKategori(); ?></span>
                        <p class="menu-description"><?php echo $menu->getDeskripsi(); ?></p>
                        <div class="menu-price"><?php echo $menu->getHargaFormatted(); ?></div>
                        <p class="menu-stock">Stok: <?php echo $menu->getStok(); ?> tersedia</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>