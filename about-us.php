<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Bhawani Interiors</title>
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

        /* Hero Section */
        .hero {
            display: flex;
            min-height: 80vh;
            background: #1a2332;
            position: relative;
            overflow: hidden;
        }

        .hero-left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 40px;
            z-index: 2;
        }

        .hero-content {
            max-width: 550px;
            text-align: left;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.8rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #ffffff;
            line-height: 1.2;
            letter-spacing: -1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-content p {
            font-size: 1.4rem;
            font-weight: 300;
            color: #d3d8e8;
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .hero-right {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.7;
            z-index: 1;
        }

        .hero-accent {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            color: #ffffff;
            z-index: 2;
            background: rgba(26, 35, 50, 0.8);
            padding: 25px 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .heart {
            display: block;
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .accent-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            letter-spacing: 1px;
        }

        /* About Collage Section */
        .about-collage {
            display: flex;
            min-height: 70vh;
            background: #f9f9f9;
        }

        .collage-left {
            flex: 0 0 250px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
            border-right: 1px solid #e0e0e0;
        }

        .vertical-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: #1a2332;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            margin: 0;
            letter-spacing: 2px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .collage-center {
            flex: 1;
            padding: 80px 40px;
            display: flex;
            align-items: center;
        }

        .content-block {
            max-width: 650px;
        }

        .content-block h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #1a2332;
            margin-bottom: 20px;
            margin-top: 40px;
            border-bottom: 2px solid #1a2332;
            padding-bottom: 5px;
        }

        .content-block h3:first-child {
            margin-top: 0;
        }

        .content-block p {
            font-size: 1.2rem;
            font-weight: 300;
            color: #555;
            line-height: 1.9;
            margin-bottom: 25px;
        }

        .collage-right {
            flex: 0 0 300px;
            background: #1a2332;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 30px;
            border-left: 1px solid #e0e0e0;
        }

        .accent-block {
            color: #ffffff;
            text-align: center;
            max-width: 250px;
        }

        .accent-block h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .accent-block ul {
            list-style: none;
            text-align: left;
        }

        .accent-block li {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 15px;
            padding-left: 25px;
            position: relative;
        }

        .accent-block li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #ffffff;
            font-weight: bold;
            font-size: 1.1rem;
        }

        /* Team Section */
        .team-section {
            display: flex;
            min-height: 60vh;
            background: #ffffff;
        }

        .team-left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .team-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.9);
        }

        .team-right {
            flex: 1;
            background: #1a2332;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 40px;
        }

        .team-content {
            color: #ffffff;
            max-width: 600px;
            text-align: left;
        }

        .team-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .team-content p {
            font-size: 1.2rem;
            font-weight: 300;
            line-height: 1.9;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .team-list {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .team-member {
            flex: 1;
            min-width: 200px;
            text-align: center;
            padding: 25px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-member h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .team-member p {
            font-size: 1rem;
            font-weight: 300;
            opacity: 0.8;
            margin: 0;
        }

        /* Additional About Section */
        .about {
            padding: 80px 0;
            background: #f9f9f9;
        }

        .about h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: #1a2332;
            text-align: center;
            margin-bottom: 40px;
        }

        .about h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 600;
            color: #1a2332;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 1.2rem;
            font-weight: 300;
            color: #555;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        /* Button Styles */
        .btn {
            background: #ffffff;
            color: #1a2332;
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
            background: #d3d8e8;
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
            .hero-content h1 {
                font-size: 3.2rem;
            }
            
            .vertical-title {
                font-size: 3rem;
            }
            
            .collage-left {
                flex: 0 0 200px;
            }
            
            .collage-right {
                flex: 0 0 250px;
            }
            
            .team-content h2 {
                font-size: 2.4rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
            
            .hero {
                flex-direction: column;
                min-height: 60vh;
            }
            
            .hero-left {
                padding: 40px 20px;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.1rem;
            }
            
            .hero-right .hero-image {
                height: 300px;
            }
            
            .hero-accent {
                display: none;
            }
            
            .about-collage {
                flex-direction: column;
                min-height: auto;
            }
            
            .collage-left {
                flex: none;
                padding: 20px;
                height: 150px;
            }
            
            .vertical-title {
                writing-mode: horizontal-tb;
                transform: none;
                font-size: 2rem;
            }
            
            .collage-center {
                padding: 40px 20px;
            }
            
            .collage-right {
                flex: none;
                padding: 30px 20px;
                height: 300px;
            }
            
            .team-section {
                flex-direction: column;
                min-height: auto;
            }
            
            .team-left .team-image {
                height: 300px;
            }
            
            .team-right {
                padding: 40px 20px;
            }
            
            .team-content h2 {
                font-size: 2rem;
            }
            
            .team-list {
                flex-direction: column;
                gap: 20px;
            }
            
            .about {
                padding: 50px 0;
            }
            
            .about h1 {
                font-size: 2.5rem;
            }
            
            .about h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .content-block h3 {
                font-size: 1.5rem;
            }
            
            .content-block p {
                font-size: 1rem;
            }
            
            .team-content h2 {
                font-size: 1.8rem;
            }
            
            .team-member {
                min-width: 150px;
                padding: 15px;
            }
            
            .btn {
                padding: 14px 30px;
                font-size: 1rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-left">
            <div class="hero-content">
                <h1>Welcome to Bhawani Interiors</h1>
                <p>Where creativity meets craftsmanship, and every space tells a unique story. We transform dreams into breathtaking realities.</p>
                <a href="contact.php" class="btn">Begin Your Journey</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="images/other/jason-wang-NxAwryAbtIw-unsplash.jpg" alt="Interior Design" class="hero-image">
            <div class="hero-accent">
                <span class="heart">❤</span>
                <span class="accent-text">DESIGN</span>
            </div>
        </div>
    </section>

    <!-- About Us Collage Section -->
    <section class="about-collage">
        <div class="collage-left">
            <h2 class="vertical-title">Our Story</h2>
        </div>
        <div class="collage-center">
            <div class="content-block">
                <h3>The Beginning</h3>
                <p>Founded in 2011 with a vision to revolutionize interior design, Bhawani Interiors emerged from a passion for creating spaces that inspire, comfort, and delight. What started as a small team of dreamers has grown into a powerhouse of creative professionals.</p>
                
                <h3>Our Philosophy</h3>
                <p>We believe that every space has the potential to become extraordinary. Our approach combines timeless elegance with contemporary innovation, ensuring each project reflects the unique personality and lifestyle of our clients.</p>
                
                <h3>Excellence in Every Detail</h3>
                <p>From luxurious residential sanctuaries to dynamic commercial environments, we craft spaces that exceed expectations. Our signature projects span from opulent villas to modern urban apartments, each a testament to our commitment to excellence.</p>
                
                <a href="get-a-quote.php" class="btn">Start Your Project</a>
            </div>
        </div>
        <div class="collage-right">
            <div class="accent-block">
                <h3>Why Choose Excellence?</h3>
                <ul>
                    <li>Master Craftsmen</li>
                    <li>Premium Materials</li>
                    <li>Innovative Designs</li>
                    <li>Timeless Quality</li>
                    <li>Unmatched Service</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="team-left">
            <img src="images/other/priscilla-du-preez-XkKCui44iM0-unsplash.jpg" alt="Our Team" class="team-image">
        </div>
        <div class="team-right">
            <div class="team-content">
                <h2>Meet Our Visionaries</h2>
                <p>Behind every extraordinary space lies a team of passionate professionals dedicated to bringing your vision to life. We are more than designers – we are storytellers, problem-solvers, and dream-weavers who believe in the transformative power of beautiful interiors.</p>
                
                <div class="team-list">
                    <div class="team-member">
                        <h4>Kristen Lewis</h4>
                        <p>Creative Director & Founder</p>
                    </div>
                    <div class="team-member">
                        <h4>James O'Neil</h4>
                        <p>Senior Project Manager</p>
                    </div>
                    <div class="team-member">
                        <h4>Nataliya Stepulev</h4>
                        <p>Client Experience Specialist</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional PHP Content -->
    <section class="about">
        <div class="container">
            <h1>About Us</h1>
            <h2>About Bhawani Interiors</h2>
            <p>We would like to introduce ourselves as an Interior Designer firm in Bangalore by the name of Bhawani Interiors. We are a team of young talented professionals headed by an experienced Architect who has years of experience in the field of residential and commercials interiors. With the years of experience backing us we are determined to provide in the best class interior services at very affordable prices.<br><br>Please do get in touch with us for the interior of your Flat/Villas/House/Office/Hotels/Restaurants/Bar/Shop Designs and we assure that you will not be disappointed. We will do the end to end interior work solutions within your budget.</p>
            <a href="get-a-quote.php" class="btn">Get a Quote</a>
            <h2>Our Team</h2>
            <div class="team-list">
                <div class="team-member"><h3>Kristen Lewis</h3><p>Founder</p></div>
                <div class="team-member"><h3>James O'Neil</h3><p>Manager</p></div>
                <div class="team-member"><h3>Nataliya Stepulev</h3><p>Receptionist</p></div>
            </div>
        </div>
    </section>
</body>
</html>
<?php include 'footer.php'; ?>