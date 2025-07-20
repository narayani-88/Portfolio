<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Check if session is working
if (!isset($_SESSION['test_counter'])) {
    $_SESSION['test_counter'] = 1;
    $message = "Session started. Counter set to 1.";
} else {
    $_SESSION['test_counter']++;
    $message = "Session working! Counter incremented to " . $_SESSION['test_counter'];
}

// Output session info
$session_info = [
    'session_id' => session_id(),
    'session_name' => session_name(),
    'session_save_path' => session_save_path(),
    'session_status' => session_status(),
    'session_data' => $_SESSION
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>PHP Session Test</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success">
                            <?php echo $message; ?>
                        </div>
                        <h4>Session Information:</h4>
                        <pre><?php print_r($session_info); ?></pre>
                        <a href="test_session.php" class="btn btn-primary">Refresh to increment counter</a>
                        <a href="test_session.php?destroy=1" class="btn btn-danger">Destroy Session</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// Handle session destroy
if (isset($_GET['destroy'])) {
    session_destroy();
    header('Location: test_session.php');
    exit;
}
?>
