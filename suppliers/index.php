<?php
require '../config/auth.php';
require '../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM suppliers ORDER BY id DESC"
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
                    <h1 class="text-2xl font-bold text-gray-800">Daftar Supplier</h1>
                    <p class="text-sm text-gray-500 mt-1">Kelola data pemasok barang untuk inventaris Anda.</p>
                </div>

                <a href="create.php"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow-sm transition duration-200 flex items-center gap-2">
                    
                    <!-- Ikon Tambah -->
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Supplier
                </a>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-16 text-center">No</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Supplier</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Telepon</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center w-48">Aksi</th>
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
                                
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                    <div class="flex items-center gap-3">
                                        <!-- Avatar Inisial Bulat -->
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs shadow-sm">
                                            <?= strtoupper(substr($row['name'], 0, 1)); ?>
                                        </div>
                                        <?= $row['name']; ?>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-600 font-medium">
                                    <?= $row['phone']; ?>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <a href="mailto:<?= $row['email']; ?>" class="text-blue-500 hover:underline">
                                        <?= $row['email']; ?>
                                    </a>
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-center">
                                    <div class="flex justify-center gap-2">
                                        <!-- Tombol Edit -->
                                        <a href="edit.php?id=<?= $row['id']; ?>"
                                           class="bg-yellow-100 hover:bg-yellow-500 text-yellow-700 hover:text-white px-3 py-1.5 rounded-md transition duration-200 text-sm font-medium">
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <a href="delete.php?id=<?= $row['id']; ?>"
                                           class="bg-red-100 hover:bg-red-600 text-red-700 hover:text-white px-3 py-1.5 rounded-md transition duration-200 text-sm font-medium"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data supplier ini?')">
                                            Hapus
                                        </a>
                                    </div>
                                </td>

                            </tr>
                            <?php endwhile; ?>

                            <!-- Tampilan jika tidak ada data -->
                            <?php if(mysqli_num_rows($data) == 0): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500 text-sm">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        Belum ada data supplier. Silakan tambahkan data supplier pertama Anda.
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