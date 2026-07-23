<?php
require '../config/auth.php';
require '../config/database.php';

// Ambil data stock_in dan gabungkan (JOIN) dengan tabel products untuk mendapat nama dan kode barang
$data = mysqli_query(
    $conn,
    "SELECT 
        stock_in.*, 
        products.name AS product_name, 
        products.code 
     FROM stock_in 
     JOIN products ON stock_in.product_id = products.id 
     ORDER BY stock_in.id DESC"
);

include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50">
    
    <!-- Memanggil Sidebar -->
    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">
        
        <!-- Memanggil Navbar -->
        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">
            
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Riwayat Barang Masuk</h1>
                    <p class="text-sm text-gray-500 mt-1">Pantau dan kelola semua transaksi penambahan stok barang di sini.</p>
                </div>
                
                <a href="create.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow-sm transition duration-200 flex items-center gap-2">
                    <!-- Ikon Tambah -->
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Barang Masuk
                </a>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-16 text-center">No</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kode</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Barang</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Jumlah Masuk</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Keterangan</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center w-32">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-gray-100">
                            <?php 
                            $no = 1;
                            while($row = mysqli_fetch_assoc($data)): 
                            ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                
                                <td class="px-6 py-4 text-sm text-gray-600 text-center">
                                    <?= $no++; ?>
                                </td>
                                
                                <td class="px-6 py-4 text-sm font-medium text-blue-600">
                                    <?= $row['code']; ?>
                                </td>
                                
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800">
                                    <?= $row['product_name']; ?>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-center">
                                    <!-- Badge Jumlah Masuk -->
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">
                                        +<?= $row['quantity']; ?>
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <?= $row['note'] ? $row['note'] : '<span class="text-gray-400 italic">Tidak ada catatan</span>'; ?>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-600 font-medium">
                                    <?= date('d M Y, H:i', strtotime($row['created_at'])); ?>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-center">
                                    <!-- Tombol Detail -->
                                    <a href="detail.php?id=<?= $row['id']; ?>" class="bg-blue-100 hover:bg-blue-600 text-blue-700 hover:text-white px-4 py-1.5 rounded-md transition duration-200 text-sm font-medium inline-block shadow-sm">
                                        Detail
                                    </a>
                                </td>
                                
                            </tr>
                            <?php endwhile; ?>

                            <!-- Tampilan jika tidak ada data -->
                            <?php if(mysqli_num_rows($data) == 0): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500 text-sm">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        Belum ada riwayat barang masuk. Silakan catat barang masuk pertama Anda.
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>