<?php
class Menu {
    private $id;
    private $namaMenu;
    private $kategori;
    private $harga;
    private $deskripsi;
    private $stok;

    public function __construct($id, $namaMenu, $kategori, $harga, $deskripsi, $stok) {
        $this->id = $id;
        $this->namaMenu = $namaMenu;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->deskripsi = $deskripsi;
        $this->stok = $stok;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getNamaMenu() {
        return $this->namaMenu;
    }

    public function getKategori() {
        return $this->kategori;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function getDeskripsi() {
        return $this->deskripsi;
    }

    public function getStok() {
        return $this->stok;
    }

    public function getHargaFormatted() {
        return "Rp " . number_format($this->harga, 0, ',', '.');
    }

    public function getIcon() {
        $icons = [
            'Minuman' => '☕',
            'Makanan' => '🍰',
            'Snack' => '🍪',
            'Dessert' => '🍨'
        ];
        return $icons[$this->kategori] ?? '🍽️';
    }
}
?>