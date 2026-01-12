<?php
// Include database configuration
require_once 'config.php';

// Get featured products from database
$featured_sql = "SELECT p.*, c.name as category_name, c.slug as category_slug 
                 FROM products p 
                 JOIN categories c ON p.category_id = c.id 
                 WHERE p.is_active = 1 AND p.is_featured = 1 
                 ORDER BY p.rating DESC 
                 LIMIT 4";
$featured_result = $conn->query($featured_sql);

// Get categories
$categories_sql = "SELECT * FROM categories ORDER BY id";
$categories_result = $conn->query($categories_sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vandals Jaya - Toko Online Baju Bekas Berkualitas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="contact-info">
                    <span><i class="fas fa-phone"></i> +62 812-3456-7890</span>
                    <span><i class="fas fa-envelope"></i> info@vandalsjaya.com</span>
                </div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <h1>VANDALS JAYA</h1>
                    <p>Premium Second-Hand Fashion</p>
                </div>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="index.php" class="active">Beranda</a></li>
                    <li><a href="products.php">Produk</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="contact.php">Kontak</a></li>
                    <li><a href="#" class="cart-link"><i class="fas fa-shopping-cart"></i> <span class="cart-count">0</span></a></li>
                </ul>
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Temukan Fashion Berkualitas dengan Harga Terjangkau</h2>
            <p>Koleksi baju bekas pilihan dengan kualitas terbaik, hanya di Vandals Jaya</p>
            <a href="products.php" class="btn btn-primary">Belanja Sekarang</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="feature-box">
                <i class="fas fa-shield-alt"></i>
                <h3>Kualitas Terjamin</h3>
                <p>Semua produk sudah melalui quality control ketat</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-truck"></i>
                <h3>Pengiriman Cepat</h3>
                <p>Gratis ongkir untuk pembelian di atas Rp 200.000</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-sync-alt"></i>
                <h3>Garansi Return</h3>
                <p>7 hari garansi return jika tidak sesuai</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-headset"></i>
                <h3>Customer Support 24/7</h3>
                <p>Tim kami siap membantu kapan saja</p>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2 class="section-title">Kategori Produk</h2>
            <div class="category-grid">
                <?php
                // Reset pointer for categories
                $categories_result->data_seek(0);
                $category_images = [
                    'kaos' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400',
                    'kemeja' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=400',
                    'jaket' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=400',
                    'celana' => 'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?w=400'
                ];
                
                while ($category = $categories_result->fetch_assoc()):
                    $image = $category_images[$category['slug']] ?? 'https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?w=400';
                ?>
                <div class="category-card">
                    <img src="<?php echo $image; ?>" alt="<?php echo htmlspecialchars($category['name']); ?>">
                    <div class="category-overlay">
                        <h3><?php echo htmlspecialchars($category['name']); ?></h3>
                        <a href="products.php?category=<?php echo $category['slug']; ?>" class="btn btn-secondary">Lihat Produk</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
        <div class="container">
            <h2 class="section-title">Produk Pilihan</h2>
            <div class="products-grid" id="featuredProducts">
                <?php
                if ($featured_result && $featured_result->num_rows > 0):
                    while ($product = $featured_result->fetch_assoc()):
                        // Calculate star rating
                        $rating = (float)$product['rating'];
                        $full_stars = floor($rating);
                        $half_star = ($rating - $full_stars) >= 0.5;
                        $empty_stars = 5 - ceil($rating);
                        
                        // Determine badge
                        $badge = '';
                        if ($product['rating'] >= 4.8) {
                            $badge = '<div class="product-badge">Best Seller</div>';
                        } elseif ($product['stock'] <= 2) {
                            $badge = '<div class="product-badge new">Limited</div>';
                        }
                ?>
                <div class="product-card">
                    <?php echo $badge; ?>
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <div class="product-rating">
                            <?php
                            // Full stars
                            for ($i = 0; $i < $full_stars; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                            // Half star
                            if ($half_star) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            }
                            // Empty stars
                            for ($i = 0; $i < $empty_stars; $i++) {
                                echo '<i class="far fa-star"></i>';
                            }
                            ?>
                            <span>(<?php echo number_format($rating, 1); ?>)</span>
                        </div>
                        <p class="product-condition">Kondisi: <?php echo htmlspecialchars($product['condition_status']); ?></p>
                        <div class="product-price">
                            <span class="price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></span>
                            <span class="original-price">Rp <?php echo number_format($product['original_price'], 0, ',', '.'); ?></span>
                        </div>
                        <button class="btn btn-add-cart" onclick="addToCart(<?php echo $product['id']; ?>)">
                            <i class="fas fa-shopping-cart"></i> Tambah ke Keranjang
                        </button>
                    </div>
                </div>
                <?php 
                    endwhile;
                else:
                ?>
                <p>Tidak ada produk featured saat ini.</p>
                <?php endif; ?>
            </div>
            <div class="text-center">
                <a href="products.php" class="btn btn-outline">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Apa Kata Mereka?</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"Baju-bajunya berkualitas banget! Kondisinya masih bagus seperti baru. Harganya juga sangat terjangkau. Pasti order lagi!"</p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/100?img=1" alt="Customer">
                        <div>
                            <h4>Andi Pratama</h4>
                            <span>Jakarta</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"Pelayanan ramah, pengiriman cepat. Bajunya sesuai dengan deskripsi dan foto. Sangat recommended!"</p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/100?img=5" alt="Customer">
                        <div>
                            <h4>Siti Nurhaliza</h4>
                            <span>Bandung</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>"Koleksinya banyak dan beragam. Saya sudah beberapa kali belanja di sini dan selalu puas!"</p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/100?img=3" alt="Customer">
                        <div>
                            <h4>Budi Santoso</h4>
                            <span>Surabaya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <h2>Dapatkan Promo Spesial!</h2>
            <p>Daftar newsletter dan dapatkan info promo terbaru langsung ke email Anda</p>
            <form class="newsletter-form" onsubmit="subscribeNewsletter(event)">
                <input type="email" placeholder="Masukkan email Anda" required>
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>VANDALS JAYA</h3>
                    <p>Toko online baju bekas berkualitas terpercaya sejak 2020. Kami menyediakan fashion second-hand pilihan dengan harga terjangkau.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <ul>
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="products.php">Produk</a></li>
                        <li><a href="about.php">Tentang Kami</a></li>
                        <li><a href="contact.php">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Kategori</h3>
                    <ul>
                        <li><a href="products.php?category=kaos">Kaos & T-Shirt</a></li>
                        <li><a href="products.php?category=kemeja">Kemeja</a></li>
                        <li><a href="products.php?category=jaket">Jaket & Hoodie</a></li>
                        <li><a href="products.php?category=celana">Celana</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <ul class="contact-list">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Raya Jakarta No. 123, Jakarta</li>
                        <li><i class="fas fa-phone"></i> +62 812-3456-7890</li>
                        <li><i class="fas fa-envelope"></i> info@vandalsjaya.com</li>
                        <li><i class="fas fa-clock"></i> Senin - Sabtu: 09.00 - 21.00</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Vandals Jaya. All Rights Reserved.</p>
                <div class="payment-methods">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fas fa-credit-card"></i>
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
<?php
$conn->close();
?>
