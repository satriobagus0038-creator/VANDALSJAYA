# 🚀 Panduan Hosting Website Vandals Jaya

Panduan lengkap untuk meng-hosting website Vandals Jaya ke internet.

---

## 📋 Pilihan Hosting

### 1. **Shared Hosting** (Paling Mudah & Murah)
**Cocok untuk:** Pemula, toko online kecil-menengah

**Rekomendasi Provider Indonesia:**
- **Niagahoster** - Mulai Rp 10.000/bulan
- **Hostinger** - Mulai Rp 15.000/bulan
- **Rumahweb** - Mulai Rp 20.000/bulan
- **IDCloudHost** - Mulai Rp 15.000/bulan

**Fitur yang Dibutuhkan:**
- ✅ PHP 7.4 atau lebih baru
- ✅ MySQL Database
- ✅ cPanel/Plesk
- ✅ SSL Certificate (gratis dari Let's Encrypt)
- ✅ Minimal 1GB storage

### 2. **VPS (Virtual Private Server)**
**Cocok untuk:** Toko online besar, lebih dari 1000 pengunjung/hari

**Rekomendasi:**
- DigitalOcean (mulai $5/bulan)
- Vultr (mulai $5/bulan)
- AWS Lightsail (mulai $3.5/bulan)

### 3. **Hosting Gratis** (Untuk Testing)
**Provider:**
- InfinityFree.net
- 000webhost.com
- Byet.host

**⚠️ Catatan:** Hosting gratis punya batasan dan tidak cocok untuk bisnis serius.

---

## 🔧 Langkah-Langkah Hosting (Shared Hosting)

### **TAHAP 1: Persiapan File**

#### 1.1 Zip Semua File Website
```
Di folder C:\xampp\htdocs\VANDALJAYA\
- Pilih semua file KECUALI folder FOTO
- Klik kanan → Send to → Compressed (zipped) folder
- Nama: vandals-jaya.zip
```

**File yang harus di-zip:**
- ✅ index.php
- ✅ products.php
- ✅ about.php
- ✅ contact.php
- ✅ cart.php
- ✅ checkout.php
- ✅ styles.css
- ✅ script.js
- ✅ config.php
- ✅ folder api/
- ✅ folder admin/
- ❌ FOTO/ (tidak perlu, karena pakai Unsplash)

#### 1.2 Backup Database
```
1. Buka phpMyAdmin (http://localhost/phpmyadmin)
2. Klik database "vandals_jaya"
3. Klik tab "Export" di atas
4. Pilih "Quick" export method
5. Format: SQL
6. Klik "Go"
7. Save file: vandals_jaya.sql
```

---

### **TAHAP 2: Beli & Setup Hosting**

#### 2.1 Beli Hosting (Contoh: Niagahoster)
```
1. Kunjungi https://niagahoster.co.id
2. Pilih paket "Bayi" atau "Pelajar" (cukup untuk mulai)
3. Pilih nama domain:
   - Opsi 1: Beli domain baru (vandalsjaya.com) - Rp 150.000/tahun
   - Opsi 2: Pakai subdomain gratis (vandalsjaya.niagaspace.com)
4. Lanjutkan pembayaran
5. Cek email untuk detail login cPanel
```

#### 2.2 Login ke cPanel
```
1. Buka email dari hosting provider
2. Cari link cPanel: https://cpanel.domainanda.com
3. Login dengan username & password dari email
```

---

### **TAHAP 3: Upload File Website**

#### 3.1 Upload via File Manager (Mudah)
```
1. Di cPanel, cari "File Manager"
2. Masuk ke folder "public_html"
3. Hapus semua file default (index.html, dll)
4. Klik "Upload" di toolbar
5. Pilih file vandals-jaya.zip
6. Tunggu upload selesai
7. Kembali ke File Manager
8. Klik kanan vandals-jaya.zip → Extract
9. Pindahkan semua file dari folder hasil extract ke public_html
10. Hapus file .zip dan folder kosong
```

#### 3.2 Upload via FTP (Alternatif)
```
1. Download FileZilla (https://filezilla-project.org)
2. Buka FileZilla
3. Masukkan:
   - Host: ftp.domainanda.com
   - Username: (dari email hosting)
   - Password: (dari email hosting)
   - Port: 21
4. Klik "Quickconnect"
5. Drag & drop semua file ke folder /public_html/
```

---

### **TAHAP 4: Setup Database**

#### 4.1 Buat Database MySQL
```
1. Di cPanel, cari "MySQL Databases"
2. Buat database baru:
   - Database Name: vandaljaya_db
   - Klik "Create Database"
3. Buat user database:
   - Username: vandaljaya_user
   - Password: [buat password kuat]
   - Klik "Create User"
4. Tambahkan user ke database:
   - Pilih user: vandaljaya_user
   - Pilih database: vandaljaya_db
   - Centang "ALL PRIVILEGES"
   - Klik "Make Changes"
```

**📝 CATAT:**
- Database name: `[username]_vandaljaya_db`
- Database user: `[username]_vandaljaya_user`
- Database password: `[password yang Anda buat]`
- Database host: `localhost` (biasanya)

#### 4.2 Import Database
```
1. Di cPanel, cari "phpMyAdmin"
2. Klik database yang baru dibuat
3. Klik tab "Import"
4. Klik "Choose File"
5. Pilih file vandals_jaya.sql
6. Scroll ke bawah, klik "Go"
7. Tunggu hingga selesai (muncul pesan sukses)
```

---

### **TAHAP 5: Konfigurasi Website**

#### 5.1 Edit File config.php
```
1. Di cPanel File Manager, buka public_html
2. Klik kanan config.php → Edit
3. Ubah koneksi database:
```

**SEBELUM (localhost):**
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vandals_jaya";
```

**SESUDAH (hosting):**
```php
<?php
$servername = "localhost";
$username = "vandaljaya_user";  // Ganti dengan user database Anda
$password = "password_anda";     // Ganti dengan password database Anda
$database = "vandaljaya_db";     // Ganti dengan nama database Anda
```

**Catatan:** Nama lengkap biasanya ada prefix username hosting, contoh:
- Database: `u123456_vandaljaya_db`
- User: `u123456_vandaljaya_user`

#### 5.2 Simpan & Test
```
1. Klik "Save Changes"
2. Buka browser
3. Akses: http://domainanda.com
4. Website seharusnya sudah online! 🎉
```

---

### **TAHAP 6: Aktifkan SSL (HTTPS) - GRATIS**

#### 6.1 Install SSL Certificate
```
1. Di cPanel, cari "SSL/TLS Status"
2. Centang domain Anda
3. Klik "Run AutoSSL"
4. Tunggu 2-5 menit
```

#### 6.2 Force HTTPS (Redirect otomatis)
```
1. Di File Manager, buka public_html
2. Cari file ".htaccess" (centang "Show Hidden Files" jika tidak terlihat)
3. Edit file .htaccess
4. Tambahkan di PALING ATAS:
```

```apache
# Force HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

**Jika file .htaccess belum ada, buat file baru:**
```
1. Klik "New File"
2. Nama: .htaccess
3. Paste kode di atas
4. Save
```

---

## 🎯 Checklist Setelah Hosting

### ✅ Test Semua Fitur:
- [ ] Homepage loading dengan benar
- [ ] Menu navigasi berfungsi
- [ ] Halaman Products menampilkan produk
- [ ] Live search berfungsi
- [ ] Form contact berfungsi
- [ ] Cart bisa menambah produk
- [ ] Checkout form berfungsi
- [ ] Database menyimpan data dengan benar

### ✅ Keamanan:
- [ ] SSL Certificate aktif (https://)
- [ ] Password database kuat
- [ ] File config.php tidak bisa diakses langsung
- [ ] Folder admin dilindungi password

### ✅ Performance:
- [ ] Website loading cepat (< 3 detik)
- [ ] Gambar sudah dioptimasi
- [ ] Enable caching di cPanel

---

## 🔒 Keamanan Tambahan

### 1. Proteksi Folder Admin
**Buat file .htaccess di folder admin/**
```apache
AuthType Basic
AuthName "Area Admin - Login Required"
AuthUserFile /home/username/.htpasswds
Require valid-user
```

**Buat password:**
```
1. Di cPanel, cari "Directory Privacy"
2. Pilih folder "admin"
3. Centang "Password protect this directory"
4. Buat username & password admin
```

### 2. Backup Rutin
```
1. Di cPanel, cari "Backup Wizard"
2. Pilih "Backup" → "Full Backup"
3. Pilih "Home Directory"
4. Email notification: [email Anda]
5. Download backup setiap minggu
```

### 3. Update PHP Version
```
1. Di cPanel, cari "Select PHP Version"
2. Pilih PHP 7.4 atau 8.0
3. Klik "Set as current"
```

---

## 📊 Monitoring Website

### Google Analytics (GRATIS)
```
1. Daftar di https://analytics.google.com
2. Buat property baru
3. Copy tracking code
4. Paste di semua halaman sebelum </head>
```

### Google Search Console
```
1. Daftar di https://search.google.com/search-console
2. Tambahkan domain Anda
3. Verifikasi kepemilikan
4. Submit sitemap
```

---

## 💰 Estimasi Biaya Tahunan

### Paket Hemat (Recommended untuk Mulai):
```
- Domain (.com): Rp 150.000/tahun
- Hosting Shared: Rp 120.000/tahun (Rp 10.000/bulan)
- SSL Certificate: GRATIS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
TOTAL: Rp 270.000/tahun (~Rp 22.500/bulan)
```

### Paket Pro (Untuk Toko Ramai):
```
- Domain (.com): Rp 150.000/tahun
- Hosting Premium: Rp 600.000/tahun
- SSL Certificate: GRATIS
- CDN Cloudflare: GRATIS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
TOTAL: Rp 750.000/tahun (~Rp 62.500/bulan)
```

---

## 🆘 Troubleshooting

### ❌ Website Tidak Muncul
```
✅ Cek apakah file sudah di folder public_html (bukan subfolder)
✅ Cek apakah ada file index.php
✅ Tunggu 5-10 menit untuk DNS propagation
✅ Clear browser cache (Ctrl + F5)
```

### ❌ Database Connection Error
```
✅ Cek config.php - pastikan username, password, database benar
✅ Pastikan user sudah ditambahkan ke database dengan ALL PRIVILEGES
✅ Cek apakah database sudah di-import
✅ Gunakan "localhost" sebagai servername
```

### ❌ 500 Internal Server Error
```
✅ Cek PHP version (harus 7.4+)
✅ Cek file .htaccess - mungkin ada syntax error
✅ Cek error log di cPanel → "Error Log"
✅ Pastikan permission file benar (644 untuk file, 755 untuk folder)
```

### ❌ Images Tidak Muncul
```
✅ Pastikan URL Unsplash masih valid
✅ Cek apakah website bisa akses internet
✅ Ganti dengan gambar lokal jika perlu
```

---

## 📞 Support Hosting

### Niagahoster:
- Live Chat: https://niagahoster.co.id
- WhatsApp: 0804-1-808-888
- Email: cs@niagahoster.co.id

### Hostinger:
- Live Chat: https://hostinger.co.id
- Email: support@hostinger.co.id

### Rumahweb:
- Telepon: (021) 2212-3396
- Live Chat: https://rumahweb.com

---

## 🎓 Tips Tambahan

### 1. Optimasi Kecepatan
```
- Aktifkan Gzip Compression di cPanel
- Enable Browser Caching
- Gunakan CDN (Cloudflare gratis)
- Compress images sebelum upload
```

### 2. SEO Friendly
```
- Submit sitemap.xml ke Google
- Gunakan meta description di setiap halaman
- Optimasi title tag
- Gunakan alt text pada gambar
```

### 3. Marketing
```
- Daftarkan di Google My Business
- Buat akun Instagram untuk toko
- Share link di WhatsApp Status
- Join grup komunitas fashion
```

---

## 📌 Domain Alternatif (Jika Budget Terbatas)

### Subdomain Gratis dari Hosting:
```
- vandalsjaya.niagaspace.com (Niagahoster)
- vandalsjaya.unaux.com (InfinityFree)
- vandalsjaya.000webhostapp.com (000webhost)
```

### Domain Murah Indonesia:
```
- .my.id - Rp 12.000/tahun
- .web.id - Rp 25.000/tahun
- .id - Rp 200.000/tahun
```

---

## ✅ Kesimpulan

Langkah-langkah hosting website Vandals Jaya:

1. **Persiapan** - Zip file & backup database
2. **Beli Hosting** - Pilih provider (Niagahoster recommended)
3. **Upload** - Via File Manager atau FTP
4. **Database** - Buat database & import SQL
5. **Konfigurasi** - Edit config.php dengan data hosting
6. **SSL** - Aktifkan HTTPS gratis
7. **Testing** - Cek semua fitur berfungsi

**Total waktu: 30-60 menit**
**Biaya: Mulai dari Rp 22.500/bulan**

---

## 📧 Butuh Bantuan?

Jika ada yang kurang jelas atau butuh bantuan:
1. Hubungi support hosting provider Anda
2. Tanyakan di forum hosting Indonesia
3. Join grup Facebook "Web Developer Indonesia"

**Selamat meng-hosting website Anda! 🚀**

---

*Terakhir diupdate: 12 Januari 2026*
