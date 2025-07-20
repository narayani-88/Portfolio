<div class="navbar">
    <div class="container">
        <img src="images/logo/logo.jpeg" alt="Bhawani Interiors Logo" class="logo">
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
</div>
<style>
    .navbar {
        background: #1a2332;
        padding: 20px 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-left: 2%;
        padding-right: 2%;
    }

    .navbar .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        height: 50px;
        vertical-align: middle;
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 30px;
        justify-content: flex-end;
        align-items: center;
    }

    nav a {
        text-decoration: none;
        color: #ffffff;
        font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
        font-weight: 500;
        font-size: 1.1rem;
        transition: color 0.2s;
        padding: 8px 18px;
        border-radius: 20px;
    }

    nav a:hover {
        background: #ffffff;
        color: #1a2332;
    }

    @media (max-width: 768px) {
        nav ul {
            flex-direction: column;
            gap: 15px;
            background: #1a2332;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            padding: 20px;
            display: none;
        }

        nav ul.active {
            display: flex;
        }

        .navbar {
            flex-direction: column;
            padding: 10px 0;
        }

        .container {
            flex-direction: column;
            gap: 20px;
        }
    }
</style>