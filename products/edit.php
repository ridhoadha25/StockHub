<?php
// 1. Panggil koneksi dan keamanan
require '../config/auth.php';
require '../config/database.php';

// 2. Ambil ID produk dari URL (misal: edit.php?id=5)
$id = $_GET['id'];

// 3. Cari data produk yang ID-nya 5 tersebut
$query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);

// 4. Ambil data kategori & supplier untuk pilihan dropdown
$categories = mysqli_query($conn, "SELECT * FROM categories");
$suppliers = mysqli_query($conn, "SELECT * FROM suppliers");

// 5. Panggil bagian atas website (Header)
include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50">

    <!-- Memanggil Sidebar -->
    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">

        <!-- Memanggil Navbar -->
        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">

            <!-- Card Pembungkus Form -->
            <div class="max-w-4xl bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Edit Data Produk</h1>
                    <p class="text-sm text-gray-500 mt-1">Perbarui informasi barang inventaris Anda di bawah ini.</p>
                </div>

                <form action="update.php" method="POST">

                    <!-- Input tersembunyi untuk mengirim ID produk -->
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <!-- Baris 1: Kode & Nama Barang -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kode Barang <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="code" value="<?= $row['code']; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Barang <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="<?= $row['name']; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                    </div>

                    <!-- Baris 2: Kategori & Supplier -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="category_id" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php while($c = mysqli_fetch_assoc($categories)): ?>
                                    <option value="<?= $c['id']; ?>" <?= $row['category_id'] == $c['id'] ? 'selected' : '' ?>>
                                        <?= $c['name']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Supplier <span class="text-red-500">*</span>
                            </label>
                            <select name="supplier_id" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                                <option value="">-- Pilih Supplier --</option>
                                <?php while($s = mysqli_fetch_assoc($suppliers)): ?>
                                    <option value="<?= $s['id']; ?>" <?= $row['supplier_id'] == $s['id'] ? 'selected' : '' ?>>
                                        <?= $s['name']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Baris 3: Stok Awal & Stok Minimum -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Stok Saat Ini <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="stock" value="<?= $row['stock']; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Batas Stok Minimum <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="min_stock" value="<?= $row['min_stock']; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                    </div>

                    <!-- Baris 4: Harga Beli & Harga Jual -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Beli (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="buy_price" value="<?= $row['buy_price']; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Jual (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="sell_price" value="<?= $row['sell_price']; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                    </div>

                    <!-- Grup Tombol -->
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-6">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 shadow-sm flex items-center gap-2">
                            <!-- Ikon Update -->
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Update Data Produk
                        </button>
                        
                        <!-- Tombol Batal -->
                        <a href="index.php" class="text-gray-500 hover:text-gray-800 font-medium px-4 py-2 rounded-lg transition duration-200">
                            Batal
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>