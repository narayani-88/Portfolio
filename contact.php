<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Bhawani Interiors</title>
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

        /* Contact Hero Section */
        .contact-hero {
            background: #f9f9f9;
            padding: 80px 0;
            min-height: calc(100vh - 100px);
            display: flex;
            align-items: stretch;
        }

        .contact-container {
            width: 100%;
            display: flex;
            align-items: stretch;
        }

        /* Left Side - Image */
        .contact-left {
            flex: 0 0 50%;
            position: relative;
            background: #ffffff;
        }

        .contact-image {
            width: 100%;
            height: 100%;
            min-height: 500px;
            object-fit: cover;
            border-radius: 15px 0 0 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Right Side - Contact Form and Info */
        .contact-right {
            flex: 0 0 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 80px 60px;
            background: #ffffff;
        }

        .contact-right h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            color: #1a2332;
            letter-spacing: -1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .contact-card {
            display: flex;
            gap: 80px;
            margin-bottom: 50px;
        }

        /* Contact Form */
        .contact-form {
            flex: 1;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1a2332;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #1a2332;
            border-radius: 10px;
            font-size: 1rem;
            color: #333;
            background: #ffffff;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #999;
            font-weight: 400;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2d3a4a;
            box-shadow: 0 0 0 3px rgba(26, 35, 50, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .contact-btn {
            background: #1a2332;
            color: #ffffff;
            padding: 15px 35px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .contact-btn:hover {
            background: #2d3a4a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* Contact Information */
        .contact-info {
            flex: 0 0 250px;
        }

        .info-item {
            margin-bottom: 25px;
        }

        .info-item h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 600;
            color: #1a2332;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-item p {
            font-size: 1rem;
            color: #666;
            line-height: 1.4;
            margin: 0;
        }

        /* Social Media Links */
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .social-links a {
            color: #1a2332;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 8px 15px;
            border: 2px solid #1a2332;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #1a2332;
            color: #ffffff;
            border-color: #1a2332;
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
        @media (max-width: 1024px) {
            .contact-right {
                padding: 60px 40px;
            }
            
            .contact-right h1 {
                font-size: 3rem;
            }
            
            .contact-card {
                gap: 50px;
            }
            
            .contact-image {
                min-height: 400px;
            }
        }

        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
            }
            
            .contact-left {
                flex: none;
                height: 300px;
            }
            
            .contact-right {
                flex: none;
                padding: 40px 30px;
            }
            
            .contact-right h1 {
                font-size: 2.5rem;
                margin-bottom: 30px;
            }
            
            .contact-card {
                flex-direction: column;
                gap: 40px;
            }
            
            .contact-info {
                flex: none;
            }
            
            .social-links {
                justify-content: center;
                gap: 12px;
            }
            
            .contact-image {
                border-radius: 15px 15px 0 0;
            }
        }

        @media (max-width: 480px) {
            .contact-right {
                padding: 30px 20px;
            }
            
            .contact-right h1 {
                font-size: 2rem;
            }
            
            .form-group input,
            .form-group textarea {
                padding: 10px 12px;
                font-size: 0.95rem;
            }
            
            .contact-btn {
                padding: 12px 28px;
                font-size: 1rem;
            }
            
            .contact-image {
                height: 250px;
            }
            
            .social-links a {
                padding: 6px 12px;
                font-size: 0.9rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="contact-hero">
        <div class="contact-container">
            <div class="contact-left">
                <img src="images/other/contact-image.jpg" alt="Contact Image" class="contact-image" />
            </div>
            <div class="contact-right">
                <h1>Contact Us</h1>
                <div class="contact-card">
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required />
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required />
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
                        </div>
                        <button class="contact-btn" type="submit">Contact Us</button>
                    </form>
                    <div class="contact-info">
                        <div class="info-item">
                            <h3>Contact</h3>
                            <p>Bhawaniinteriorsinfo@gmail.com</p>
                        </div>
                        <div class="info-item">
                            <h3>Based in</h3>
                            <p>2nd Floor, Sy No 7/4 Building No 1, Varthur Dommasandra Main Road, Opp Green Wood High School, Chikkavaderapura Village</p>
                        </div>
                        <div class="info-item">
                            <h3>Phone</h3>
                            <p>+91 76761 92052</p>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <a href="#" target="_blank">Facebook</a>
                    <a href="#" target="_blank">Instagram</a>
                    <a href="#" target="_blank">YouTube</a>
                    <a href="#" target="_blank">WhatsApp</a>
                    <a href="#" target="_blank">LinkedIn</a>
                    <a href="#" target="_blank">Pinterest</a>
                    <a href="#" target="_blank">Location</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php include 'footer.php'; ?>