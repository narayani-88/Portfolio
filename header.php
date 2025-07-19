<?php
// Shared navigation and header for all pages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhawani Interiors</title>
    <link rel="stylesheet" href="style.css">
<?php if(basename($_SERVER['PHP_SELF'])==='contact.php') { echo '<link rel="stylesheet" href="contact.css">'; } ?>
</head>
<body>
<header>
    <div class="container">
        <img src="logo.jpeg" alt="Bhawani Interiors Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="refer-a-friend.php">Refer a Friend</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
