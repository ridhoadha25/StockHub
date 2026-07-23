<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StockHub Inventory</title>
    <!-- Pastikan link CSS ini mengarah ke file Tailwind kamu -->
    <!-- Jika file login.php ada di luar folder (root), hapus "../" menjadi "assets/css/style.css" -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">

    <!-- Card Login -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-200">
        
        <!-- Logo & Judul -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                <!-- Ikon Box / Inventory (Sudah dikunci ukurannya) -->
                <svg width="32" height="32" class="text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Selamat Datang di StockHub</h1>
            <p class="text-sm text-gray-500 mt-2">Silakan login untuk mengelola inventaris Anda</p>
        </div>

        <!-- Alert Error -->
        <?php if(isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-6 rounded text-sm">
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="login_process.php" method="POST">
            
            <!-- Input Email -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Ikon Email (Sudah dikunci ukurannya) -->
                        <svg width="20" height="20" class="text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="admin@stockhub.com" 
                        class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        required>
                </div>
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="#" class="text-xs text-blue-600 hover:text-blue-800 hover:underline">Lupa password?</a>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Ikon Gembok (Sudah dikunci ukurannya) -->
                        <svg width="20" height="20" class="text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="••••••••" 
                        class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        required>
                </div>
            </div>

            <!-- Tombol Login -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 shadow-md">
                Masuk ke Dashboard
            </button>

        </form>

        <!-- Footer Card -->
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>Belum punya akun? <a href="#" class="text-blue-600 hover:underline font-medium">Hubungi Admin</a></p>
        </div>

    </div>

</body>
</html>