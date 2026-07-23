<?php
require '../config/auth.php';
require '../config/database.php';

$query = mysqli_query(
    $conn,
    "SELECT 
        stock_in.*, 
        products.code, 
        products.name 
     FROM stock_in 
     JOIN products ON stock_in.product_id = products.id 
     ORDER BY stock_in.id DESC"
);

include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50">
    
    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">
        
        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">
            
            <!-- Header & Tombol Cetak (Akan hilang saat dicetak) -->
            <div class="flex justify-between items-center mb-6 print:hidden">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Laporan Barang Masuk</h1>
                    <p class="text-sm text-gray-500 mt-1">Rekapitulasi seluruh transaksi penambahan stok barang.</p>
                </div>
                <button onclick="window.print()" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow-sm transition duration-200 flex items-center gap-2">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak Laporan
                </button>
            </div>

            <!-- Area yang akan dicetak -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden print:shadow-none print:border-none print:rounded-none">
                
                <!-- Judul Khusus Kertas (Hanya muncul saat dicetak) -->
                <div class="hidden print:block text-center mb-6 border-b-2 border-gray-800 pb-4">
                    <h2 class="text-2xl font-bold uppercase tracking-wider">Laporan Barang Masuk</h2>
                    <p class="text-gray-500">Dicetak pada: <?= date('d F Y, H:i'); ?></p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 border-b border-gray-200 print:bg-white print:border-b-2 print:border-gray-800">
                            <tr>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:text-black">Tanggal</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:text-black">Kode Barang</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:text-black">Nama Barang</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center print:text-black">Jumlah</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:text-black">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 print:divide-gray-300">
                            <?php while($row = mysqli_fetch_assoc($query)): ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 text-sm text-gray-600 font-medium print:text-black">
                                    <?= date('d-m-Y H:i', strtotime($row['created_at'])); ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-blue-600 font-medium print:text-black">
                                    <?= $row['code']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800 print:text-black">
                                    <?= $row['name']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-center font-bold text-green-600 print:text-black">
                                    +<?= $row['quantity']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 print:text-black">
                                    <?= $row['note'] ? $row['note'] : '-'; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>