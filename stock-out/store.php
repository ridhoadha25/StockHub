<?php
require '../config/auth.php';
require '../config/database.php';

$product_id = $_POST['product_id'];
$quantity   = (int)$_POST['quantity'];
$note       = $_POST['note'];

// 1. Cek stok produk saat ini
$query_product = mysqli_query($conn, "SELECT stock FROM products WHERE id = '$product_id'");
$product = mysqli_fetch_assoc($query_product);

// 2. Logika Validasi: Tolak jika stok kurang dari yang mau dikeluarkan
if ($product['stock'] < $quantity) {
    echo "
    <script>
        alert('Gagal! Stok tidak mencukupi. Sisa stok hanya " . $product['stock'] . "');
        window.location='create.php';
    </script>
    ";
    exit;
}

// 3. Catat riwayat ke tabel stock_out
mysqli_query(
    $conn,
    "INSERT INTO stock_out (product_id, quantity, note) 
     VALUES ('$product_id', '$quantity', '$note')"
);

// 4. Kurangi (-) stok di tabel products
mysqli_query(
    $conn,
    "UPDATE products 
     SET stock = stock - $quantity 
     WHERE id = '$product_id'"
);

// 5. Kembali ke halaman utama stock-out
header("Location: index.php");
exit;
?>