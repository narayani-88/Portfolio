<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - Bhawani Interiors</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            background: #ffffff;
            color: #333;
            line-height: 1.6;
            padding-top: 100px; /* Adjusted for navbar height */
        }

        /* Container Styles */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2%;
        }

        /* Terms Section */
        .terms {
            background: #f9f9f9;
            padding: 80px 0;
            min-height: calc(100vh - 100px);
        }

        .terms h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: #1a2332;
            letter-spacing: -1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .terms p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 20px;
            max-width: 800px;
            font-weight: 300;
        }

        /* Footer */
        footer {
            background: #1a2332;
            color: #ffffff;
            text-align: center;
            padding: 30px 0;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .terms h1 {
                font-size: 2.5rem;
                margin-bottom: 30px;
            }
            
            .terms p {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .terms h1 {
                font-size: 2rem;
            }
            
            .terms p {
                font-size: 1rem;
                padding: 0 15px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="terms">
        <div class="container">
            <h1>Terms of Service</h1>
            <p>This website is operated by Bhawani Interior Design Studio. Throughout the site, the terms "we," "us," and "our" refer to Bhawani Interior Design Studio. Bhawani Interior Design Studio offers this website, including all information, tools, and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies, and notices stated here.</p>
            <p>[Full Terms of Service Content Placeholder]</p>
        </div>
    </section>
</body>
</html>
<?php include 'footer.php'; ?>