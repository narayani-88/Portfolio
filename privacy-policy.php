<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get a Quote - Bhawani Interiors</title>
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

        /* Quote Section */
        .quote {
            background: #f9f9f9;
            padding: 80px 0;
            min-height: calc(100vh - 100px);
            display: flex;
            align-items: center;
        }

        .quote h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1a2332;
            letter-spacing: -1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .quote p {
            font-size: 1.3rem;
            color: #555;
            margin-bottom: 40px;
            font-weight: 300;
            line-height: 1.5;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 600px;
        }

        input, textarea {
            padding: 15px 20px;
            border: 2px solid #1a2332;
            border-radius: 10px;
            font-size: 1rem;
            color: #333;
            background: #ffffff;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        input::placeholder, textarea::placeholder {
            color: #999;
            font-weight: 400;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #2d3a4a;
            box-shadow: 0 0 0 3px rgba(26, 35, 50, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        button {
            background: #1a2332;
            color: #ffffff;
            padding: 15px 35px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: fit-content;
            align-self: flex-start;
        }

        button:hover {
            background: #2d3a4a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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
            .quote h1 {
                font-size: 2.5rem;
                margin-bottom: 15px;
            }
            
            .quote p {
                font-size: 1.1rem;
                margin-bottom: 30px;
            }
            
            input, textarea {
                padding: 12px 15px;
                font-size: 0.95rem;
            }
            
            button {
                padding: 12px 28px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .quote h1 {
                font-size: 2rem;
            }
            
            .quote p {
                font-size: 1rem;
                padding: 0 15px;
            }
            
            form {
                gap: 15px;
            }
            
            input, textarea {
                padding: 10px 12px;
            }
            
            button {
                width: 100%;
                padding: 10px 20px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="quote">
        <div class="container">
            <h1>Get a Quote</h1>
            <p>Bhawani Interiors<br>Transform your spaces with Bhawani Interiors—where design meets functionality and elegance!</p>
            <form>
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <input type="text" placeholder="Phone Number" required>
                <textarea placeholder="Your Requirements" required></textarea>
                <button type="submit">Request Quote</button>
            </form>
        </div>
    </section>
</body>
</html>
<?php include 'footer.php'; ?>