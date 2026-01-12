# 🎨 Dokumentasi Animasi - Vandals Jaya

Website Vandals Jaya sekarang dilengkapi dengan berbagai animasi profesional untuk meningkatkan user experience.

## ✨ Daftar Animasi yang Ditambahkan

### 1. **Animasi Halaman Utama (index.php)**

#### Hero Section
- ✅ `fadeIn` - Hero section muncul dengan smooth fade
- ✅ `slideInDown` - Judul hero slide dari atas
- ✅ `slideInUp` - Deskripsi hero slide dari bawah

#### Category Cards
- ✅ `rotateIn` - Category card muncul dengan efek rotate
- ✅ Stagger animation - Setiap card muncul berurutan (delay 0.1s - 0.4s)
- ✅ Hover effect - Scale up + rotate image saat di-hover
- ✅ Shadow animation - Box-shadow berubah saat hover

#### Product Cards (Featured)
- ✅ `scaleIn` - Product card muncul dengan scale effect
- ✅ Stagger animation - Setiap card delay berbeda (0.1s - 0.8s)
- ✅ Hover: translateY(-10px) + scale(1.02)
- ✅ Image zoom: scale(1.15) + rotate(2deg) saat hover
- ✅ Title color change saat hover
- ✅ Price scale + text-shadow saat hover

#### Feature Boxes
- ✅ `fadeIn` animation saat load
- ✅ translateY(-10px) saat hover
- ✅ Icon pulse animation saat box di-hover

#### Newsletter Section
- ✅ Background shine animation (3s infinite)
- ✅ Title: slideInDown
- ✅ Description: slideInUp dengan delay
- ✅ Form: scaleIn dengan delay

### 2. **Animasi Halaman Produk (products.php)**

#### Page Header
- ✅ `fadeIn` - Header muncul smooth
- ✅ Title: slideInDown
- ✅ Breadcrumb: slideInUp dengan delay

#### Filter Sidebar
- ✅ `slideInLeft` - Sidebar muncul dari kiri
- ✅ Filter group hover: translateX(5px)

#### Product Grid
- ✅ Stagger animation untuk 8 produk pertama
- ✅ Semua animasi product card seperti homepage

#### Search & Sort
- ✅ Input focus: scale(1.02) + glow effect
- ✅ Select focus: blue glow effect

### 3. **Animasi Halaman Kontak (contact.php)**

#### Contact Info Cards
- ✅ `scaleIn` animation dengan stagger (0.1s - 0.4s)
- ✅ Hover: translateY(-10px) + scale(1.05)
- ✅ Icon bounce animation saat hover

#### Contact Form
- ✅ Form container: scaleIn
- ✅ Form groups: slideInUp dengan stagger delay
- ✅ Input focus: translateY(-2px) + blue shadow glow
- ✅ Textarea focus: sama seperti input

#### FAQ Section
- ✅ Card animation mengikuti testimonial style

### 4. **Animasi Halaman About (about.php)**

#### About Content
- ✅ Text heading: slideInLeft
- ✅ Paragraphs: fadeIn
- ✅ Images: slideInRight
- ✅ Image hover: scale(1.05) + rotate(2deg)

#### Values/Mission Grid
- ✅ `scaleIn` dengan stagger animation
- ✅ Hover: translateY(-10px)
- ✅ Icon pulse saat card hover

#### Team Cards
- ✅ Mengikuti testimonial animation
- ✅ Stagger delay (0.1s - 0.3s)

#### Statistics Cards
- ✅ Same animation as value cards

### 5. **Animasi Global**

#### Navigation
- ✅ Link hover: color change + underline animation (width: 0 → 100%)
- ✅ Hamburger menu: transform animation untuk icon
- ✅ Mobile menu: slide dari kiri dengan transition

#### Buttons
- ✅ Ripple effect: lingkaran putih transparan dari center
- ✅ Hover: translateY(-3px) + scale(1.05)
- ✅ Box-shadow enhancement saat hover

#### Social Media Links
- ✅ Top bar: translateY(-3px) + scale(1.2) saat hover
- ✅ Footer: rotate(360deg) + translateY(-5px) + glow shadow

#### Cart Badge
- ✅ Pulse animation (infinite)
- ✅ Box-shadow pulse effect

#### Testimonials
- ✅ Stagger animation (0.1s - 0.3s)
- ✅ Hover: translateY(-5px)

#### Product Badge
- ✅ `bounceIn` animation saat muncul

#### Section Titles
- ✅ `fadeIn` animation
- ✅ Underline: scaleIn dengan delay

## 🎬 Keyframe Animations Tersedia

```css
@keyframes fadeIn
@keyframes slideInDown
@keyframes slideInUp
@keyframes slideInLeft
@keyframes slideInRight
@keyframes scaleIn
@keyframes bounceIn
@keyframes pulse
@keyframes shake
@keyframes rotateIn
@keyframes shine
@keyframes cartPulse
```

## ⚡ Performance Tips

1. **Smooth Scroll**: Ditambahkan `scroll-behavior: smooth` pada HTML
2. **Hardware Acceleration**: Menggunakan transform untuk performa lebih baik
3. **Animation Fill Mode**: Menggunakan `animation-fill-mode: both` untuk mencegah flash
4. **Stagger Delays**: Memberikan efek cascading yang menarik
5. **Hover Transitions**: Semua transisi menggunakan `ease` atau `ease-in-out`

## 🎯 Timing Functions

- **ease-out**: Untuk entrance animations (scaleIn, slideIn, etc)
- **ease-in-out**: Untuk hover effects dan transitions
- **ease**: Untuk animasi global
- **infinite**: Untuk pulse, shine, dan continuous animations

## 📱 Responsive Animations

Semua animasi tetap berfungsi dengan baik di mobile devices. Tidak ada animasi yang di-disable untuk mobile kecuali navigation menu transformation.

## 🚀 Browser Support

Semua animasi menggunakan CSS3 standar yang didukung oleh:
- ✅ Chrome/Edge (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Opera (latest)

## 💡 Tips Penggunaan

1. Animasi akan otomatis berjalan saat halaman dimuat
2. Hover effects akan aktif saat kursor di atas elemen
3. Stagger animations memberikan efek professional cascading
4. Semua animasi smooth dan tidak mengganggu user experience
5. Form inputs memiliki animasi focus untuk better UX

---

**Dibuat dengan ❤️ untuk Vandals Jaya**
*Professional Secondhand Clothing Store*
