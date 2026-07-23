<?php
// 1. Panggil koneksi database
require '../config/database.php';

// 2. Tangkap semua data yang dikirim dari form create.php
$category_id = $_POST['category_id'];
$supplier_id = $_POST['supplier_id'];
$code        = $_POST['code'];
$name        = $_POST['name'];
$stock       = $_POST['stock'];
$min_stock   = $_POST['min_stock'];
$buy_price   = $_POST['buy_price'];
$sell_price  = $_POST['sell_price'];

// 3. Masukkan ke dalam tabel products di database
mysqli_query($conn, "INSERT INTO products (category_id, supplier_id, code, name, stock, min_stock, buy_price, sell_price) 
                     VALUES ('$category_id', '$supplier_id', '$code', '$name', '$stock', '$min_stock', '$buy_price', '$sell_price')");

// 4. Setelah berhasil disimpan, otomatis kembali ke halaman index
header("Location: index.php");
exit();
?>