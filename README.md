# Gridova 🛒
Aplikasi E-Commerce berbasis web dengan sistem Admin dan User  
(Dibangun menggunakan PHP Native, MySQL, dan Bootstrap)

---

## 📌 Deskripsi Aplikasi
**Gridova** adalah aplikasi e-commerce sederhana yang memiliki dua peran utama:
- **Admin** → mengelola data produk, kategori, brand, dan melihat statistik sistem
- **User** → melihat katalog produk, melakukan login/register, dan menambahkan produk ke keranjang (cart)

Aplikasi ini dikembangkan sebagai **projek tugas akhir** dan berjalan pada **server lokal** menggunakan XAMPP atau DBMS sejenis.

---

## 👤 Akses Admin
Untuk masuk sebagai **Admin**, ikuti langkah berikut:

1. Buka aplikasi melalui browser:
http://localhost/tugas_akhir

2. Pada **Landing Page**, klik tombol **Login**

3. Masukkan akun admin berikut:
Email : admin@gmail.com

Password : 12345678

4. Setelah login, admin akan diarahkan ke **Halaman Dashboard Admin**

### 📊 Fitur Dashboard Admin
Pada halaman dashboard, admin dapat melihat:
- Jumlah total **Produk**
- Jumlah total **User**
- Jumlah total **Brand**

---

## 🧩 Manajemen Data (Admin)
Sebelum menambahkan produk, **Admin WAJIB** mengisi data pendukung terlebih dahulu.

### 1️⃣ Menambahkan Kategori
- Masuk ke menu **Kategori** melalui sidebar
- Tambahkan data kategori produk

### 2️⃣ Menambahkan Brand
- Masuk ke menu **Brand** melalui sidebar
- Tambahkan data brand produk

### 3️⃣ Menambahkan Produk
Setelah kategori dan brand tersedia:
- Masuk ke menu **Produk**
- Isi form data produk yang meliputi:
- Nama produk
- Harga
- Stok
- Kategori (relasi)
- Brand (relasi)
- Deskripsi
- **Upload foto produk**

Produk yang ditambahkan akan langsung muncul di halaman user.

---

## 👥 Halaman User
Halaman user menampilkan **katalog produk** yang telah ditambahkan oleh admin.

### 🛍️ Fitur User
- Melihat daftar produk
- Melihat detail produk
- Menambahkan produk ke **Cart (Keranjang)**

⚠️ **Catatan Penting**  
Jika user ingin menambahkan produk ke cart:
- User **HARUS login terlebih dahulu**
- Jika belum memiliki akun → lakukan **Register**

---

## 🧾 Sistem Cart
- User dapat menambahkan produk ke cart
- Mengatur jumlah (qty)
- Menghapus produk dari cart
- Melihat total belanja

---

## ⚙️ Instalasi & Konfigurasi

### 📌 Persyaratan
- XAMPP / Laragon / DBMS lain yang mendukung PHP & MySQL
- Web browser (Chrome / Firefox)
- Git (opsional)

---

### 📂 Langkah Instalasi

1. **Clone repository**
2. Pindahkan folder project ke htdocs (xampp/htdocs/tugas_akhir) Nama folder project HARUS: tugas_akhir Karena banyak path dan direktori dalam sistem menggunakan nama tersebut.

🗄️ Setup Database

1.Jalankan XAMPP

2.Aktifkan Apache dan MySQL

2.Buka phpMyAdmin

3.Buat database baru (nama bebas), contoh: toko_elektronik
4. Import file SQL:

File SQL sudah tersedia di dalam project

Import melalui phpMyAdmin → Import → pilih file .sql


🔧 Konfigurasi Database

Setelah database dibuat, buka file berikut:
/database/connect.php
$db_name = "toko_elektronik"; // sesuaikan dengan database kamu
▶️ Menjalankan Aplikasi

Buka browser dan akses:

http://localhost/tugas_akhir

📁 Teknologi yang Digunakan

PHP Native

MySQL

Bootstrap 5

HTML & CSS

JavaScript (basic)

📌 Catatan Tambahan

Pastikan folder upload gambar memiliki permission write

Disarankan menggunakan browser terbaru

Struktur MVC sederhana (Model, Controller, View)

