<?php
// Include database configuration
require_once 'config.php';

// Get filter parameters
$category = isset($_GET['category']) ? $_GET['category'] : '';
$condition = isset($_GET['condition']) ? $_GET['condition'] : '';
$min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 10000000;
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Build query
$sql = "SELECT p.*, c.name as category_name, c.slug as category_slug 
        FROM products p 
        JOIN categories c ON p.category_id = c.id 
        WHERE p.is_active = 1";

// Apply filters
if (!empty($category)) {
    $category = $conn->real_escape_string($category);
    $sql .= " AND c.slug = '$category'";
}

if (!empty($condition)) {
    $condition = $conn->real_escape_string($condition);
    $sql .= " AND p.condition_status = '$condition'";
}

if ($min_price > 0 || $max_price < 10000000) {
    $sql .= " AND p.price BETWEEN $min_price AND $max_price";
}

if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $sql .= " AND (p.name LIKE '%$search%' OR p.description LIKE '%$search%' OR p.brand LIKE '%$search%')";
}

$sql .= " ORDER BY p.created_at DESC";

$result = $conn->query($sql);

// Get all categories for filter
$categories_sql = "SELECT * FROM categories ORDER BY id";
$categories_result = $conn->query($categories_sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Vandals Jaya</title>
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
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="products.php" class="active">Produk</a></li>
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

    <!-- Page Header -->
    <section class="page-header">
        <h1>Katalog Produk</h1>
        <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <span>Produk</span>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="products-container">
                <!-- Filters Sidebar -->
                <aside class="filters-sidebar">
                    <h2>Filter Produk</h2>
                    
                    <form method="GET" action="products.php" id="filterForm">
                        <div class="filter-group">
                            <h3>Kategori</h3>
                            <?php
                            if ($categories_result && $categories_result->num_rows > 0):
                                while ($cat = $categories_result->fetch_assoc()):
                                    $checked = ($category == $cat['slug']) ? 'checked' : '';
                            ?>
                            <div class="filter-option">
                                <input type="radio" id="cat-<?php echo $cat['slug']; ?>" 
                                       name="category" value="<?php echo $cat['slug']; ?>" 
                                       <?php echo $checked; ?> onchange="this.form.submit()">
                                <label for="cat-<?php echo $cat['slug']; ?>"><?php echo htmlspecialchars($cat['name']); ?></label>
                            </div>
                            <?php 
                                endwhile;
                            endif;
                            ?>
                            <?php if (!empty($category)): ?>
                            <div class="filter-option">
                                <input type="radio" id="cat-all" name="category" value="" onchange="this.form.submit()">
                                <label for="cat-all"><strong>Semua Kategori</strong></label>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="filter-group">
                            <h3>Kondisi</h3>
                            <div class="filter-option">
                                <input type="radio" id="cond-new" name="condition" value="Seperti Baru" 
                                       <?php echo ($condition == 'Seperti Baru') ? 'checked' : ''; ?> onchange="this.form.submit()">
                                <label for="cond-new">Seperti Baru</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="cond-excellent" name="condition" value="Excellent" 
                                       <?php echo ($condition == 'Excellent') ? 'checked' : ''; ?> onchange="this.form.submit()">
                                <label for="cond-excellent">Excellent</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="cond-good" name="condition" value="Baik" 
                                       <?php echo ($condition == 'Baik') ? 'checked' : ''; ?> onchange="this.form.submit()">
                                <label for="cond-good">Baik</label>
                            </div>
                            <?php if (!empty($condition)): ?>
                            <div class="filter-option">
                                <input type="radio" id="cond-all" name="condition" value="" onchange="this.form.submit()">
                                <label for="cond-all"><strong>Semua Kondisi</strong></label>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="filter-group">
                            <h3>Rentang Harga</h3>
                            <div class="price-range">
                                <input type="number" name="min_price" id="minPrice" placeholder="Min" 
                                       value="<?php echo $min_price > 0 ? $min_price : ''; ?>" min="0" step="10000">
                                <span>-</span>
                                <input type="number" name="max_price" id="maxPrice" placeholder="Max" 
                                       value="<?php echo $max_price < 10000000 ? $max_price : ''; ?>" min="0" step="10000">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">
                                <i class="fas fa-filter"></i> Terapkan Harga
                            </button>
                        </div>

                        <?php if (!empty($category) || !empty($condition) || $min_price > 0 || $max_price < 10000000): ?>
                        <a href="products.php" class="btn btn-outline" style="width: 100%; text-align: center; display: block;">
                            <i class="fas fa-times"></i> Reset Filter
                        </a>
                        <?php endif; ?>
                    </form>
                </aside>

                <!-- Products Main -->
                <div class="products-main">
                    <div class="products-toolbar">
                        <div class="search-box">
                            <form method="GET" action="products.php" id="searchForm">
                                <?php if (!empty($category)): ?>
                                <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>" id="hiddenCategory">
                                <?php endif; ?>
                                <?php if (!empty($condition)): ?>
                                <input type="hidden" name="condition" value="<?php echo htmlspecialchars($condition); ?>" id="hiddenCondition">
                                <?php endif; ?>
                                <input type="text" name="search" id="searchInput" placeholder="Cari produk... (ketik untuk mencari langsung)" 
                                       value="<?php echo htmlspecialchars($search); ?>" autocomplete="off">
                            </form>
                        </div>
                        <div class="sort-options">
                            <span style="margin-right: 10px; color: var(--text-light);" id="productCount">
                                <?php echo $result->num_rows; ?> Produk Ditemukan
                            </span>
                        </div>
                    </div>

                    <div class="products-grid" id="productsGrid">
                        <?php
                        if ($result && $result->num_rows > 0):
                            while ($product = $result->fetch_assoc()):
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
                        <div class="product-card" data-category="<?php echo strtolower($product['category_name']); ?>">
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
                                <?php if (!empty($product['brand'])): ?>
                                <p class="product-condition">Brand: <?php echo htmlspecialchars($product['brand']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($product['size'])): ?>
                                <p class="product-condition">Size: <?php echo htmlspecialchars($product['size']); ?></p>
                                <?php endif; ?>
                                <div class="product-price">
                                    <span class="price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></span>
                                    <span class="original-price">Rp <?php echo number_format($product['original_price'], 0, ',', '.'); ?></span>
                                </div>
                                <?php if ($product['stock'] > 0): ?>
                                <button class="btn btn-add-cart" onclick="addToCart(<?php echo $product['id']; ?>)">
                                    <i class="fas fa-shopping-cart"></i> Tambah ke Keranjang
                                </button>
                                <?php else: ?>
                                <button class="btn btn-add-cart" disabled style="background: #95a5a6;">
                                    <i class="fas fa-times"></i> Stok Habis
                                </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php 
                            endwhile;
                        else:
                        ?>
                        <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                            <i class="fas fa-search" style="font-size: 64px; color: var(--text-light); margin-bottom: 20px;"></i>
                            <h3 style="color: var(--text-dark); margin-bottom: 10px;">Produk Tidak Ditemukan</h3>
                            <p style="color: var(--text-light); margin-bottom: 20px;">
                                Tidak ada produk yang sesuai dengan filter Anda. Silakan coba filter lain.
                            </p>
                            <a href="products.php" class="btn btn-primary">Lihat Semua Produk</a>
                        </div>
                        <?php endif; ?>
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
