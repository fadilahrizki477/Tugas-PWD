-- Buat database
CREATE DATABASE IF NOT EXISTS cafe_db;
USE cafe_db;

-- Buat tabel menu
CREATE TABLE IF NOT EXISTS menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_menu VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL,
    deskripsi TEXT NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data sample
INSERT INTO menu (nama_menu, kategori, harga, deskripsi, stok) VALUES
('Espresso', 'Minuman', 15000, 'Kopi espresso murni dengan rasa yang kuat dan nikmat', 50),
('Cappuccino', 'Minuman', 25000, 'Perpaduan sempurna espresso dengan susu berbusa', 45),
('Latte', 'Minuman', 28000, 'Kopi susu dengan sentuhan lembut dan creamy', 40),
('Americano', 'Minuman', 20000, 'Espresso yang dicampur dengan air panas', 55),
('Croissant', 'Makanan', 18000, 'Roti pastry khas Prancis yang renyah dan lezat', 30),
('Sandwich', 'Makanan', 35000, 'Sandwich isi ayam dengan sayuran segar', 25),
('Brownies', 'Dessert', 22000, 'Brownies cokelat yang lembut dan manis', 20),
('Cheese Cake', 'Dessert', 30000, 'Kue keju dengan tekstur lembut dan creamy', 15),
('Cookies', 'Snack', 15000, 'Kue kering dengan berbagai varian rasa', 60),
('Donat', 'Snack', 12000, 'Donat lembut dengan topping cokelat', 35);