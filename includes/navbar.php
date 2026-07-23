<nav class="bg-white shadow-sm border-b border-gray-200 px-8 py-3 flex justify-between items-center sticky top-0 z-10">

    <!-- Bagian Kiri: Kolom Pencarian -->
    <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2 w-64 border border-transparent focus-within:border-blue-500 focus-within:bg-white transition-all duration-200">
        <!-- Ikon Kaca Pembesar -->
        <svg width="18" height="18" class="text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <input type="text" placeholder="Cari data..." class="bg-transparent border-none focus:outline-none ml-2 w-full text-sm text-gray-700 placeholder-gray-400">
    </div>

    <!-- Bagian Kanan: Profil & Aksi -->
    <div class="flex items-center gap-5">
        
        <!-- Ikon Notifikasi -->
        <button class="relative text-gray-500 hover:text-blue-600 transition-colors duration-200 mt-1">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <!-- Titik merah (Badge) -->
            <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
        </button>

        <!-- Garis Pemisah (Divider) -->
        <div class="h-8 w-px bg-gray-200"></div>

        <!-- Profil User -->
        <div class="flex items-center gap-3">
            <!-- Avatar Bulat Otomatis (Ambil huruf pertama dari nama) -->
            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm border border-blue-200 shadow-sm">
                <?= strtoupper(substr($_SESSION['user']['name'], 0, 1)); ?>
            </div>
            
            <!-- Nama & Role -->
            <div class="flex flex-col">
                <span class="text-sm font-bold text-gray-800 leading-tight">
                    <?= $_SESSION['user']['name']; ?>
                </span>
                <span class="text-xs text-gray-500 font-medium">Administrator</span>
            </div>
        </div>

        <!-- Tombol Logout -->
        <a href="../auth/logout.php" 
           class="flex items-center gap-2 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white px-4 py-2.5 rounded-lg transition-all duration-200 text-sm font-semibold border border-red-100 hover:border-red-500 shadow-sm ml-2">
            <!-- Ikon Keluar -->
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Logout
        </a>

    </div>

</nav>