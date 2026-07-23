<?php
// 1. Panggil koneksi dan keamanan
require '../config/auth.php';
require '../config/database.php';

// 2. Ambil data kategori dan supplier untuk isi dropdown
$categories = mysqli_query($conn, "SELECT * FROM categories");
$suppliers = mysqli_query($conn, "SELECT * FROM suppliers");

// 3. Panggil bagian atas website (Header)
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
                    <h1 class="text-2xl font-bold text-gray-800">Tambah Produk Baru</h1>
                    <p class="text-sm text-gray-500 mt-1">Lengkapi informasi di bawah ini untuk menambahkan barang ke dalam sistem inventaris.</p>
                </div>

                <form action="store.php" method="POST">

                    <!-- Baris 1: Kode & Nama Barang -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kode Barang <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="code" placeholder="Contoh: BRG-001" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Barang <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" placeholder="Contoh: Kopi Bubuk Arabica" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
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
                                    <option value="<?= $c['id']; ?>"> <?= $c['name']; ?> </option>
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
                                    <option value="<?= $s['id']; ?>"> <?= $s['name']; ?> </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Baris 3: Stok Awal & Stok Minimum -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Stok Awal <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="stock" placeholder="0" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Batas Stok Minimum <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="min_stock" placeholder="Contoh: 10" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                    </div>

                    <!-- Baris 4: Harga Beli & Harga Jual -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Beli (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="buy_price" placeholder="Contoh: 15000" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Jual (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="sell_price" placeholder="Contoh: 25000" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                        </div>
                    </div>

                    <!-- Grup Tombol -->
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 shadow-sm flex items-center gap-2">
                            <!-- Ikon Simpan -->
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Produk
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