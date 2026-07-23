<?php
require '../config/auth.php';
require '../config/database.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT
    products.*,
    categories.name AS category_name,
    suppliers.name AS supplier_name
    FROM products
    JOIN categories
    ON products.category_id = categories.id
    JOIN suppliers
    ON products.supplier_id = suppliers.id
    WHERE products.id = $id"
);

$product = mysqli_fetch_assoc($query);

if (!$product) {
    header("Location: index.php");
    exit;
}

include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50">

    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">

        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">

            <!-- Tombol Kembali & Judul -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detail Produk</h1>
                    <p class="text-sm text-gray-500 mt-1">Rincian lengkap dari barang inventaris.</p>
                </div>
                <a href="index.php" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg transition duration-200 flex items-center gap-2 border border-gray-300">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

            <!-- Card Utama -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-4xl">
                
                <!-- Header Card (Warna Aksen) -->
                <div class="bg-blue-600 px-6 py-4 flex justify-between items-center">
                    <div class="text-white font-semibold text-lg flex items-center gap-2">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <?= $product['code']; ?>
                    </div>
                    
                    <!-- Badge Status Stok -->
                    <?php if($product['stock'] > $product['min_stock']): ?>
                        <span class="bg-green-400 text-green-900 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Stok Aman</span>
                    <?php else: ?>
                        <span class="bg-red-400 text-red-900 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Stok Menipis</span>
                    <?php endif; ?>
                </div>

                <div class="p-8">
                    <!-- Grid 2 Kolom -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        
                        <!-- Kolom Kiri: Informasi Dasar -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 border-b border-gray-200 pb-2 mb-4">Informasi Dasar</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Nama Barang</p>
                                    <p class="text-base font-semibold text-gray-800 mt-1"><?= $product['name']; ?></p>
                                </div>
                                
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Kategori</p>
                                    <p class="text-base text-gray-800 mt-1">
                                        <span class="bg-gray-100 px-2 py-1 rounded text-sm"><?= $product['category_name']; ?></span>
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Supplier Pemasok</p>
                                    <p class="text-base text-gray-800 mt-1"><?= $product['supplier_name']; ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Stok & Finansial -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 border-b border-gray-200 pb-2 mb-4">Stok & Harga</h3>
                            
                            <div class="space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 text-center">
                                        <p class="text-xs text-gray-500 font-medium">Stok Saat Ini</p>
                                        <p class="text-2xl font-bold <?= $product['stock'] > $product['min_stock'] ? 'text-green-600' : 'text-red-600' ?> mt-1">
                                            <?= $product['stock']; ?>
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 text-center">
                                        <p class="text-xs text-gray-500 font-medium">Batas Minimum</p>
                                        <p class="text-2xl font-bold text-gray-600 mt-1">
                                            <?= $product['min_stock']; ?>
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Harga Beli</p>
                                    <p class="text-base font-semibold text-gray-800 mt-1">Rp <?= number_format($product['buy_price'], 0, ',', '.'); ?></p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Harga Jual</p>
                                    <p class="text-base font-semibold text-gray-800 mt-1">Rp <?= number_format($product['sell_price'], 0, ',', '.'); ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Tombol Aksi Tambahan (Opsional) -->
                    <div class="mt-8 pt-6 border-t border-gray-100 flex gap-3">
                        <a href="edit.php?id=<?= $product['id']; ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200 shadow-sm">
                            Edit Produk Ini
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>