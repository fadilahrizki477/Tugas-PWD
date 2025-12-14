<?php
require_once 'Database.php';
require_once 'Menu.php';
require_once 'MenuManager.php';

$database = new Database();
$menuManager = new MenuManager($database);

$id = $_GET['id'] ?? 0;

// Cek apakah menu ada
$menu = $menuManager->getMenuById($id);

if (!$menu) {
    header('Location: index.php?error=not_found');
    exit;
}

// Proses hapus
if ($menuManager->deleteMenu($id)) {
    header('Location: index.php?success=delete');
} else {
    header('Location: index.php?error=delete_failed');
}
exit;
?>