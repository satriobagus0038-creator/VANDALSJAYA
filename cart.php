<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Vandals Jaya</title>
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
                    <li><a href="products.php">Produk</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="contact.php">Kontak</a></li>
                    <li><a href="cart.php" class="active"><i class="fas fa-shopping-cart"></i> <span class="cart-count">0</span></a></li>
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
        <h1>Keranjang Belanja</h1>
        <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <span>Keranjang</span>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="container">
            <div id="emptyCart" style="display: none; text-align: center; padding: 60px 20px;">
                <i class="fas fa-shopping-cart" style="font-size: 80px; color: var(--text-light); margin-bottom: 20px;"></i>
                <h2 style="color: var(--primary-color); margin-bottom: 10px;">Keranjang Belanja Kosong</h2>
                <p style="color: var(--text-light); margin-bottom: 30px;">Belum ada produk di keranjang Anda. Yuk mulai belanja!</p>
                <a href="products.php" class="btn btn-primary">
                    <i class="fas fa-shopping-bag"></i> Mulai Belanja
                </a>
            </div>

            <div id="cartContent" style="display: none;">
                <div class="cart-container">
                    <div class="cart-items">
                        <h2 style="margin-bottom: 30px;">Produk di Keranjang</h2>
                        <div id="cartItemsList"></div>
                    </div>

                    <div class="cart-summary">
                        <h3>Ringkasan Belanja</h3>
                        <div class="summary-row">
                            <span>Subtotal (<span id="totalItems">0</span> produk)</span>
                            <span id="subtotalPrice">Rp 0</span>
                        </div>
                        <div class="summary-row">
                            <span>Ongkos Kirim</span>
                            <span id="shippingCost">Rp 0</span>
                        </div>
                        <div class="summary-divider"></div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="totalPrice">Rp 0</span>
                        </div>
                        <button onclick="proceedToCheckout()" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 16px; margin-top: 20px;">
                            <i class="fas fa-credit-card"></i> Lanjut ke Pembayaran
                        </button>
                        <a href="products.php" class="btn btn-outline" style="width: 100%; padding: 15px; text-align: center; display: block; margin-top: 10px;">
                            <i class="fas fa-arrow-left"></i> Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
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
    <script>
        // Load and display cart
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const emptyCart = document.getElementById('emptyCart');
            const cartContent = document.getElementById('cartContent');
            const cartItemsList = document.getElementById('cartItemsList');

            if (cart.length === 0) {
                emptyCart.style.display = 'block';
                cartContent.style.display = 'none';
                return;
            }

            emptyCart.style.display = 'none';
            cartContent.style.display = 'block';

            let subtotal = 0;
            let html = '';

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;

                html += `
                    <div class="cart-item" style="animation: slideInUp 0.5s ease-out; animation-delay: ${index * 0.1}s; animation-fill-mode: both;">
                        <img src="${item.image}" alt="${item.name}">
                        <div class="cart-item-info">
                            <h4>${item.name}</h4>
                            <p style="color: var(--text-light); font-size: 14px;">Harga: Rp ${item.price.toLocaleString('id-ID')}</p>
                        </div>
                        <div class="cart-item-quantity">
                            <button onclick="updateQuantity(${index}, -1)" class="qty-btn">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="qty-value">${item.quantity}</span>
                            <button onclick="updateQuantity(${index}, 1)" class="qty-btn">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="cart-item-price">
                            <strong>Rp ${itemTotal.toLocaleString('id-ID')}</strong>
                        </div>
                        <button onclick="removeFromCart(${index})" class="cart-item-remove">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
            });

            cartItemsList.innerHTML = html;

            // Calculate shipping (free if > 200k)
            const shipping = subtotal >= 200000 ? 0 : 15000;
            const total = subtotal + shipping;

            document.getElementById('totalItems').textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('subtotalPrice').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            document.getElementById('shippingCost').textContent = shipping === 0 ? 'GRATIS' : 'Rp ' + shipping.toLocaleString('id-ID');
            document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        function updateQuantity(index, change) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart[index].quantity += change;

            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
            updateCartCount();
        }

        function removeFromCart(index) {
            if (confirm('Hapus produk ini dari keranjang?')) {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                loadCart();
                updateCartCount();
                showNotification('Produk dihapus dari keranjang');
            }
        }

        function proceedToCheckout() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert('Keranjang belanja kosong!');
                return;
            }
            window.location.href = 'checkout.php';
        }

        // Load cart on page load
        loadCart();
    </script>
</body>
</html>
