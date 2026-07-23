<?php
require '../config/auth.php';
require '../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT
    products.*,
    categories.name AS category_name,
    suppliers.name AS supplier_name
    FROM products
    JOIN categories
    ON products.category_id = categories.id
    JOIN suppliers
    ON products.supplier_id = suppliers.id
    ORDER BY products.id DESC"
);

include '../includes/header.php';
?>

<div class="flex min-h-screen bg-gray-50">

    <?php include '../includes/sidebar.php'; ?>

    <div class="flex-1">

        <?php include '../includes/navbar.php'; ?>

        <div class="p-8">

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Daftar Produk</h1>
                    <p class="text-sm text-gray-500 mt-1">Kelola semua data barang inventaris Anda di sini.</p>
                </div>

                <a href="create.php"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow-sm transition duration-200 flex items-center gap-2">
                    
                    <!-- Ikon Tambah -->
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Produk
                </a>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kode</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Barang</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Supplier</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Stok</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center w-64">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">

                            <?php while($row = mysqli_fetch_assoc($data)): ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                
                                <td class="px-6 py-4 text-sm font-medium text-blue-600">
                                    <?= $row['code']; ?>
                                </td>
                                
                                <td class="px-6 py-4 text-sm font-semibold text-gray-800">
                                    <?= $row['name']; ?>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <span class="bg-gray-100 text-gray-600 px-2.5 py-1 rounded-md text-xs font-medium">
                                        <?= $row['category_name']; ?>
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <?= $row['supplier_name']; ?>
                                </td>

                                <td class="px-6 py-4 text-sm text-center">
                                    <span class="font-bold <?= $row['stock'] > 0 ? 'text-green-600' : 'text-red-600' ?>">
                                        <?= $row['stock']; ?>
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-center">
                                    <div class="flex justify-center gap-2">
                                        <!-- Tombol Detail -->
                                        <a href="detail.php?id=<?= $row['id']; ?>"
                                           class="bg-blue-100 hover:bg-blue-600 text-blue-700 hover:text-white px-3 py-1.5 rounded-md transition duration-200 text-sm font-medium">
                                            Detail
                                        </a>

                                        <!-- Tombol Edit -->
                                        <a href="edit.php?id=<?= $row['id']; ?>"
                                           class="bg-yellow-100 hover:bg-yellow-500 text-yellow-700 hover:text-white px-3 py-1.5 rounded-md transition duration-200 text-sm font-medium">
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <a href="delete.php?id=<?= $row['id']; ?>"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                           class="bg-red-100 hover:bg-red-600 text-red-700 hover:text-white px-3 py-1.5 rounded-md transition duration-200 text-sm font-medium">
                                            Hapus
                                        </a>
                                    </div>
                                </td>

                            </tr>
                            <?php endwhile; ?>

                            <!-- Tampilan jika tidak ada data -->
                            <?php if(mysqli_num_rows($data) == 0): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-sm">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        Belum ada data produk. Silakan tambahkan produk baru.
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