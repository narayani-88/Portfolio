<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all categories for dropdown
$categories = $conn->query("SELECT * FROM portfolio_categories ORDER BY name");
if ($categories === false) {
    // If the categories table doesn't exist, redirect to run the migration
    if ($conn->errno == 1146) { // Table doesn't exist error
        header("Location: includes/migrate_portfolio_categories.php");
        exit();
    } else {
        die("Error fetching categories: " . $conn->error);
    }
}

// Store categories in an array for multiple use
$all_categories = [];
if ($categories && $categories->num_rows > 0) {
    while($row = $categories->fetch_assoc()) {
        $all_categories[] = $row;
    }
    // Reset the pointer to the beginning of the result set
    $categories->data_seek(0);
}

// Get selected category from query string
$selected_category = isset($_GET['category']) ? (int)$_GET['category'] : null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        // Delete portfolio item
        $id = $conn->real_escape_string($_POST['id']);
        $sql = "SELECT image_path FROM portfolio WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row && !empty($row['image_path']) && file_exists($row['image_path'])) {
            unlink($row['image_path']); // Delete the image file
        }
        
        $sql = "DELETE FROM portfolio WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $_SESSION['success'] = "Portfolio item deleted successfully.";
        header("Location: portfolio.php" . ($selected_category ? "?category=$selected_category" : ""));
        exit();
    } else {
        // Add/Edit portfolio item
        $title = $conn->real_escape_string($_POST['title']);
        $description = $conn->real_escape_string($_POST['description']);
        $category_id = !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null;
        
        // Handle file upload
        $image_path = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/portfolio/';
            // Create upload directory if it doesn't exist
            if (!file_exists($upload_dir)) {
                if (!mkdir($upload_dir, 0777, true)) {
                    die('Failed to create upload directory. Check permissions.');
                }
            }
            
            // Validate file type
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            
            // Check both extension and MIME type for better security
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $_FILES['image']['tmp_name']);
            finfo_close($finfo);
            
            $allowed_mime_types = [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/webp'
            ];
            
            if (!in_array($file_extension, $allowed_types) || !in_array($mime_type, $allowed_mime_types)) {
                die('Error: Only JPG, JPEG, PNG, GIF, and WebP files are allowed. Detected type: ' . $mime_type);
            }
            
            // Generate unique filename
            $filename = 'img_' . time() . '_' . uniqid() . '.' . $file_extension;
            $target_path = $upload_dir . $filename;
            
            // Move the uploaded file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                // Convert backslashes to forward slashes for web compatibility
                $image_path = str_replace('\\', '/', $target_path);
                // Ensure the path is relative to the web root
                $document_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
                $image_path = str_replace($document_root, '', $image_path);
                // Ensure the path starts with a forward slash
                $image_path = '/' . ltrim($image_path, '/');
                
                // Debug output
                error_log("File uploaded successfully to: " . $target_path);
                error_log("Web-accessible path: " . $image_path);
                error_log("Document root: " . $document_root);
            } else {
                $error = "Failed to upload file. Error: " . $_FILES['image']['error'];
                error_log($error);
                die($error);
            }
        }
        
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            // Edit existing item
            $id = $conn->real_escape_string($_POST['id']);
            
            // Get old image path if exists
            $old_image = '';
            $result = $conn->query("SELECT image_path FROM portfolio WHERE id = $id");
            if ($result && $result->num_rows > 0) {
                $old_image = $result->fetch_assoc()['image_path'];
            }
            
            // If new image was uploaded, update the path, otherwise keep the old one
            $image_sql = !empty($image_path) ? ", image_path = '$image_path'" : "";
            
            $sql = "UPDATE portfolio SET title = ?, description = ?, category_id = ?{$image_sql} WHERE id = ?";
            $stmt = $conn->prepare($sql);
            
            if (!empty($image_path)) {
                $stmt->bind_param("ssii", $title, $description, $category_id, $id);
                // Delete old image if it exists and a new one was uploaded
                if (!empty($old_image) && file_exists($old_image)) {
                    unlink($old_image);
                }
            } else {
                $stmt->bind_param("ssii", $title, $description, $category_id, $id);
            }
            
            $message = "Portfolio item updated successfully.";
        } else {
            // Add new item
            $sql = "INSERT INTO portfolio (title, description, category_id, image_path) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssis", $title, $description, $category_id, $image_path);
            $message = "Portfolio item added successfully.";
        }
        
        if ($stmt->execute()) {
            error_log("Portfolio item saved with ID: " . $stmt->insert_id);
            error_log("Image path in database: " . $image_path);
            $_SESSION['success'] = $message;
            header("Location: portfolio.php" . ($selected_category ? "?category=$selected_category" : ""));
            exit();
        } else {
            $error = "Error: " . $stmt->error;
            error_log("Database error: " . $error);
        }
    }
}

// Get all portfolio items with category filter
$where_clause = $selected_category ? "WHERE p.category_id = $selected_category" : "";
$portfolio_items = $conn->query("
    SELECT p.*, c.name as category_name 
    FROM portfolio p 
    LEFT JOIN portfolio_categories c ON p.category_id = c.id 
    $where_clause 
    ORDER BY p.created_at DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Management - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link:hover {
            color: #fff;
        }
        .main-content {
            padding-top: 1rem;
        }
        .portfolio-item {
            margin-bottom: 2rem;
            position: relative;
        }
        .portfolio-item img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .portfolio-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .portfolio-item:hover .portfolio-actions {
            opacity: 1;
        }
        .category-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <?php 
        // Debug: Show current upload directory permissions
        $upload_dir = realpath('../uploads/portfolio/');
        $is_writable = is_writable($upload_dir);
        $perm = substr(sprintf('%o', fileperms($upload_dir)), -4);
        echo "<!-- Upload directory: $upload_dir, Writable: " . ($is_writable ? 'Yes' : 'No') . ", Permissions: $perm -->\n";
        
        // Debug: Show recent uploads
        $recent_uploads = [];
        if (is_dir($upload_dir)) {
            $files = scandir($upload_dir, SCANDIR_SORT_DESCENDING);
            $recent_uploads = array_slice($files, 0, 5); // Get 5 most recent files
        }
        echo "<!-- Recent uploads: " . implode(', ', $recent_uploads) . " -->\n";
        ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white">Admin Panel</h4>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="portfolio.php">
                                <i class="bi bi-images me-2"></i> Portfolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customers.php">
                                <i class="bi bi-people me-2"></i> Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="analytics.php">
                                <i class="bi bi-graph-up me-2"></i> Analytics
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-danger" href="logout.php">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Portfolio Management</h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                        <i class="bi bi-plus-circle"></i> Add New Item
                    </button>
                </div>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <!-- Category Filter -->
                <div class="mb-4">
                    <div class="btn-group" role="group">
                        <a href="?" class="btn btn-outline-secondary <?php echo !$selected_category ? 'active' : ''; ?>">
                            All Categories
                        </a>
                        <?php 
                        $categories_rewind = $categories;
                        while ($category = $categories_rewind->fetch_assoc()): 
                        ?>
                            <a href="?category=<?php echo $category['id']; ?>" 
                               class="btn btn-outline-secondary <?php echo $selected_category == $category['id'] ? 'active' : ''; ?>">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>

                <!-- Portfolio Items -->
                <div class="row">
                    <?php if ($portfolio_items && $portfolio_items->num_rows > 0): ?>
                        <?php while ($item = $portfolio_items->fetch_assoc()): ?>
                            <div class="col-md-4 col-sm-6 portfolio-item">
                                <?php if (!empty($item['image_path'])): ?>
                                    <img src="<?php echo htmlspecialchars($item['image_path']); ?>" 
                                         alt="<?php echo htmlspecialchars($item['title']); ?>" 
                                         class="img-fluid">
                                <?php endif; ?>
                                
                                <?php if (!empty($item['category_name'])): ?>
                                    <span class="category-badge"><?php echo htmlspecialchars($item['category_name']); ?></span>
                                <?php endif; ?>
                                
                                <div class="portfolio-actions">
                                    <button class="btn btn-sm btn-primary edit-item" 
                                            data-id="<?php echo $item['id']; ?>"
                                            data-title="<?php echo htmlspecialchars($item['title']); ?>"
                                            data-description="<?php echo htmlspecialchars($item['description']); ?>"
                                            data-category="<?php echo $item['category_id']; ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form action="portfolio.php" method="post" class="d-inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <input type="hidden" name="delete" value="1">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                
                                <h5 class="mt-2"><?php echo htmlspecialchars($item['title']); ?></h5>
                                <?php if (!empty($item['description'])): ?>
                                    <p class="text-muted"><?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info">
                                No portfolio items found. Add your first item using the button above.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Add/Edit Portfolio Modal -->
    <div class="modal fade" id="addPortfolioModal" tabindex="-1" aria-labelledby="addPortfolioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="portfolioForm" action="portfolio.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPortfolioModalLabel">Add New Portfolio Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="itemId">
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Select a category</option>
                                <?php 
                                // Use the stored categories array instead of the result set
                                foreach ($all_categories as $category): 
                                ?>
                                    <option value="<?php echo $category['id']; ?>" <?php echo ($selected_category == $category['id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp" onchange="previewImage(this)">
                            <div class="mt-2" id="imagePreview"></div>
                            <small class="text-muted">Allowed formats: JPG, PNG, GIF, WebP. Max size: 5MB</small>
                        </div>
                        
                        <div id="currentImage" class="text-center mb-3">
                            <!-- Current image preview will be shown here when editing -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle edit button click
        document.querySelectorAll('.edit-item').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');
                const categoryId = this.getAttribute('data-category');
                
                document.getElementById('itemId').value = id;
                document.getElementById('title').value = title;
                document.getElementById('description').value = description || '';
                
                if (categoryId) {
                    document.getElementById('category_id').value = categoryId;
                }
                
                // Update modal title
                document.getElementById('addPortfolioModalLabel').textContent = 'Edit Portfolio Item';
                
                // Show current image if exists
                const imagePath = this.closest('.portfolio-item').querySelector('img')?.src;
                const currentImageDiv = document.getElementById('currentImage');
                if (imagePath) {
                    currentImageDiv.innerHTML = `
                        <p class="mb-2">Current Image:</p>
                        <img src="${imagePath}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                    `;
                } else {
                    currentImageDiv.innerHTML = '';
                }
                
                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('addPortfolioModal'));
                modal.show();
            });
        });
        
        // Reset form when adding new item
        document.getElementById('addPortfolioModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('portfolioForm').reset();
            document.getElementById('currentImage').innerHTML = '';
            document.getElementById('addPortfolioModalLabel').textContent = 'Add New Portfolio Item';
            document.getElementById('itemId').value = '';
        });
        
        // Preview image before upload
        function previewImage(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = `
                        <p class="mb-2">Image Preview:</p>
                        <img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-height: 150px;">
                    `;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
<?php $conn->close(); ?>
