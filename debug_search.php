<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug Live Search - Vandals Jaya</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: Arial, sans-serif; 
            padding: 20px; 
            background: #f5f5f5;
        }
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { 
            color: #2c3e50; 
            margin-bottom: 20px; 
            border-bottom: 3px solid #e74c3c;
            padding-bottom: 10px;
        }
        .info-box {
            background: #3498db;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .search-box {
            margin: 20px 0;
            position: relative;
        }
        input[type="text"] {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: all 0.3s;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }
        .stats {
            background: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
        }
        .stat-item {
            background: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
        }
        .stat-label {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 5px;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .product-card {
            border: 2px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s;
        }
        .product-card:hover {
            border-color: #3498db;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
        }
        .product-info h3 {
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .product-condition {
            font-size: 12px;
            color: #7f8c8d;
            margin: 5px 0;
        }
        .price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }
        .console-log {
            background: #2c3e50;
            color: #2ecc71;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            max-height: 300px;
            overflow-y: auto;
            margin: 20px 0;
        }
        .log-entry {
            margin: 5px 0;
            padding: 5px;
            border-left: 3px solid #3498db;
            padding-left: 10px;
        }
        .no-results {
            text-align: center;
            padding: 60px 20px;
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 8px;
            display: none;
        }
        .btn {
            background: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin: 5px;
        }
        .btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Debug Live Search - Vandals Jaya</h1>
        
        <div class="info-box">
            <strong>Instruksi:</strong> Ketik kata kunci di bawah untuk mencari produk. 
            Console log akan menampilkan proses pencarian secara real-time.
        </div>

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Ketik untuk mencari: kaos, kemeja, jaket, vintage, premium, dll...">
        </div>

        <div class="stats">
            <div class="stat-item">
                <div class="stat-value" id="totalProducts">0</div>
                <div class="stat-label">Total Produk</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="visibleProducts">0</div>
                <div class="stat-label">Produk Terlihat</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="searchTerm">-</div>
                <div class="stat-label">Kata Kunci</div>
            </div>
        </div>

        <button class="btn" onclick="testSearch('kaos')">Test: kaos</button>
        <button class="btn" onclick="testSearch('kemeja')">Test: kemeja</button>
        <button class="btn" onclick="testSearch('vintage')">Test: vintage</button>
        <button class="btn" onclick="testSearch('premium')">Test: premium</button>
        <button class="btn" onclick="clearSearch()">Clear</button>

        <div class="console-log" id="consoleLog">
            <div class="log-entry">Console Log dimulai...</div>
        </div>

        <div class="no-results" id="noResults">
            <h3>❌ Tidak ada produk ditemukan</h3>
            <p>Coba kata kunci lain</p>
        </div>

        <div class="products-grid" id="productsGrid">
            <?php
            require_once 'config.php';
            
            $sql = "SELECT p.*, c.name as category_name 
                    FROM products p 
                    JOIN categories c ON p.category_id = c.id 
                    WHERE p.is_active = 1 
                    ORDER BY p.created_at DESC";
            $result = $conn->query($sql);
            
            if ($result && $result->num_rows > 0):
                while ($product = $result->fetch_assoc()):
            ?>
            <div class="product-card" data-category="<?php echo strtolower($product['category_name']); ?>">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <div class="product-info">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-condition">Kondisi: <?php echo htmlspecialchars($product['condition_status']); ?></p>
                    <p class="product-condition">Brand: <?php echo htmlspecialchars($product['brand']); ?></p>
                    <p class="product-condition">Kategori: <?php echo htmlspecialchars($product['category_name']); ?></p>
                    <div class="price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></div>
                </div>
            </div>
            <?php 
                endwhile;
            else:
            ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 40px; background: #fff3cd; border-radius: 8px;">
                <h3>⚠️ TIDAK ADA PRODUK DI DATABASE!</h3>
                <p>Jalankan insert_products.sql di phpMyAdmin terlebih dahulu.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Custom console.log
        function addLog(message) {
            const logDiv = document.getElementById('consoleLog');
            const logEntry = document.createElement('div');
            logEntry.className = 'log-entry';
            logEntry.textContent = new Date().toLocaleTimeString() + ' - ' + message;
            logDiv.appendChild(logEntry);
            logDiv.scrollTop = logDiv.scrollHeight;
        }

        // Initialize
        const searchInput = document.getElementById('searchInput');
        const productsGrid = document.getElementById('productsGrid');
        const noResults = document.getElementById('noResults');

        const totalProducts = productsGrid.querySelectorAll('.product-card').length;
        document.getElementById('totalProducts').textContent = totalProducts;
        document.getElementById('visibleProducts').textContent = totalProducts;

        addLog('Page loaded. Total products: ' + totalProducts);

        let searchTimeout;

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            const searchTerm = this.value.toLowerCase().trim();
            document.getElementById('searchTerm').textContent = searchTerm || '-';
            
            addLog('Search term: "' + searchTerm + '"');
            
            searchTimeout = setTimeout(() => {
                const productCards = productsGrid.querySelectorAll('.product-card');
                let visibleCount = 0;
                
                addLog('Processing ' + productCards.length + ' product cards...');
                
                productCards.forEach((card, index) => {
                    const productName = card.querySelector('.product-info h3').textContent.toLowerCase();
                    const productInfo = card.querySelector('.product-info').textContent.toLowerCase();
                    const productCategory = card.getAttribute('data-category') || '';
                    
                    const matchesSearch = searchTerm === '' || 
                        productName.includes(searchTerm) || 
                        productInfo.includes(searchTerm) ||
                        productCategory.includes(searchTerm);
                    
                    if (matchesSearch) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                document.getElementById('visibleProducts').textContent = visibleCount;
                addLog('Result: ' + visibleCount + ' products visible');
                
                if (visibleCount === 0 && searchTerm !== '') {
                    noResults.style.display = 'block';
                    addLog('No results message shown');
                } else {
                    noResults.style.display = 'none';
                }
            }, 300);
        });

        function testSearch(keyword) {
            searchInput.value = keyword;
            searchInput.dispatchEvent(new Event('input'));
            addLog('Test search triggered: ' + keyword);
        }

        function clearSearch() {
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input'));
            addLog('Search cleared');
        }
    </script>
</body>
</html>
