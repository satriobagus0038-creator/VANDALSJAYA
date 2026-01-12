-- Use Database
USE vandals_jaya;

-- Hapus data produk lama (opsional, hapus komentar jika ingin reset)
-- TRUNCATE TABLE products;

-- Insert Products dengan Foto
INSERT INTO products (name, slug, category_id, price, original_price, description, condition_status, size, brand, image_url, stock, rating, is_featured) VALUES
('Kaos Vintage Band Classic', 'kaos-vintage-band-classic', 1, 75000, 150000, 'Kaos vintage dengan desain band klasik, kondisi sangat baik, nyaman dipakai.', 'Seperti Baru', 'L', 'Vintage', 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500&h=500&fit=crop', 5, 4.5, TRUE),
('Kemeja Flanel Premium', 'kemeja-flanel-premium', 2, 95000, 200000, 'Kemeja flanel premium dengan kualitas excellent, cocok untuk gaya casual.', 'Excellent', 'M', 'Uniqlo', 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500&h=500&fit=crop', 3, 5.0, TRUE),
('Jaket Denim Original', 'jaket-denim-original', 3, 125000, 300000, 'Jaket denim original dengan wash yang keren, kondisi masih sangat bagus.', 'Baik', 'L', 'Levis', 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500&h=500&fit=crop', 2, 4.0, TRUE),
('Celana Jeans Vintage', 'celana-jeans-vintage', 4, 85000, 180000, 'Celana jeans vintage dengan fit yang nyaman, kondisi seperti baru.', 'Seperti Baru', 'M', 'Wrangler', 'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?w=500&h=500&fit=crop', 4, 4.5, TRUE),
('Kaos Polos Premium', 'kaos-polos-premium', 1, 45000, 90000, 'Kaos polos basic dengan bahan premium, perfect untuk daily wear.', 'Baik', 'XL', 'H&M', 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=500&h=500&fit=crop', 10, 4.2, FALSE),
('Hoodie Streetwear', 'hoodie-streetwear', 3, 150000, 350000, 'Hoodie streetwear keren dengan design eksklusif, kondisi seperti baru.', 'Seperti Baru', 'L', 'Supreme', 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=500&h=500&fit=crop', 2, 4.8, TRUE),
('Kemeja Batik Modern', 'kemeja-batik-modern', 2, 110000, 250000, 'Kemeja batik modern dengan motif kontemporer, excellent condition.', 'Excellent', 'M', 'Batik Keris', 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=500&h=500&fit=crop', 3, 4.6, FALSE),
('Celana Cargo Tactical', 'celana-cargo-tactical', 4, 95000, 200000, 'Celana cargo tactical dengan banyak kantong, praktis dan stylish.', 'Baik', 'L', 'Carhartt', 'https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=500&h=500&fit=crop', 5, 4.3, FALSE),
('Kaos Band Nirvana', 'kaos-band-nirvana', 1, 80000, 160000, 'Kaos band Nirvana original print, kondisi sangat bagus untuk vintage item.', 'Seperti Baru', 'M', 'Band Merch', 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=500&h=500&fit=crop', 3, 4.7, FALSE),
('Jaket Bomber Pilot', 'jaket-bomber-pilot', 3, 175000, 400000, 'Jaket bomber pilot style dengan kualitas excellent, very stylish.', 'Excellent', 'L', 'Alpha Industries', 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500&h=500&fit=crop', 2, 4.9, TRUE),
('Kemeja Denim Wash', 'kemeja-denim-wash', 2, 100000, 220000, 'Kemeja denim dengan wash effect yang natural, kondisi baik.', 'Baik', 'L', 'Gap', 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=500&h=500&fit=crop', 4, 4.4, FALSE),
('Celana Chino Premium', 'celana-chino-premium', 4, 90000, 190000, 'Celana chino premium dengan bahan yang nyaman dan tahan lama.', 'Seperti Baru', 'M', 'Uniqlo', 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=500&h=500&fit=crop', 6, 4.5, FALSE),
('Kaos Graphic Vintage', 'kaos-graphic-vintage', 1, 65000, 140000, 'Kaos dengan graphic print vintage yang unik dan artistic.', 'Excellent', 'L', 'Thrasher', 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=500&h=500&fit=crop', 4, 4.6, TRUE),
('Kemeja Oxford Classic', 'kemeja-oxford-classic', 2, 105000, 230000, 'Kemeja oxford classic dengan kualitas premium, perfect untuk office.', 'Seperti Baru', 'M', 'Brooks Brothers', 'https://images.unsplash.com/photo-1603252109303-2751441dd157?w=500&h=500&fit=crop', 3, 4.8, FALSE),
('Jaket Varsity College', 'jaket-varsity-college', 3, 165000, 380000, 'Jaket varsity college style dengan patch eksklusif, sangat keren.', 'Baik', 'L', 'Starter', 'https://images.unsplash.com/photo-1578932750294-f5075e85f44a?w=500&h=500&fit=crop', 2, 4.7, TRUE),
('Celana Jogger Premium', 'celana-jogger-premium', 4, 88000, 185000, 'Celana jogger premium dengan material stretch yang nyaman.', 'Excellent', 'M', 'Adidas', 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=500&h=500&fit=crop', 7, 4.4, FALSE),
('Kaos Polo Sport', 'kaos-polo-sport', 1, 70000, 155000, 'Kaos polo sport dengan kualitas original, kondisi excellent.', 'Excellent', 'L', 'Polo Ralph Lauren', 'https://images.unsplash.com/photo-1586363104862-3a5e2ab60d99?w=500&h=500&fit=crop', 5, 4.5, FALSE),
('Kemeja Hawaii Vintage', 'kemeja-hawaii-vintage', 2, 92000, 195000, 'Kemeja hawaii vintage dengan print tropical yang colorful.', 'Baik', 'L', 'Vintage Hawaii', 'https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=500&h=500&fit=crop', 3, 4.3, FALSE),
('Jaket Windbreaker', 'jaket-windbreaker', 3, 135000, 310000, 'Jaket windbreaker dengan material waterproof, cocok untuk outdoor.', 'Seperti Baru', 'M', 'The North Face', 'https://images.unsplash.com/photo-1544022613-e87ca75a784a?w=500&h=500&fit=crop', 4, 4.9, TRUE),
('Celana Jeans Skinny', 'celana-jeans-skinny', 4, 82000, 175000, 'Celana jeans skinny fit dengan stretch, nyaman dan stylish.', 'Excellent', 'M', 'Zara', 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=500&h=500&fit=crop', 5, 4.4, FALSE),
('Kaos Oversized Trendy', 'kaos-oversized-trendy', 1, 68000, 145000, 'Kaos oversized dengan cutting trendy, perfect untuk street style.', 'Seperti Baru', 'XL', 'Stussy', 'https://images.unsplash.com/photo-1622445275463-afa2ab738c34?w=500&h=500&fit=crop', 6, 4.6, TRUE),
('Kemeja Kotak-kotak', 'kemeja-kotak-kotak', 2, 85000, 180000, 'Kemeja kotak-kotak classic dengan pattern yang timeless.', 'Baik', 'L', 'Giordano', 'https://images.unsplash.com/photo-1598032895397-8a2d3d6c8b3b?w=500&h=500&fit=crop', 4, 4.2, FALSE),
('Jaket Parka Winter', 'jaket-parka-winter', 3, 185000, 420000, 'Jaket parka dengan insulation hangat, perfect untuk musim dingin.', 'Excellent', 'L', 'Columbia', 'https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=500&h=500&fit=crop', 2, 4.8, FALSE),
('Celana Pendek Cargo', 'celana-pendek-cargo', 4, 65000, 140000, 'Celana pendek cargo dengan material ringan, cocok untuk casual.', 'Seperti Baru', 'M', 'Dickies', 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=500&h=500&fit=crop', 8, 4.3, FALSE);

SELECT 'Data produk berhasil ditambahkan!' as status;
SELECT COUNT(*) as total_produk FROM products;
