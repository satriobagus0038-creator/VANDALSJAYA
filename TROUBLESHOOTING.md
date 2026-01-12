# 🔧 Panduan Troubleshooting - Produk Tidak Muncul

## Langkah 1: Periksa Database

1. Buka browser dan akses: `http://localhost/VANDALJAYA/test_database.php`
2. Halaman ini akan menampilkan:
   - Status koneksi database
   - Jumlah produk yang ada
   - Daftar semua produk dengan foto
   - Test hasil pencarian

## Langkah 2: Insert Data Produk (Jika Belum Ada)

### Cara 1: Via phpMyAdmin
1. Buka `http://localhost/phpmyadmin`
2. Pilih database `vandals_jaya` di sidebar kiri
3. Klik tab **SQL** di atas
4. Buka file `insert_products.sql` di folder project
5. Copy semua isinya
6. Paste di kolom SQL query
7. Klik tombol **Go** atau **Kirim**
8. Akan muncul pesan "24 rows inserted"

### Cara 2: Via MySQL Command Line
```bash
cd C:\xampp\htdocs\VANDALJAYA
mysql -u root -p vandals_jaya < insert_products.sql
```

## Langkah 3: Periksa Apache & MySQL

1. Buka **XAMPP Control Panel**
2. Pastikan **Apache** dan **MySQL** berwarna HIJAU (Running)
3. Jika belum, klik tombol **Start**

## Langkah 4: Clear Browser Cache

1. Tekan `Ctrl + Shift + Delete` (Chrome/Edge)
2. Pilih "Cached images and files"
3. Klik "Clear data"
4. Refresh halaman dengan `Ctrl + F5`

## Langkah 5: Test Live Search

1. Buka `http://localhost/VANDALJAYA/products.php`
2. Ketik di search box: **kaos**
3. Produk dengan kata "kaos" harus muncul langsung
4. Ketik: **vintage**
5. Produk vintage harus muncul

### Jika Masih Tidak Muncul:

**Buka Console Browser:**
- Chrome/Edge: Tekan `F12` → Tab Console
- Lihat apakah ada error merah

**Periksa apakah produk ada di halaman:**
1. Tekan `F12` → Tab Elements/Inspector
2. Cari element dengan class `product-card`
3. Jika tidak ada, berarti database kosong

## Langkah 6: Periksa File Config

Buka `config.php`, pastikan:
```php
$host = "localhost";
$username = "root";
$password = ""; // Kosong untuk XAMPP default
$database = "vandals_jaya";
```

## Cara Kerja Live Search

1. **Input**: User mengetik di search box
2. **JavaScript**: Script menangkap input setiap 300ms
3. **Filter**: Produk di-filter berdasarkan:
   - Nama produk
   - Kondisi (Excellent, Baik, dll)
   - Kategori (kaos, kemeja, dll)
4. **Display**: Produk yang cocok ditampilkan dengan animasi

## Kata Kunci yang Bisa Dicoba

✅ **Kategori:**
- kaos
- kemeja  
- jaket
- celana
- hoodie

✅ **Brand:**
- Uniqlo
- Levis
- Supreme
- Zara
- H&M

✅ **Kondisi:**
- Seperti Baru
- Excellent
- Baik

✅ **Style:**
- vintage
- premium
- oversized
- polo
- denim

## Hasil yang Diharapkan

Ketik "kaos" → Harus muncul 6 produk kaos
Ketik "vintage" → Harus muncul 4+ produk dengan kata vintage
Ketik "premium" → Harus muncul produk dengan kata premium

## Troubleshooting Umum

### Problem: Database kosong
**Solusi**: Jalankan `insert_products.sql` di phpMyAdmin

### Problem: Gambar tidak muncul
**Solusi**: Pastikan koneksi internet aktif (gambar dari Unsplash)

### Problem: Search tidak bekerja
**Solusi**: 
1. Periksa Console (F12) untuk error JavaScript
2. Pastikan file `script.js` ter-load
3. Clear cache browser

### Problem: Produk muncul tapi tidak bisa dicari
**Solusi**: Periksa atribut `data-category` pada product-card

## Kontak Support

Jika masih ada masalah setelah mengikuti semua langkah:
1. Screenshot error di Console (F12)
2. Screenshot hasil dari test_database.php
3. Laporkan masalahnya

---
**Update terakhir**: 12 Januari 2026
