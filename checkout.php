<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Vandals Jaya</title>
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
                    <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="cart-count">0</span></a></li>
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
        <h1>Checkout</h1>
        <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <a href="cart.php">Keranjang</a> / <span>Checkout</span>
        </div>
    </section>

    <!-- Checkout Section -->
    <section class="checkout-section">
        <div class="container">
            <div class="checkout-container">
                <!-- Checkout Form -->
                <div class="checkout-form">
                    <h2><i class="fas fa-shipping-fast"></i> Informasi Pengiriman</h2>
                    <form id="checkoutForm">
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="fullName" required placeholder="Masukkan nama lengkap">
                            </div>
                            <div class="form-group">
                                <label>No. Telepon *</label>
                                <input type="tel" name="phone" required placeholder="08xx-xxxx-xxxx">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="email@example.com">
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap *</label>
                            <textarea name="address" rows="3" required placeholder="Jalan, Nomor Rumah, RT/RW"></textarea>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label>Kota *</label>
                                <input type="text" name="city" required placeholder="Nama Kota">
                            </div>
                            <div class="form-group">
                                <label>Kode Pos *</label>
                                <input type="text" name="postalCode" required placeholder="12345">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Catatan Pesanan (Opsional)</label>
                            <textarea name="notes" rows="2" placeholder="Catatan untuk kurir atau penjual"></textarea>
                        </div>

                        <h2 style="margin-top: 40px;"><i class="fas fa-truck"></i> Metode Pengiriman</h2>
                        <div class="shipping-methods">
                            <label class="shipping-option">
                                <input type="radio" name="shipping" value="reguler" data-cost="15000" checked>
                                <div class="shipping-info">
                                    <div>
                                        <strong>JNE Reguler</strong>
                                        <p>Estimasi 3-5 hari kerja</p>
                                    </div>
                                    <span class="shipping-price">Rp 15.000</span>
                                </div>
                            </label>

                            <label class="shipping-option">
                                <input type="radio" name="shipping" value="express" data-cost="25000">
                                <div class="shipping-info">
                                    <div>
                                        <strong>JNE Express</strong>
                                        <p>Estimasi 1-2 hari kerja</p>
                                    </div>
                                    <span class="shipping-price">Rp 25.000</span>
                                </div>
                            </label>

                            <label class="shipping-option">
                                <input type="radio" name="shipping" value="instant" data-cost="35000">
                                <div class="shipping-info">
                                    <div>
                                        <strong>Instant Courier</strong>
                                        <p>Same day delivery (Jakarta only)</p>
                                    </div>
                                    <span class="shipping-price">Rp 35.000</span>
                                </div>
                            </label>

                            <label class="shipping-option">
                                <input type="radio" name="shipping" value="free" data-cost="0">
                                <div class="shipping-info">
                                    <div>
                                        <strong>Ambil di Toko</strong>
                                        <p>Gratis - Pick up di toko</p>
                                    </div>
                                    <span class="shipping-price">GRATIS</span>
                                </div>
                            </label>
                        </div>

                        <h2 style="margin-top: 40px;"><i class="fas fa-credit-card"></i> Metode Pembayaran</h2>
                        <div class="payment-methods-grid">
                            <label class="payment-option">
                                <input type="radio" name="payment" value="transfer" required>
                                <div class="payment-info">
                                    <i class="fas fa-university"></i>
                                    <span>Transfer Bank</span>
                                </div>
                            </label>

                            <label class="payment-option">
                                <input type="radio" name="payment" value="cod" required>
                                <div class="payment-info">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span>COD (Bayar di Tempat)</span>
                                </div>
                            </label>

                            <label class="payment-option">
                                <input type="radio" name="payment" value="ewallet" required>
                                <div class="payment-info">
                                    <i class="fas fa-wallet"></i>
                                    <span>E-Wallet</span>
                                </div>
                            </label>

                            <label class="payment-option">
                                <input type="radio" name="payment" value="credit" required>
                                <div class="payment-info">
                                    <i class="fas fa-credit-card"></i>
                                    <span>Kartu Kredit</span>
                                </div>
                            </label>
                        </div>

                        <div id="bankDetails" style="display: none; margin-top: 20px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                            <h4 style="margin-bottom: 15px;">Informasi Transfer Bank</h4>
                            <div style="background: white; padding: 15px; border-radius: 8px; margin-bottom: 10px;">
                                <strong>Bank BCA</strong><br>
                                No. Rek: <strong>1234567890</strong><br>
                                A/N: <strong>Vandals Jaya</strong>
                            </div>
                            <div style="background: white; padding: 15px; border-radius: 8px; margin-bottom: 10px;">
                                <strong>Bank Mandiri</strong><br>
                                No. Rek: <strong>0987654321</strong><br>
                                A/N: <strong>Vandals Jaya</strong>
                            </div>
                            <p style="color: var(--text-light); font-size: 14px; margin-top: 10px;">
                                <i class="fas fa-info-circle"></i> Setelah transfer, silakan upload bukti pembayaran
                            </p>
                        </div>

                        <div id="ewalletDetails" style="display: none; margin-top: 20px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                            <h4 style="margin-bottom: 15px;">Pilih E-Wallet</h4>
                            <div class="ewallet-options">
                                <label class="ewallet-option">
                                    <input type="radio" name="ewalletType" value="gopay">
                                    <span>GoPay</span>
                                </label>
                                <label class="ewallet-option">
                                    <input type="radio" name="ewalletType" value="ovo">
                                    <span>OVO</span>
                                </label>
                                <label class="ewallet-option">
                                    <input type="radio" name="ewalletType" value="dana">
                                    <span>DANA</span>
                                </label>
                                <label class="ewallet-option">
                                    <input type="radio" name="ewalletType" value="shopeepay">
                                    <span>ShopeePay</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h3>Ringkasan Pesanan</h3>
                    
                    <div id="orderItems"></div>

                    <div class="summary-divider"></div>

                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="summarySubtotal">Rp 0</span>
                    </div>
                    <div class="summary-row">
                        <span>Ongkos Kirim</span>
                        <span id="summaryShipping">Rp 15.000</span>
                    </div>
                    <div class="summary-divider"></div>
                    <div class="summary-row total">
                        <span>Total Pembayaran</span>
                        <span id="summaryTotal">Rp 0</span>
                    </div>

                    <button onclick="submitOrder()" class="btn btn-primary" style="width: 100%; padding: 18px; font-size: 18px; margin-top: 25px;">
                        <i class="fas fa-check-circle"></i> Proses Pesanan
                    </button>

                    <div style="margin-top: 20px; padding: 15px; background: #e8f5e9; border-radius: 8px; text-align: center;">
                        <i class="fas fa-shield-alt" style="color: #4caf50; font-size: 24px; margin-bottom: 10px;"></i>
                        <p style="color: #2e7d32; font-size: 14px; margin: 0;">
                            <strong>100% Transaksi Aman</strong><br>
                            Data Anda dilindungi dengan enkripsi SSL
                        </p>
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
        // Load cart items
        function loadCheckoutItems() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            if (cart.length === 0) {
                alert('Keranjang belanja kosong!');
                window.location.href = 'products.php';
                return;
            }

            const orderItems = document.getElementById('orderItems');
            let subtotal = 0;
            let html = '';

            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;

                html += `
                    <div class="order-item">
                        <img src="${item.image}" alt="${item.name}">
                        <div class="order-item-info">
                            <h4>${item.name}</h4>
                            <p>Jumlah: ${item.quantity}</p>
                        </div>
                        <div class="order-item-price">
                            Rp ${itemTotal.toLocaleString('id-ID')}
                        </div>
                    </div>
                `;
            });

            orderItems.innerHTML = html;
            document.getElementById('summarySubtotal').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            updateTotal();
        }

        // Update total when shipping changes
        document.querySelectorAll('input[name="shipping"]').forEach(radio => {
            radio.addEventListener('change', updateTotal);
        });

        function updateTotal() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const selectedShipping = document.querySelector('input[name="shipping"]:checked');
            const shippingCost = selectedShipping ? parseInt(selectedShipping.dataset.cost) : 15000;
            const total = subtotal + shippingCost;

            document.getElementById('summaryShipping').textContent = shippingCost === 0 ? 'GRATIS' : 'Rp ' + shippingCost.toLocaleString('id-ID');
            document.getElementById('summaryTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        // Show/hide payment details
        document.querySelectorAll('input[name="payment"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('bankDetails').style.display = this.value === 'transfer' ? 'block' : 'none';
                document.getElementById('ewalletDetails').style.display = this.value === 'ewallet' ? 'block' : 'none';
            });
        });

        // Submit order
        async function submitOrder() {
            const form = document.getElementById('checkoutForm');
            
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const paymentMethod = document.querySelector('input[name="payment"]:checked');
            if (!paymentMethod) {
                alert('Silakan pilih metode pembayaran!');
                return;
            }

            // Gather form data
            const formData = new FormData(form);
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const selectedShipping = document.querySelector('input[name="shipping"]:checked');
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const shippingCost = parseInt(selectedShipping.dataset.cost);
            const total = subtotal + shippingCost;

            const orderData = {
                customer: {
                    fullName: formData.get('fullName'),
                    phone: formData.get('phone'),
                    email: formData.get('email'),
                    address: formData.get('address'),
                    city: formData.get('city'),
                    postalCode: formData.get('postalCode')
                },
                items: cart,
                shipping: {
                    method: formData.get('shipping'),
                    cost: shippingCost
                },
                payment: {
                    method: formData.get('payment'),
                    ewalletType: formData.get('ewalletType')
                },
                notes: formData.get('notes'),
                subtotal: subtotal,
                total: total
            };

            try {
                const response = await fetch('api/checkout.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(orderData)
                });

                const result = await response.json();

                if (result.success) {
                    // Clear cart
                    localStorage.removeItem('cart');
                    updateCartCount();

                    // Show success message
                    alert('Pesanan berhasil dibuat!\n\nNomor Order: ' + result.orderId + '\nTotal: Rp ' + total.toLocaleString('id-ID') + '\n\nTerima kasih sudah berbelanja di Vandals Jaya!');
                    
                    // Redirect to home
                    window.location.href = 'index.php';
                } else {
                    alert('Gagal memproses pesanan: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses pesanan. Silakan coba lagi.');
            }
        }

        // Load items on page load
        loadCheckoutItems();
    </script>
</body>
</html>
