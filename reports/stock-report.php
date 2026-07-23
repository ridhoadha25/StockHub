<?php
require '../config/auth.php';
require '../config/database.php';

$query = mysqli_query(
    $conn,
    "SELECT 
        products.*, 
        categories.name AS category_name, 
        suppliers.name AS supplier_name 
     FROM products 
     JOIN categories ON products.category_id = categories.id 
     JOIN suppliers ON products.supplier_id = suppliers.id
     ORDER BY products.name ASC"
);

include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50 print:bg-white">
    
    <!-- Sidebar (Otomatis tersembunyi saat dicetak berkat print:hidden) -->
    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">
        
        <!-- Navbar (Otomatis tersembunyi saat dicetak berkat print:hidden) -->
        <?php include '../includes/navbar.php'; ?>

        <div class="p-8 print:p-0">
            
            <!-- Tombol Cetak (Hanya tampil di layar, hilang saat dicetak) -->
            <div class="flex justify-between items-center mb-6 print:hidden">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Laporan Stok Keseluruhan</h1>
                    <p class="text-sm text-gray-500 mt-1">Informasi lengkap aset produk, kategori, dan nominal harga.</p>
                </div>
                <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow-sm transition duration-200 flex items-center gap-2">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak Laporan
                </button>
            </div>

            <!-- Area Lembar Laporan -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden print:shadow-none print:border-none print:rounded-none">
                
                <!-- KOP SURAT (Hanya muncul saat dicetak/PDF) -->
                <div class="hidden print:block mb-6">
                    <div class="text-center border-b-4 border-black pb-3 mb-1">
                        <h2 class="text-2xl font-black uppercase tracking-widest text-black">STOCKHUB INVENTORY</h2>
                        <p class="text-xs text-black mt-1">Jl. Teknologi Informatika No. 123, Pusat Bisnis - Telp: (021) 12345678</p>
                        <p class="text-xs text-black">Email: admin@stockhub.com | Website: www.stockhub.com</p>
                    </div>
                    <div class="border-b border-black w-full mb-4"></div>
                    
                    <div class="text-center">
                        <h3 class="text-lg font-bold uppercase text-black underline">Laporan Stok Barang Keseluruhan</h3>
                        <p class="text-xs text-black mt-1">Dicetak pada: <?= date('d F Y, H:i'); ?></p>
                    </div>
                </div>

                <!-- Tabel Data -->
                <div class="overflow-x-auto print:overflow-visible">
                    <table class="w-full text-left border-collapse print:border print:border-black print:text-xs">
                        <thead class="bg-gray-50 border-b border-gray-200 print:bg-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:border print:border-black print:text-black print:py-2">Kode</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:border print:border-black print:text-black print:py-2">Nama Barang</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:border print:border-black print:text-black print:py-2">Kategori</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider print:border print:border-black print:text-black print:py-2">Supplier</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center print:border print:border-black print:text-black print:py-2">Stok</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right print:border print:border-black print:text-black print:py-2">Harga Beli</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right print:border print:border-black print:text-black print:py-2">Harga Jual</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 print:divide-black">
                            <?php while($row = mysqli_fetch_assoc($query)): ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 text-sm text-blue-600 font-medium print:border print:border-black print:text-black print:py-1.5">
                                    <?= $row['code']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800 print:border print:border-black print:text-black print:py-1.5">
                                    <?= $row['name']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 print:border print:border-black print:text-black print:py-1.5">
                                    <?= $row['category_name']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 print:border print:border-black print:text-black print:py-1.5">
                                    <?= $row['supplier_name']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-center print:border print:border-black print:text-black print:py-1.5 <?= $row['stock'] <= $row['min_stock'] ? 'text-red-600 font-bold' : 'font-medium text-gray-800' ?>">
                                    <?= $row['stock']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-right text-gray-600 print:border print:border-black print:text-black print:py-1.5">
                                    Rp <?= number_format($row['buy_price'], 0, ',', '.'); ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-right text-gray-600 print:border print:border-black print:text-black print:py-1.5">
                                    Rp <?= number_format($row['sell_price'], 0, ',', '.'); ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- TANDA TANGAN (Hanya muncul saat dicetak/PDF) -->
                <div class="hidden print:flex justify-end mt-10 pr-6 text-xs">
                    <div class="text-center text-black">
                        <p class="mb-14">Mengetahui,<br>Administrator Inventory</p>
                        <p class="font-bold underline uppercase">
                            <?= explode(' ', trim($_SESSION['user']['name']))[0] ?? 'ADMIN'; ?>
                        </p>
                        <p>NIP. ..................................</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>