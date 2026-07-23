<?php
require '../config/database.php';

$product_id = $_POST['product_id'];
$quantity   = $_POST['quantity'];
$note       = $_POST['note'];

// 1. Catat riwayat barang masuk ke tabel stock_in
mysqli_query(
    $conn,
    "INSERT INTO stock_in (product_id, quantity, note) 
     VALUES ('$product_id', '$quantity', '$note')"
);

// 2. Keajaiban terjadi di sini: Update stok di tabel products
// Stok lama ditambah (+) dengan jumlah barang masuk (quantity)
mysqli_query(
    $conn,
    "UPDATE products 
     SET stock = stock + $quantity 
     WHERE id = '$product_id'"
);

// 3. Kembali ke halaman riwayat
header("Location: index.php");
exit;
?>