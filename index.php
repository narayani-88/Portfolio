<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhawani Interiors - Transform Your Space</title>
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
            padding-top: 80px;
        }

        /* Container Styles */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2%;
        }

        /* Hero Section */
        .hero {
            background: #1a2332;
            padding: 120px 0 80px 0;
            min-height: 90vh;
            display: flex;
            align-items: center;
            color: #ffffff;
        }

        .hero .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #ffffff;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            color: #d3d8e8;
            font-weight: 300;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .hero-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Button Styles */
        .btn {
            padding: 16px 32px;
            border-radius: 30px;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            letter-spacing: 0.5px;
            display: inline-block;
            text-align: center;
            color: #ffffff;
        }

        .btn-primary {
            background: #ffffff;
            color: #1a2332;
            border: 2px solid #ffffff;
        }

        .btn-primary:hover {
            background: #d3d8e8;
            border-color: #d3d8e8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
        }

        .btn-secondary:hover {
            background: #ffffff;
            color: #1a2332;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .btn-outline {
            background: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
        }

        .btn-outline:hover {
            background: #ffffff;
            color: #1a2332;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        /* Features Section */
        .features {
            background: #ffffff;
            padding: 100px 0;
            text-align: center;
        }

        .features h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 600;
            margin-bottom: 60px;
            color: #1a2332;
            letter-spacing: 0.5px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .feature-card {
            background: #f0f4f8;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            display: block;
        }

        .feature-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #1a2332;
        }

        .feature-card p {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
            font-weight: 300;
        }

        /* CTA Section */
        .cta {
            background: #1a2332;
            padding: 100px 0;
            text-align: center;
            color: #ffffff;
        }

        .cta-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #ffffff;
            letter-spacing: 0.5px;
        }

        .cta-content p {
            font-size: 1.2rem;
            color: #d3d8e8;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 300;
            line-height: 1.7;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Footer */
        footer {
            background: #1a2332;
            color: #ffffff;
            padding: 60px 0 20px 0;
            font-family: 'Poppins', sans-serif;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .footer-section p {
            font-size: 1rem;
            color: #d3d8e8;
            line-height: 1.6;
            margin-bottom: 10px;
            font-weight: 300;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #1a2332;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border: 2px solid #ffffff;
        }

        .social-links a:hover {
            background: #1a2332;
            color: #ffffff;
            transform: translateY(-2px);
            border-color: #d3d8e8;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #d3d8e8;
            font-size: 0.9rem;
            color: #d3d8e8;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero .container {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }
            
            .hero-content h1 {
                font-size: 3rem;
            }
            
            .features h2,
            .cta-content h2 {
                font-size: 2.4rem;
            }
            
            .hero-image img {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 100px 0 60px 0;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.1rem;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .features {
                padding: 80px 0;
            }
            
            .features h2,
            .cta-content h2 {
                font-size: 2rem;
                margin-bottom: 40px;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 0 20px;
            }
            
            .feature-card {
                padding: 30px 25px;
            }
            
            .cta {
                padding: 80px 0;
            }
            
            .cta-content p {
                font-size: 1.1rem;
                padding: 0 20px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .features h2,
            .cta-content h2 {
                font-size: 1.8rem;
            }
            
            .feature-card {
                padding: 25px 20px;
            }
            
            .feature-icon {
                font-size: 2.5rem;
            }
            
            .feature-card h3 {
                font-size: 1.2rem;
            }
            
            .btn {
                padding: 14px 28px;
                font-size: 1rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Transform Your Space Into A Masterpiece</h1>
                <p>Discover the art of exceptional interior design with Bhawani Interiors. We create beautiful, functional, and inspiring environments that reflect your unique style and vision.</p>
                <div class="hero-buttons">
                    <a href="contact.php" class="btn btn-primary">Start Your Project</a>
                    <a href="portfolio.php" class="btn btn-secondary">View Our Work</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="images/other/jason-wang-NxAwryAbtIw-unsplash.jpg" alt="Beautiful Interior Design">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Why Choose Bhawani Interiors?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏠</div>
                    <h3>Residential Excellence</h3>
                    <p>Transform your home into a sanctuary with our residential interior design services.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏢</div>
                    <h3>Commercial Innovation</h3>
                    <p>Create inspiring workspaces that boost productivity and reflect your brand identity.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🍳</div>
                    <h3>Kitchen Mastery</h3>
                    <p>Design functional and beautiful kitchens that become the heart of your home.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">✨</div>
                    <h3>Premium Quality</h3>
                    <p>We use only the finest materials and craftsmanship to ensure lasting beauty.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Create Your Dream Space?</h2>
                <p>Let's discuss your vision and bring your interior design dreams to life. Our expert team is here to guide you every step of the way.</p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn btn-primary">Get Free Consultation</a>
                    <a href="refer-a-friend.php" class="btn btn-outline">Refer a Friend</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <p>📧 Bhawaniinteriorsinfo@gmail.com</p>
                    <p>📞 +91 76761 92052</p>
                </div>
                <div class="footer-section">
                    <h4>Location</h4>
                    <p>2nd Floor, Sy No 7/4 Building No 1,<br>Varthur Dommasandra Main Road,<br>Opp Green Wood High School,<br>Chikkavaderapura Village</p>
                </div>
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/Bhawani-Interior-Design-Studio-597307834115384/" target="_blank">f</a>
                        <a href="https://www.instagram.com/p/Cgyy8OtvqZe/" target="_blank">📷</a>
                        <a href="https://youtube.com/channel/UC_fTe1TAmr6O4gW9DbkSOww" target="_blank">▶</a>
                        <a href="https://wa.me/+917676192052" target="_blank">💬</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Bhawani Interiors. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
<?php include 'footer.php'; ?>