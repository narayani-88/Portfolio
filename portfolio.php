<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Bhawani Interiors</title>
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

        /* Portfolio Section */
        .portfolio {
            background: #f9f9f9;
            padding: 80px 0;
            min-height: calc(100vh - 100px);
        }

        .portfolio .container {
            text-align: center;
            max-width: 1100px;
        }

        .portfolio h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.8rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1a2332;
            letter-spacing: -1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .portfolio p {
            font-size: 1.3rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 50px;
            max-width: 850px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 300;
        }

        /* Project Gallery */
        .project-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
            padding: 0 20px;
        }

        .project-gallery img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .project-gallery img:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        /* Project Cards with Overlay */
        .project-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease, opacity 0.4s ease;
            background: #fff;
            opacity: 1;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .project-card img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .project-card:hover img {
            transform: scale(1.05);
        }

        .project-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white;
            padding: 30px 20px 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .project-card:hover .project-overlay {
            transform: translateY(0);
        }

        .project-overlay h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #fff;
        }

        .project-overlay p {
            font-size: 1.1rem;
            color: #f0f0f0;
            margin: 0;
            font-weight: 300;
        }

        /* Portfolio Categories */
        .portfolio-categories {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .category-btn {
            background: #ffffff;
            color: #1a2332;
            padding: 12px 25px;
            border: 2px solid #1a2332;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .category-btn:hover,
        .category-btn.active {
            background: #1a2332;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Button Styles */
        .btn {
            background: #1a2332;
            color: #ffffff;
            padding: 18px 45px;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            display: inline-block;
            cursor: pointer;
            letter-spacing: 1px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background: #2d3a4a;
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
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
            .portfolio h1 {
                font-size: 3.2rem;
            }
            
            .project-gallery {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 25px;
            }
            
            .project-gallery img,
            .project-card img {
                height: 300px;
            }
        }

        @media (max-width: 768px) {
            .portfolio {
                padding: 60px 0;
            }
            
            .portfolio h1 {
                font-size: 2.5rem;
                margin-bottom: 20px;
            }
            
            .portfolio p {
                font-size: 1.1rem;
                margin-bottom: 40px;
            }
            
            .project-gallery {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0 15px;
            }
            
            .project-gallery img,
            .project-card img {
                height: 250px;
            }
            
            .portfolio-categories {
                gap: 15px;
                margin-bottom: 30px;
            }
            
            .category-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .portfolio h1 {
                font-size: 2rem;
            }
            
            .portfolio p {
                font-size: 1rem;
                padding: 0 15px;
            }
            
            .project-gallery {
                padding: 0 10px;
            }
            
            .project-gallery img,
            .project-card img {
                height: 200px;
            }
            
            .portfolio-categories {
                flex-direction: column;
                align-items: center;
            }
            
            .category-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="portfolio">
        <div class="container">
            <h1>Our Portfolio</h1>
            <p>Discover our collection of stunning interior transformations that showcase our passion for creating beautiful, functional spaces. Each project represents our commitment to excellence and our ability to turn visions into reality.</p>
            
            <!-- Portfolio Categories -->
            <div class="portfolio-categories">
                <button class="category-btn active" data-category="all">All Projects</button>
                <button class="category-btn" data-category="residential">Residential</button>
                <button class="category-btn" data-category="commercial">Commercial</button>
                <button class="category-btn" data-category="kitchen">Kitchen</button>
                <button class="category-btn" data-category="office">Office</button>
            </div>
            
            <div class="project-gallery">
                <!-- All Projects -->
                <div class="project-card" data-category="residential">
                    <img src="images/portfolio/jared-brashier-DoddrXpLw3A-unsplash.jpg" alt="Modern Residential">
                    <div class="project-overlay">
                        <h3>Modern Residential</h3>
                        <p>Contemporary home design with natural light</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="commercial">
                    <img src="images/portfolio/nastuh-abootalebi-eHD8Y1Znfpk-unsplash.jpg" alt="Commercial Space">
                    <div class="project-overlay">
                        <h3>Commercial Space</h3>
                        <p>Dynamic commercial environment design</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="kitchen">
                    <img src="images/portfolio/lotus-design-n-print-_AK42TQRyCw-unsplash.jpg" alt="Luxury Kitchen">
                    <div class="project-overlay">
                        <h3>Luxury Kitchen</h3>
                        <p>High-end kitchen with premium finishes</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="office">
                    <img src="images/portfolio/kara-eads-L7EwHkq1B2s-unsplash.jpg" alt="Modern Office">
                    <div class="project-overlay">
                        <h3>Modern Office</h3>
                        <p>Professional workspace design</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="residential">
                    <img src="images/portfolio/project1.jpg" alt="Living Room">
                    <div class="project-overlay">
                        <h3>Elegant Living Room</h3>
                        <p>Sophisticated living space transformation</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="kitchen">
                    <img src="images/portfolio/project2.jpg" alt="Kitchen Design">
                    <div class="project-overlay">
                        <h3>Contemporary Kitchen</h3>
                        <p>Modern kitchen with sleek design</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="residential">
                    <img src="images/portfolio/project3.jpg" alt="Bedroom">
                    <div class="project-overlay">
                        <h3>Master Bedroom</h3>
                        <p>Luxurious bedroom sanctuary</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="commercial">
                    <img src="images/portfolio/jason-wang-NxAwryAbtIw-unsplash.jpg" alt="Commercial Interior">
                    <div class="project-overlay">
                        <h3>Commercial Interior</h3>
                        <p>Professional business environment</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="residential">
                    <img src="images/portfolio/contact-image.jpg" alt="Dining Area">
                    <div class="project-overlay">
                        <h3>Dining Area</h3>
                        <p>Elegant dining space transformation</p>
                    </div>
                </div>
                
                <div class="project-card" data-category="office">
                    <img src="images/portfolio/priscilla-du-preez-XkKCui44iM0-unsplash.jpg" alt="Office Space">
                    <div class="project-overlay">
                        <h3>Creative Office</h3>
                        <p>Innovative workspace design</p>
                    </div>
                </div>
            </div>
            
            <a href="get-a-quote.php" class="btn">Start Your Project</a>
        </div>
    </section>

    <!-- Portfolio Filtering Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.category-btn');
            const projectCards = document.querySelectorAll('.project-card');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    filterProjects(category);
                });
            });

            function filterProjects(category) {
                projectCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    
                    if (category === 'all' || cardCategory === category) {
                        card.style.display = 'block';
                        card.style.opacity = '0';
                        setTimeout(() => {
                            card.style.opacity = '1';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>
<?php include 'footer.php'; ?>