<div class="w-64 bg-slate-900 text-white min-h-screen shadow-xl flex flex-col">

    <!-- Area Logo & Judul -->
    <div class="p-6 border-b border-slate-700 flex items-center gap-3">
        <!-- Ikon Logo (Box) -->
        <svg width="28" height="28" class="text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
        </svg>
        <h2 class="text-2xl font-bold tracking-wide">
            StockHub
        </h2>
    </div>

    <!-- Navigasi Menu -->
    <div class="flex-1 px-4 py-6 overflow-y-auto">
        
        <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">
            Menu Utama
        </p>

        <ul class="space-y-1">

            <!-- Menu Dashboard -->
            <li>
                <a href="../dashboard/index.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Menu Kategori -->
            <li>
                <a href="../categories/index.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span class="font-medium">Kategori</span>
                </a>
            </li>

            <!-- Menu Supplier -->
            <li>
                <a href="../suppliers/index.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="font-medium">Supplier</span>
                </a>
            </li>

            <!-- Menu Produk -->
            <li>
                <a href="../products/index.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                    <span class="font-medium">Produk</span>
                </a>
            </li>

        </ul>

        <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mt-8 mb-4">
            Transaksi
        </p>

        <ul class="space-y-1">

            <!-- Menu Barang Masuk -->
            <li>
                <a href="../stock-in/index.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span class="font-medium">Barang Masuk</span>
                </a>
            </li>

            <!-- Menu Barang Keluar -->
            <li>
                <a href="../stock-out/index.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span class="font-medium">Barang Keluar</span>
                </a>
            </li>

            <!-- Menu Laporan -->
            <li>
                <a href="../reports/stock-report.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="font-medium">Laporan</span>
                </a>
            </li>

        </ul>

    </div>
</div>