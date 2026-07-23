<?php
require '../config/auth.php';
require '../config/database.php';

// Ambil daftar produk untuk dimasukkan ke dalam dropdown
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
                    <h1 class="text-2xl font-bold text-gray-800">Catat Barang Masuk</h1>
                    <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini untuk menambah stok barang ke dalam sistem.</p>
                </div>

                <form action="store.php" method="POST">
                    
                    <!-- Input Produk -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Pilih Produk <span class="text-red-500">*</span>
                        </label>
                        <select name="product_id" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" required>
                            <option value="">-- Silakan Pilih Produk --</option>
                            <?php while($p = mysqli_fetch_assoc($products)): ?>
                                <option value="<?= $p['id']; ?>">
                                    <?= $p['code']; ?> - <?= $p['name']; ?> (Stok saat ini: <?= $p['stock']; ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- Input Jumlah -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jumlah Barang Masuk <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="quantity" placeholder="Masukkan angka (contoh: 50)" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white" min="1" required>
                    </div>

                    <!-- Input Keterangan -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan (Opsional)</label>
                        <textarea name="note" rows="3" placeholder="Misal: Retur barang, restock bulanan dari supplier A..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"></textarea>
                    </div>

                    <!-- Grup Tombol -->
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-6">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 shadow-sm flex items-center gap-2">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Simpan & Tambah Stok
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