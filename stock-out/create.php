<?php
require '../config/auth.php';
require '../config/database.php';

// Ambil daftar produk untuk dropdown
$products = mysqli_query($conn, "SELECT * FROM products ORDER BY name ASC");

include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50">

    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">

        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">

            <div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Catat Barang Keluar</h1>
                    <p class="text-sm text-gray-500 mt-1">Formulir untuk mengurangi stok barang akibat penjualan, rusak, dll.</p>
                </div>

                <form action="store.php" method="POST">
                    
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Pilih Produk <span class="text-red-500">*</span>
                        </label>
                        <select name="product_id" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                            <option value="">-- Silakan Pilih Produk --</option>
                            <?php while($p = mysqli_fetch_assoc($products)): ?>
                                <option value="<?= $p['id']; ?>">
                                    <?= $p['code']; ?> - <?= $p['name']; ?> (Sisa Stok: <?= $p['stock']; ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jumlah Barang Keluar <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="quantity" placeholder="Masukkan angka (contoh: 10)" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" min="1" required>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan (Opsional)</label>
                        <textarea name="note" rows="3" placeholder="Misal: Terjual, Barang rusak, Digunakan untuk internal..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"></textarea>
                    </div>

                    <div class="flex items-center gap-4 border-t border-gray-100 pt-6">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 shadow-sm flex items-center gap-2">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                            Simpan & Kurangi Stok
                        </button>
                        
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