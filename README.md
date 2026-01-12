# Panduan Setup Database MySQL untuk Vandals Jaya

## 📋 Langkah-Langkah Setup

### 1. Persiapan XAMPP
- Pastikan XAMPP sudah terinstall
- Start Apache dan MySQL dari XAMPP Control Panel

### 2. Buat Database
Ada 2 cara:

#### Cara 1: Menggunakan phpMyAdmin (Recommended)
1. Buka browser, akses: `http://localhost/phpmyadmin`
2. Klik tab "SQL"
3. Copy seluruh isi file `database.sql`
4. Paste ke SQL editor
5. Klik "Go" atau tekan Ctrl+Enter

#### Cara 2: Import File SQL
1. Buka phpMyAdmin: `http://localhost/phpmyadmin`
2. Klik "New" untuk membuat database baru
3. Nama database: `vandals_jaya`
4. Klik "Create"
5. Pilih database `vandals_jaya`
6. Klik tab "Import"
7. Pilih file `database.sql`
8. Klik "Go"

### 3. Konfigurasi Database
File `config.php` sudah dikonfigurasi dengan setting default:
```php
DB_HOST = 'localhost'
DB_USER = 'root'
DB_PASS = ''  (kosong)
DB_NAME = 'vandals_jaya'
```

Jika setting MySQL Anda berbeda, edit file `config.php`.

### 4. Verifikasi Database
Setelah import berhasil, cek di phpMyAdmin:
- Database: `vandals_jaya`
- Tabel yang harus ada:
  - categories (4 baris)
  - products (12 baris)
  - customers
  - orders
  - order_items
  - newsletter_subscribers
  - contact_messages
  - reviews

## 📁 Struktur File Baru

```
VANDALJAYA/
├── config.php                 # Konfigurasi database
├── database.sql               # Script SQL untuk membuat database
├── index.html                 # Halaman utama
├── products.html              # Halaman produk
├── about.html                 # Halaman tentang
├── contact.html               # Halaman kontak
├── styles.css                 # Styling
├── script.js                  # JavaScript (sudah diupdate)
├── api/
│   ├── products.php          # API untuk get products dari DB
│   ├── contact.php           # Handler untuk contact form
│   ├── newsletter.php        # Handler untuk newsletter
│   └── admin/
│       ├── stats.php         # API untuk statistik admin
│       ├── save_product.php  # API untuk save/update product
│       └── delete_product.php # API untuk delete product
└── admin/
    ├── index.html            # Admin panel
    └── admin.js              # JavaScript admin
```

## 🚀 Cara Menggunakan

### 1. Akses Website
```
http://localhost/VANDALJAYA/index.html
```

### 2. Akses Admin Panel
```
http://localhost/VANDALJAYA/admin/index.html
```

Di admin panel Anda bisa:
- Lihat statistik (total produk, pesanan, pelanggan, pesan)
- Tambah produk baru
- Edit produk
- Hapus produk

### 3. Test Fitur

#### Test Contact Form
1. Buka: `http://localhost/VANDALJAYA/contact.html`
2. Isi form kontak
3. Submit
4. Cek di phpMyAdmin → `contact_messages` table

#### Test Newsletter
1. Di homepage atau halaman manapun, scroll ke section newsletter
2. Masukkan email
3. Submit
4. Cek di phpMyAdmin → `newsletter_subscribers` table

#### Test Products (Dynamic dari Database)
1. Buka: `http://localhost/VANDALJAYA/products.html`
2. Produk akan load dari database
3. Gunakan filter kategori, kondisi, harga
4. Gunakan search box
5. Gunakan sorting

## 🔧 Troubleshooting

### Error: Connection failed
- Pastikan MySQL running di XAMPP
- Cek username/password di `config.php`
- Cek nama database sudah benar

### Products tidak muncul
- Buka browser console (F12)
- Cek error di console
- Pastikan database sudah terisi data
- Test API: `http://localhost/VANDALJAYA/api/products.php?action=list`

### Form tidak submit
- Cek browser console untuk error
- Pastikan path API sudah benar
- Cek apakah tabel ada di database

## 📊 Struktur Database

### Table: products
- Menyimpan data produk
- 12 sample products sudah terisi
- Field penting: name, price, category_id, image_url, rating

### Table: categories
- 4 kategori: Kaos, Kemeja, Jaket, Celana

### Table: contact_messages
- Menyimpan pesan dari contact form
- Field: name, email, phone, subject, message

### Table: newsletter_subscribers
- Menyimpan email subscriber
- Auto-check duplikat

### Table: orders & order_items
- Untuk sistem pemesanan (belum diimplementasi)
- Siap untuk pengembangan selanjutnya

## 🎯 Next Steps

Untuk pengembangan lebih lanjut:
1. Implementasi login/register customer
2. Shopping cart dengan checkout
3. Payment gateway integration
4. Order management system
5. Email notification system
6. Admin authentication

## ⚠️ Catatan Penting

1. **Email Function**: Email function di `contact.php` dan `newsletter.php` di-comment. Uncomment jika sudah setup mail server.

2. **Security**: Untuk production, tambahkan:
   - Admin authentication
   - CSRF protection
   - Input validation lebih ketat
   - HTTPS

3. **Performance**: Untuk website dengan banyak produk, tambahkan:
   - Pagination
   - Image optimization
   - Caching

4. **Backup**: Selalu backup database secara berkala

## 📞 Support

Jika ada masalah, cek:
1. XAMPP Apache & MySQL sudah running
2. Database sudah dibuat dan terisi
3. File config.php settingnya benar
4. Browser console untuk error JavaScript
