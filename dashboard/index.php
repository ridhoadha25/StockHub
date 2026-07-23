<?php
require '../config/auth.php';
require '../config/database.php';

// 1. Query Statistik Dashboard
$total_products = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) as total FROM products")
);

$total_suppliers = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) as total FROM suppliers")
);

$total_stock_in = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(quantity) as total FROM stock_in")
);

$total_stock_out = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(quantity) as total FROM stock_out")
);

// 2. Query Stok Menipis (Stok kurang dari atau sama dengan batas minimum)
$low_stock_items = mysqli_query($conn, "SELECT * FROM products WHERE stock <= min_stock");

include '../includes/header.php'; 
?>

<div class="flex min-h-screen bg-gray-50">

    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">

        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">

            <!-- Header Dashboard -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">
                    Halo, <?= explode(' ', trim($_SESSION['user']['name']))[0] ?? 'Admin'; ?>! 👋
                </h1>
                <p class="text-sm text-gray-500 mt-1">Berikut adalah ringkasan performa inventaris Anda hari ini.</p>
            </div>

            <!-- 4 CARD STATISTIK -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <!-- Card Total Produk -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-transform hover:-translate-y-1 duration-300">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Produk</p>
                        <h3 class="text-3xl font-bold mt-2 text-gray-800">
                            <?= number_format($total_products['total'] ?? 0, 0, ',', '.'); ?>
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center shadow-inner">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>

                <!-- Card Total Supplier -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-transform hover:-translate-y-1 duration-300">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Supplier</p>
                        <h3 class="text-3xl font-bold mt-2 text-gray-800">
                            <?= number_format($total_suppliers['total'] ?? 0, 0, ',', '.'); ?>
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center shadow-inner">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Card Barang Masuk -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-transform hover:-translate-y-1 duration-300">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Barang Masuk</p>
                        <h3 class="text-3xl font-bold mt-2 text-gray-800">
                            <?= number_format($total_stock_in['total'] ?? 0, 0, ',', '.'); ?>
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-full flex items-center justify-center shadow-inner">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </div>
                </div>

                <!-- Card Barang Keluar -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-transform hover:-translate-y-1 duration-300">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Barang Keluar</p>
                        <h3 class="text-3xl font-bold mt-2 text-gray-800">
                            <?= number_format($total_stock_out['total'] ?? 0, 0, ',', '.'); ?>
                        </h3>
                    </div>
                    <div class="w-14 h-14 bg-red-50 text-red-600 rounded-full flex items-center justify-center shadow-inner">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                    </div>
                </div>

            </div>
            <!-- AKHIR CARD STATISTIK -->

            <!-- TABEL STOK MENIPIS -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                
                <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-3">
                    <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Peringatan Stok Menipis</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Produk yang memerlukan pengadaan ulang (restock) secepatnya.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kode</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Produk</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Stok Saat Ini</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Batas Minimum</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            
                            <?php if(mysqli_num_rows($low_stock_items) > 0): ?>
                                
                                <?php while($item = mysqli_fetch_assoc($low_stock_items)): ?>
                                <tr class="hover:bg-red-50/50 transition duration-150">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-700"><?= $item['code']; ?></td>
                                    <td class="px-6 py-4 text-sm font-bold text-gray-800"><?= $item['name']; ?></td>
                                    <td class="px-6 py-4 text-sm text-center font-bold text-red-600 text-lg">
                                        <?= $item['stock']; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500 font-medium">
                                        <?= $item['min_stock']; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <span class="inline-flex items-center gap-1.5 bg-red-100 text-red-700 px-3 py-1.5 rounded-md text-xs font-bold border border-red-200">
                                            <span class="w-1.5 h-1.5 bg-red-600 rounded-full animate-pulse"></span>
                                            Kritis
                                        </span>
                                    </td>
                                </tr>
                                <?php endwhile; ?>

                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-green-100 text-green-500 rounded-full flex items-center justify-center mb-4">
                                                <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-800">Semua Stok Aman!</h3>
                                            <p class="text-sm text-gray-500 mt-1">Tidak ada produk yang mencapai batas minimum saat ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- AKHIR TABEL STOK MENIPIS -->

        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>