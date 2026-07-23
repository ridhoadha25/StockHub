<?php
require '../config/auth.php';
require '../config/database.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM suppliers WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);

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
            <div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                
                <div class="mb-8 border-b border-gray-100 pb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Edit Data Supplier</h1>
                    <p class="text-sm text-gray-500 mt-1">Perbarui informasi detail pemasok barang di bawah ini.</p>
                </div>

                <form action="update.php" method="POST">

                    <!-- Input Hidden ID -->
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <!-- Input Nama Supplier (Wajib) -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Supplier <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="<?= $row['name']; ?>"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                            required>
                    </div>

                    <!-- Grid Layout untuk Telepon & Email (Bersebelahan) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                        
                        <!-- Input Telepon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input
                                type="text"
                                name="phone"
                                value="<?= $row['phone']; ?>"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white">
                        </div>

                        <!-- Input Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                            <input
                                type="email"
                                name="email"
                                value="<?= $row['email']; ?>"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white">
                        </div>

                    </div>

                    <!-- Input Alamat (Textarea) -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea
                            name="address"
                            rows="3"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"><?= $row['address']; ?></textarea>
                    </div>

                    <!-- Grup Tombol -->
                    <div class="flex items-center gap-4">
                        <button
                            type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 shadow-sm flex items-center gap-2">
                            
                            <!-- Ikon Update -->
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            
                            Update Data
                        </button>
                        
                        <!-- Tombol Batal kembali ke index.php -->
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