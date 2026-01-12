<?php
/**
 * Database Configuration File
 * Vandals Jaya - Toko Online Baju Bekas
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'vandals_jaya');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to UTF-8
$conn->set_charset("utf8mb4");

// Site Configuration
define('SITE_NAME', 'Vandals Jaya');
define('SITE_URL', 'http://localhost/VANDALJAYA/');
define('ADMIN_EMAIL', 'info@vandalsjaya.com');

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper Functions
function sanitize_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

function json_response($success, $message, $data = null) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}
?>
