<?php
require '../config/auth.php';
include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50">

    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">

        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">

            <!-- Card Pembungkus Form -->
            <div class="max-w-xl bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Tambah Kategori Baru</h1>
                    <p class="text-sm text-gray-500 mt-1">Masukkan nama kategori untuk mengelompokkan barang inventaris.</p>
                </div>

                <form action="store.php" method="POST">

                    <!-- Input Nama Kategori -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                        <input
                            type="text"
                            name="name"
                            placeholder="Contoh: Elektronik, Makanan, Minuman..."
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                            required>
                    </div>

                    <!-- Grup Tombol -->
                    <div class="flex items-center gap-4 mt-8">
                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 shadow-sm flex items-center gap-2">
                            
                            <!-- Ikon Simpan (Sudah dikunci ukurannya) -->
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            
                            Simpan Kategori
                        </button>
                        
                        <a href="index.php" 
                           class="text-gray-500 hover:text-gray-800 font-medium px-4 py-2 rounded-lg transition duration-200">
                            Batal
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>