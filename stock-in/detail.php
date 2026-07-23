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
    stock_in.*,
    products.code,
    products.name AS product_name
    FROM stock_in
    JOIN products
    ON stock_in.product_id = products.id
    WHERE stock_in.id = $id"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
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

            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detail Transaksi</h1>
                    <p class="text-sm text-gray-500 mt-1">Rincian riwayat barang masuk.</p>
                </div>
                <a href="index.php" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg transition duration-200 flex items-center gap-2 border border-gray-300">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-3xl">
                
                <!-- Header Transaksi (Warna Hijau) -->
                <div class="bg-green-600 px-6 py-4 flex justify-between items-center text-white">
                    <div class="font-semibold text-lg flex items-center gap-2">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Transaksi #IN-<?= str_pad($data['id'], 4, '0', STR_PAD_LEFT); ?>
                    </div>
                    <div class="text-sm opacity-80">
                        <?= date('d M Y, H:i', strtotime($data['created_at'])); ?>
                    </div>
                </div>

                <div class="p-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        <!-- Info Produk -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Informasi Produk</p>
                            
                            <div class="mb-4">
                                <p class="text-sm text-gray-500 mb-1">Kode Barang</p>
                                <p class="text-base font-semibold text-gray-800"><?= $data['code']; ?></p>
                            </div>
                            
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Nama Barang</p>
                                <p class="text-base font-semibold text-gray-800"><?= $data['product_name']; ?></p>
                            </div>
                        </div>

                        <!-- Info Transaksi -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Rincian Masuk</p>
                            
                            <div class="mb-4">
                                <p class="text-sm text-gray-500 mb-1">Jumlah Ditambahkan</p>
                                <span class="inline-block bg-green-100 text-green-700 font-bold px-3 py-1 rounded text-lg">
                                    +<?= $data['quantity']; ?> Unit
                                </span>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 mb-1">Keterangan / Catatan</p>
                                <p class="text-base text-gray-800 bg-gray-50 p-3 rounded border border-gray-100">
                                    <?= $data['note'] ? $data['note'] : '<span class="text-gray-400 italic">Tidak ada keterangan.</span>'; ?>
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>