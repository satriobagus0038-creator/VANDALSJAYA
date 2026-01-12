<?php
// Test Database Connection and Products
require_once 'config.php';

echo "<h1>Test Database - Vandals Jaya</h1>";
echo "<hr>";

// Test connection
if ($conn->connect_error) {
    die("❌ Koneksi database gagal: " . $conn->connect_error);
} else {
    echo "✅ Koneksi database berhasil!<br><br>";
}

// Check products
$sql = "SELECT COUNT(*) as total FROM products";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo "<h2>Total Produk: " . $row['total'] . "</h2>";

if ($row['total'] == 0) {
    echo "<p style='color: red;'>⚠️ TIDAK ADA PRODUK DI DATABASE!</p>";
    echo "<p>Silakan jalankan file <strong>insert_products.sql</strong> di phpMyAdmin:</p>";
    echo "<ol>";
    echo "<li>Buka phpMyAdmin (http://localhost/phpmyadmin)</li>";
    echo "<li>Pilih database 'vandals_jaya'</li>";
    echo "<li>Klik tab 'SQL'</li>";
    echo "<li>Copy paste isi file insert_products.sql</li>";
    echo "<li>Klik 'Go' atau 'Kirim'</li>";
    echo "</ol>";
} else {
    echo "<p style='color: green;'>✅ Produk sudah ada di database!</p>";
    
    // Show products
    echo "<h2>Daftar Produk:</h2>";
    echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background: #2c3e50; color: white;'>";
    echo "<th>ID</th><th>Foto</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Kondisi</th><th>Stock</th><th>Rating</th>";
    echo "</tr>";
    
    $sql = "SELECT p.*, c.name as category_name 
            FROM products p 
            JOIN categories c ON p.category_id = c.id 
            ORDER BY p.id";
    $result = $conn->query($sql);
    
    while ($product = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $product['id'] . "</td>";
        echo "<td><img src='" . $product['image_url'] . "' width='80' height='80' style='object-fit: cover; border-radius: 5px;'></td>";
        echo "<td><strong>" . $product['name'] . "</strong><br><small>" . $product['brand'] . "</small></td>";
        echo "<td>" . $product['category_name'] . "</td>";
        echo "<td>Rp " . number_format($product['price'], 0, ',', '.') . "</td>";
        echo "<td>" . $product['condition_status'] . "</td>";
        echo "<td>" . $product['stock'] . "</td>";
        echo "<td>⭐ " . $product['rating'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<hr>";
echo "<h2>Test Search Query</h2>";

// Test search
$search_tests = ['kaos', 'kemeja', 'jaket', 'celana', 'vintage', 'premium'];

foreach ($search_tests as $search) {
    $search_escaped = $conn->real_escape_string($search);
    $sql = "SELECT COUNT(*) as count FROM products p 
            WHERE (p.name LIKE '%$search_escaped%' 
               OR p.description LIKE '%$search_escaped%' 
               OR p.brand LIKE '%$search_escaped%')";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    echo "🔍 Pencarian '<strong>" . $search . "</strong>': " . $row['count'] . " produk ditemukan<br>";
}

echo "<hr>";
echo "<a href='products.php' style='display: inline-block; background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>➡️ Lihat Halaman Produk</a>";
echo " ";
echo "<a href='index.php' style='display: inline-block; background: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>➡️ Lihat Homepage</a>";

$conn->close();
?>
