// Global Variables
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let products = []; // Will be loaded from database

// Load products from database
loadProductsFromDB();

// Update cart count on page load
updateCartCount();

// Mobile Navigation Toggle
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        hamburger.classList.toggle('active');
    });
}

// Close menu when clicking outside
document.addEventListener('click', (e) => {
    if (navMenu && !navMenu.contains(e.target) && !hamburger.contains(e.target)) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
    }
});

// Add to Cart Function
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;

    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: product.id,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity: 1
        });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    showNotification('Produk berhasil ditambahkan ke keranjang!');
}

// Update Cart Count
function updateCartCount() {
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
}

// Show Notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerHTML = `
        <i class="fas fa-check-circle"></i>
        <span>${message}</span>
    `;
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: #27ae60;
        color: white;
        padding: 15px 25px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        z-index: 10000;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: slideInRight 0.5s ease-out;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.5s ease-out';
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}

// Load Products from Database
function loadProductsFromDB() {
    fetch('api/products.php?action=list')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                products = data.data;
                // Re-display products if on products page
                if (document.getElementById('productsGrid')) {
                    displayProducts(products);
                }
            }
        })
        .catch(error => console.error('Error loading products:', error));
}

// Newsletter Subscribe
function subscribeNewsletter(e) {
    e.preventDefault();
    const emailInput = e.target.querySelector('input[type="email"]');
    const email = emailInput.value;
    
    const formData = new FormData();
    formData.append('email', email);
    
    fetch('api/newsletter.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(data.message);
            e.target.reset();
        } else {
            showNotification(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan. Silakan coba lagi.');
    });
}

// Products Page Functions
function displayProducts(productsToShow = products) {
    const productsGrid = document.getElementById('productsGrid');
    if (!productsGrid) return;
    
    productsGrid.innerHTML = '';
    
    productsToShow.forEach(product => {
        const productCard = createProductCard(product);
        productsGrid.innerHTML += productCard;
    });
}

function createProductCard(product) {
    const discount = Math.floor(Math.random() * 30) + 40; // 40-70% discount
    const originalPrice = Math.floor(product.price * (100 / (100 - discount)));
    
    return `
        <div class="product-card">
            <img src="${product.image}" alt="${product.name}">
            <div class="product-info">
                <h3>${product.name}</h3>
                <div class="product-rating">
                    ${getStarRating(product.rating)}
                    <span>(${product.rating})</span>
                </div>
                <p class="product-condition">Kondisi: ${product.condition}</p>
                <div class="product-price">
                    <span class="price">Rp ${product.price.toLocaleString('id-ID')}</span>
                    <span class="original-price">Rp ${originalPrice.toLocaleString('id-ID')}</span>
                </div>
                <button class="btn btn-add-cart" onclick="addToCart(${product.id})">
                    <i class="fas fa-shopping-cart"></i> Tambah ke Keranjang
                </button>
            </div>
        </div>
    `;
}

function getStarRating(rating) {
    let stars = '';
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 !== 0;
    
    for (let i = 0; i < fullStars; i++) {
        stars += '<i class="fas fa-star"></i>';
    }
    
    if (hasHalfStar) {
        stars += '<i class="fas fa-star-half-alt"></i>';
    }
    
    const emptyStars = 5 - Math.ceil(rating);
    for (let i = 0; i < emptyStars; i++) {
        stars += '<i class="far fa-star"></i>';
    }
    
    return stars;
}

// Filter Products
function filterProducts() {
    let filteredProducts = [...products];
    
    // Category filter
    const selectedCategories = Array.from(document.querySelectorAll('input[name="category"]:checked'))
        .map(cb => cb.value);
    
    if (selectedCategories.length > 0) {
        filteredProducts = filteredProducts.filter(p => selectedCategories.includes(p.category));
    }
    
    // Condition filter
    const selectedConditions = Array.from(document.querySelectorAll('input[name="condition"]:checked'))
        .map(cb => cb.value);
    
    if (selectedConditions.length > 0) {
        filteredProducts = filteredProducts.filter(p => selectedConditions.includes(p.condition));
    }
    
    // Price filter
    const minPrice = parseInt(document.getElementById('minPrice')?.value || 0);
    const maxPrice = parseInt(document.getElementById('maxPrice')?.value || 999999999);
    
    filteredProducts = filteredProducts.filter(p => p.price >= minPrice && p.price <= maxPrice);
    
    displayProducts(filteredProducts);
}

// Search Products
function searchProducts() {
    const searchTerm = document.getElementById('searchInput')?.value.toLowerCase() || '';
    const filteredProducts = products.filter(p => 
        p.name.toLowerCase().includes(searchTerm)
    );
    displayProducts(filteredProducts);
}

// Sort Products
function sortProducts() {
    const sortValue = document.getElementById('sortSelect')?.value;
    let sortedProducts = [...products];
    
    switch(sortValue) {
        case 'price-low':
            sortedProducts.sort((a, b) => a.price - b.price);
            break;
        case 'price-high':
            sortedProducts.sort((a, b) => b.price - a.price);
            break;
        case 'rating':
            sortedProducts.sort((a, b) => b.rating - a.rating);
            break;
        case 'name':
            sortedProducts.sort((a, b) => a.name.localeCompare(b.name));
            break;
        default:
            sortedProducts = [...products];
    }
    
    displayProducts(sortedProducts);
}

// Contact Form Submit
function submitContact(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    
    fetch('api/contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(data.message);
            e.target.reset();
        } else {
            showNotification(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan. Silakan coba lagi.');
    });
}

// Get URL Parameters
function getUrlParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Initialize Products Page
if (document.getElementById('productsGrid')) {
    const category = getUrlParameter('category');
    
    if (category) {
        const checkbox = document.querySelector(`input[name="category"][value="${category}"]`);
        if (checkbox) {
            checkbox.checked = true;
        }
    }
    
    displayProducts();
    
    // Add event listeners for filters
    const categoryCheckboxes = document.querySelectorAll('input[name="category"]');
    const conditionCheckboxes = document.querySelectorAll('input[name="condition"]');
    
    categoryCheckboxes.forEach(cb => cb.addEventListener('change', filterProducts));
    conditionCheckboxes.forEach(cb => cb.addEventListener('change', filterProducts));
    
    const minPrice = document.getElementById('minPrice');
    const maxPrice = document.getElementById('maxPrice');
    
    if (minPrice) minPrice.addEventListener('input', filterProducts);
    if (maxPrice) maxPrice.addEventListener('input', filterProducts);
    
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', searchProducts);
    }
    
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', sortProducts);
    }
    
    if (category) {
        filterProducts();
    }
}

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Lazy Loading Images
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });
    
    document.querySelectorAll('img').forEach(img => imageObserver.observe(img));
}

// Live Search for Products Page
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const productsGrid = document.getElementById('productsGrid');
    const productCount = document.getElementById('productCount');

    if (searchInput && productsGrid) {
        console.log('Live search initialized');
        console.log('Total product cards:', productsGrid.querySelectorAll('.product-card').length);
        
        let searchTimeout;
        
        // Add clear button to search input
        const searchBox = searchInput.parentElement.parentElement;
        if (!document.getElementById('clearSearch')) {
            const clearBtn = document.createElement('button');
            clearBtn.id = 'clearSearch';
            clearBtn.type = 'button';
            clearBtn.innerHTML = '<i class="fas fa-times"></i>';
            clearBtn.style.cssText = `
                position: absolute;
                right: 45px;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                color: var(--text-light);
                cursor: pointer;
                font-size: 16px;
                padding: 5px;
                display: none;
                z-index: 10;
                transition: color 0.3s ease;
            `;
            clearBtn.addEventListener('click', function() {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
                searchInput.focus();
            });
            clearBtn.addEventListener('mouseenter', function() {
                this.style.color = 'var(--secondary-color)';
            });
            clearBtn.addEventListener('mouseleave', function() {
                this.style.color = 'var(--text-light)';
            });
            searchBox.style.position = 'relative';
            searchBox.appendChild(clearBtn);
        }
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            const searchTerm = this.value.toLowerCase().trim();
            console.log('Searching for:', searchTerm);
            
            // Show/hide clear button
            const clearBtn = document.getElementById('clearSearch');
            if (searchTerm !== '') {
                if (clearBtn) clearBtn.style.display = 'block';
            } else {
                if (clearBtn) clearBtn.style.display = 'none';
            }
            
            // Debounce search untuk performa lebih baik
            searchTimeout = setTimeout(() => {
                const productCards = productsGrid.querySelectorAll('.product-card');
                let visibleCount = 0;
                
                console.log('Processing', productCards.length, 'products');
                
                productCards.forEach(card => {
                    // Ambil semua text content dari product card
                    const productName = card.querySelector('.product-info h3') ? 
                        card.querySelector('.product-info h3').textContent.toLowerCase() : '';
                    
                    const productConditions = card.querySelectorAll('.product-condition');
                    let productConditionText = '';
                    productConditions.forEach(p => {
                        productConditionText += p.textContent.toLowerCase() + ' ';
                    });
                    
                    const productCategory = card.getAttribute('data-category') ? 
                        card.getAttribute('data-category').toLowerCase() : '';
                    
                    // Ambil semua text dalam product-info untuk mencari brand, size, dll
                    const productInfo = card.querySelector('.product-info') ? 
                        card.querySelector('.product-info').textContent.toLowerCase() : '';
                    
                    // Cek apakah produk cocok dengan search term
                    const matchesSearch = searchTerm === '' || 
                        productName.includes(searchTerm) || 
                        productConditionText.includes(searchTerm) ||
                        productCategory.includes(searchTerm) ||
                        productInfo.includes(searchTerm);
                    
                    if (matchesSearch) {
                        card.style.display = 'block';
                        // Tambahkan animasi saat muncul
                        card.style.animation = 'scaleIn 0.3s ease-out';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                console.log('Visible products:', visibleCount);
                
                // Update product count
                if (productCount) {
                    productCount.textContent = `${visibleCount} Produk Ditemukan`;
                    // Tambahkan animasi pada counter
                    productCount.style.animation = 'pulse 0.3s ease-out';
                    setTimeout(() => {
                        productCount.style.animation = '';
                    }, 300);
                }
                
                // Tampilkan pesan jika tidak ada hasil
                let noResultsMsg = document.getElementById('noResultsMessage');
                if (visibleCount === 0 && searchTerm !== '') {
                    if (!noResultsMsg) {
                        noResultsMsg = document.createElement('div');
                        noResultsMsg.id = 'noResultsMessage';
                        noResultsMsg.className = 'no-results-message';
                        noResultsMsg.innerHTML = `
                            <i class="fas fa-search" style="font-size: 48px; color: var(--text-light); margin-bottom: 15px;"></i>
                            <h3>Produk "${searchTerm}" tidak ditemukan</h3>
                            <p>Coba gunakan kata kunci lain atau hapus beberapa filter</p>
                        `;
                        productsGrid.parentNode.insertBefore(noResultsMsg, productsGrid);
                    } else {
                        noResultsMsg.querySelector('h3').innerHTML = `Produk "${searchTerm}" tidak ditemukan`;
                    }
                    noResultsMsg.style.display = 'block';
                    productsGrid.style.display = 'none';
                } else {
                    if (noResultsMsg) {
                        noResultsMsg.style.display = 'none';
                    }
                    productsGrid.style.display = 'grid';
                }
            }, 300); // Delay 300ms untuk mengurangi beban
        });
        
        // Show clear button if there's initial value
        if (searchInput.value.trim() !== '') {
            const clearBtn = document.getElementById('clearSearch');
            if (clearBtn) clearBtn.style.display = 'block';
        }
    } else {
        console.log('Search elements not found:', {
            searchInput: !!searchInput,
            productsGrid: !!productsGrid,
            productCount: !!productCount
        });
    }
});

console.log('Vandals Jaya Website - Ready!');
