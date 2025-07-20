<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session at the very beginning
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/config.php';

// If already logged in, redirect to dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: dashboard.php');
    exit;
}

// Initialize variables
$error = '';
$debug_info = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $debug_info[] = "Form submitted";
    
    // Basic input validation
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if ($conn->connect_error) {
            $error = "Connection failed: " . $conn->connect_error;
        } else {
            $sql = "SELECT id, username, password FROM admin_users WHERE username = ?";
            
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $username);
                
                if ($stmt->execute()) {
                    $stmt->store_result();
                    
                    if ($stmt->num_rows == 1) {
                        $stmt->bind_result($id, $username, $hashed_password);
                        $stmt->fetch();
                        
                        if (password_verify($password, $hashed_password)) {
                            // Regenerate session ID to prevent session fixation
                            session_regenerate_id(true);
                            
                            // Set session variables
                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;
                            $_SESSION['last_activity'] = time(); // Initialize last activity time
                            
                            // Close statement and connection
                            $stmt->close();
                            $conn->close();
                            
                            // Clear any output buffers
                            while (ob_get_level()) {
                                ob_end_clean();
                            }
                            
                            // Redirect to dashboard
                            header('Location: dashboard.php');
                            exit();
                        } else {
                            $error = "Invalid username or password.";
                        }
                    } else {
                        $error = "Invalid username or password.";
                    }
                } else {
                    $error = "Oops! Something went wrong. Please try again later.";
                }
                $stmt->close();
            } else {
                $error = "Database error. Please try again later.";
            }
            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Portfolio Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: auto;
        }
        .debug-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            font-family: monospace;
            font-size: 12px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }
    </style>
</head>
<body class="text-center">
    <main class="form-signin">
        <div class="login-logo">
            <h2>Portfolio Admin</h2>
            <p class="text-muted">Sign in to start your session</p>
        </div>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error); ?>
                <button type="button" class="btn btn-link btn-sm" onclick="document.getElementById('debugInfo').style.display='block';">
                    Show Debug Info
                </button>
                <div id="debugInfo" class="debug-info">
                    <?php echo htmlspecialchars(implode("\n", $debug_info)); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" 
                       placeholder="Username" required autofocus value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-3 mb-3 text-muted">
                Default credentials: admin / admin123
            </p>
        </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
