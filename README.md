# 📦 StockHub - Inventory Management System

StockHub adalah aplikasi Inventory Management System berbasis web yang digunakan untuk mengelola data barang, supplier, stok masuk, stok keluar, dan laporan inventaris secara efisien.

Project ini dibuat menggunakan **PHP Native**, **MySQL**, dan **Tailwind CSS** sebagai bagian dari portfolio pengembangan web.

---

## 🚀 Features

### 🔐 Authentication

* Login Admin
* Logout
* Session Authentication

### 📊 Dashboard

* Total Produk
* Total Supplier
* Total Barang Masuk
* Total Barang Keluar
* Statistik Inventory

### 🗂️ Category Management

* Tambah Kategori
* Edit Kategori
* Hapus Kategori
* Daftar Kategori

### 🏢 Supplier Management

* Tambah Supplier
* Edit Supplier
* Hapus Supplier
* Daftar Supplier

### 📦 Product Management

* Tambah Produk
* Edit Produk
* Hapus Produk
* Detail Produk
* Stok Minimum
* Harga Beli & Harga Jual

### 📥 Stock In

* Input Barang Masuk
* Update Stok Otomatis
* Riwayat Barang Masuk
* Detail Transaksi

### 📤 Stock Out

* Input Barang Keluar
* Validasi Stok
* Update Stok Otomatis
* Riwayat Barang Keluar
* Detail Transaksi

### 📈 Inventory Monitoring

* Notifikasi Stok Menipis
* Monitoring Stok Barang

### 📄 Reports

* Laporan Stok
* Laporan Barang Masuk
* Laporan Barang Keluar
* Export PDF

---

## 🛠️ Tech Stack

### Frontend

* HTML5
* Tailwind CSS
* JavaScript

### Backend

* PHP Native

### Database

* MySQL

### Tools

* XAMPP
* phpMyAdmin
* Visual Studio Code
* Git & GitHub

---

## 📁 Project Structure

```text
stockhub/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── config/
│   ├── auth.php
│   └── database.php
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   ├── navbar.php
│   └── sidebar.php
│
├── dashboard/
│   └── index.php
│
├── categories/
│   ├── index.php
│   ├── create.php
│   ├── store.php
│   ├── edit.php
│   ├── update.php
│   └── delete.php
│
├── suppliers/
│   ├── index.php
│   ├── create.php
│   ├── store.php
│   ├── edit.php
│   ├── update.php
│   ├── delete.php
│   └── detail.php
│
├── products/
│   ├── index.php
│   ├── create.php
│   ├── store.php
│   ├── edit.php
│   ├── update.php
│   ├── delete.php
│   └── detail.php
│
├── stock-in/
│   ├── index.php
│   ├── create.php
│   ├── store.php
│   └── detail.php
│
├── stock-out/
│   ├── index.php
│   ├── create.php
│   ├── store.php
│   └── detail.php
│
├── reports/
│   ├── stock-report.php
│   ├── stock-in-report.php
│   ├── stock-out-report.php
│   └── export-pdf.php
│
├── login.php
├── logout.php
└── index.php
```

---

## 🗄️ Database Tables

### Users

* id
* username
* password

### Categories

* id
* name

### Suppliers

* id
* name
* phone
* email
* address

### Products

* id
* category_id
* supplier_id
* code
* name
* stock
* min_stock
* buy_price
* sell_price

### Stock In

* id
* product_id
* quantity
* note
* created_at

### Stock Out

* id
* product_id
* quantity
* note
* created_at

---

## ⚙️ Installation

### Clone Repository

```bash
git clone https://github.com/yourusername/stockhub.git
```

### Move Project

Pindahkan ke folder:

```text
C:/xampp/htdocs/
```

### Create Database

Buat database:

```sql
CREATE DATABASE stockhub;
```

### Import Tables

Import seluruh tabel melalui phpMyAdmin.

### Run Project

Buka browser:

```text
http://localhost/stockhub
```

---

## 🎯 Future Improvements

* Search Produk
* Pagination
* Export Excel
* Chart Dashboard
* Multi User Role
* Activity Log
* Dark Mode
* Responsive Mobile
* REST API Integration

---

## 👨‍💻 Author

**M. Ridho Adha**

Information Systems Student

Frontend & Web Developer Enthusiast

---

⭐ If you like this project, don't forget to give it a star on GitHub.
