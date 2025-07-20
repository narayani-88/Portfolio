<?php
require_once 'config.php';

echo "<pre style='font-family: monospace; font-size: 14px;'>";

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql) === TRUE) {
    echo "✅ Database created successfully or already exists<br>";
} else {
    die("❌ Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db(DB_NAME);

// Create categories table if not exists
$sql = "CREATE TABLE IF NOT EXISTS portfolio_categories (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($sql) === TRUE) {
    echo "✅ Table 'portfolio_categories' created or already exists<br>";
} else {
    die("❌ Error creating table: " . $conn->error);
}

// Check if category_id column exists in portfolio table
$column_check = $conn->query("SHOW COLUMNS FROM portfolio LIKE 'category_id'");
if ($column_check->num_rows == 0) {
    // Add category_id column if it doesn't exist
    $sql = "ALTER TABLE portfolio 
            ADD COLUMN category_id INT(11) DEFAULT NULL,
            ADD CONSTRAINT fk_portfolio_category 
            FOREIGN KEY (category_id) REFERENCES portfolio_categories(id) 
            ON DELETE SET NULL";
    
    if ($conn->query($sql) === TRUE) {
        echo "✅ Added category_id to portfolio table<br>";
    } else {
        echo "⚠️ Could not add category_id to portfolio table: " . $conn->error . "<br>";
    }
} else {
    echo "✅ category_id column already exists in portfolio table<br>";
}

// Clear existing categories to prevent duplicates
$conn->query("SET FOREIGN_KEY_CHECKS=0");
$conn->query("TRUNCATE TABLE portfolio_categories");
$conn->query("SET FOREIGN_KEY_CHECKS=1");
$conn->query("ALTER TABLE portfolio_categories AUTO_INCREMENT = 1");

echo "\n🔁 Reset portfolio_categories table\n\n";

// Insert default categories
$categories = [
    ['All Projects', 'all-projects'],
    ['Residential', 'residential'],
    ['Commercial', 'commercial'],
    ['Kitchen', 'kitchen'],
    ['Office', 'office']
];

$success_count = 0;
foreach ($categories as $category) {
    $name = $conn->real_escape_string($category[0]);
    $slug = $conn->real_escape_string($category[1]);
    
    $sql = "INSERT INTO portfolio_categories (name, slug) VALUES ('$name', '$slug')";
    if ($conn->query($sql) === TRUE) {
        $success_count++;
        echo "✅ Added category: $name<br>";
    } else {
        echo "❌ Error adding category $name: " . $conn->error . "<br>";
    }
}

echo "\n✅ Migration completed! Added $success_count categories.\n\n";

echo "📋 Current Categories in Database:\n";
$result = $conn->query("SELECT * FROM portfolio_categories ORDER BY id");
if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' style='border-collapse: collapse; margin-top: 10px;'>";
    echo "<tr><th>ID</th><th>Name</th><th>Slug</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['slug']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "❌ No categories found in the database.\n";
}

// Verify Kitchen category exists
$kitchen_check = $conn->query("SELECT * FROM portfolio_categories WHERE slug = 'kitchen'");
if ($kitchen_check->num_rows === 0) {
    echo "\n❌ WARNING: The 'Kitchen' category is missing from the database!\n";
} else {
    echo "\n✅ Verified 'Kitchen' category exists in the database.\n";
}

$conn->close();

echo "</pre>";

?>
<style>
    body { 
        font-family: Arial, sans-serif; 
        padding: 20px;
        line-height: 1.6;
    }
    pre {
        background: #f5f5f5;
        padding: 20px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    table {
        margin-top: 15px;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px 12px;
        border: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    .success { color: green; }
    .error { color: red; }
    .warning { color: orange; }
</style>
