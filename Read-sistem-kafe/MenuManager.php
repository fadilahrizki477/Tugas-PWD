<?php
require_once 'Database.php';
require_once 'Menu.php';

class MenuManager {
    private $db;
    private $connection;

    public function __construct(Database $database) {
        $this->db = $database;
        $this->connection = $this->db->getConnection();
    }

    public function getAllMenu() {
        $menus = [];
        $query = "SELECT * FROM menu ORDER BY id ASC";
        $result = $this->connection->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $menus[] = new Menu(
                    $row['id'],
                    $row['nama_menu'],
                    $row['kategori'],
                    $row['harga'],
                    $row['deskripsi'],
                    $row['stok']
                );
            }
        }

        return $menus;
    }

    public function getTotalMenu() {
        $query = "SELECT COUNT(*) as total FROM menu";
        $result = $this->connection->query($query);
        
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }
        
        return 0;
    }

    public function getMenuById($id) {
        $query = "SELECT * FROM menu WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Menu(
                $row['id'],
                $row['nama_menu'],
                $row['kategori'],
                $row['harga'],
                $row['deskripsi'],
                $row['stok']
            );
        }

        return null;
    }
}
?>